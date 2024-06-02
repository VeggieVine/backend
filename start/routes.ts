/*
|--------------------------------------------------------------------------
| Routes file
|--------------------------------------------------------------------------
|
| The routes file is used for defining the HTTP routes.
|
*/

import User from '#models/user'
import router from '@adonisjs/core/services/router'
import { middleware } from './kernel.js'

// LAZY LOADED CONTROLLERS
const SocialController = () => import('#controllers/social_controller')

// ROUTES
router
    .get('/', async ({ response }) => {
        return response.redirect('http://localhost:3000')
    })
    .as('home')

router.get('/google/redirect', [SocialController, 'googleRedirect']).as('google.redirect')

router.get('/google/callback', [SocialController, 'googleCallback']).as('google.callback')

// FETCH USER DATA FROM CLIENT
router.post('users/:id/tokens', async ({ params }) => {
    const user = await User.findOrFail(params.id)
    const token = await User.accessTokens.create(user)

    return {
        type: 'bearer',
        value: token.value!.release(),
    }
})

router
    .get('/tokens', async ({ auth }) => {
        const response = {
            user: auth.user,
            tokens: await User.accessTokens.all(auth.user!),
        }

        return response
    })
    .use(
        middleware.auth({
            guards: ['api'],
        })
    )
