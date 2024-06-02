import User from '#models/user'
import auth from '@adonisjs/auth/services/main'
import type { HttpContext } from '@adonisjs/core/http'

export default class SocialController {
    async googleRedirect({ ally }: HttpContext) {
        const google = ally.use('google')
        return google.redirect((request) => {
            request.param('access_type', 'offline').param('prompt', 'consent')
        })
    }

    async googleCallback({ ally, response }: HttpContext) {
        const google = ally.use('google')

        if (google.accessDenied()) {
            return response.redirect().toRoute('home')
        }

        // CSRF IS EXPIRED
        if (google.stateMisMatch()) {
            return response.redirect().toRoute('home')
        }

        if (google.hasError()) {
            return google.getError()
        }

        const googleUser = await google.user()
        let user = await User.findBy('email', googleUser.email)

        if (!user) {
            if (googleUser.email === 'marcocaesto@gmail.com') {
                user = await User.create({
                    name: googleUser.name,
                    email: googleUser.email,
                    avatar: googleUser.avatarUrl,
                    role: 'admin',
                })
            } else {
                user = await User.create({
                    name: googleUser.name,
                    email: googleUser.email,
                    avatar: googleUser.avatarUrl,
                    role: 'customer',
                })
            }
        }

        const token = await User.accessTokens.create(user)

        return token
    }
}
