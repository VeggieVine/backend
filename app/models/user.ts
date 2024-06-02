import { DateTime } from 'luxon'
import hash from '@adonisjs/core/services/hash'
import { compose } from '@adonisjs/core/helpers'
import { BaseModel, beforeCreate, column } from '@adonisjs/lucid/orm'
import { withAuthFinder } from '@adonisjs/auth/mixins/lucid'
import { DbAccessTokensProvider } from '@adonisjs/auth/access_tokens'
import { randomUUID } from 'node:crypto'
import { AccessToken } from '@adonisjs/auth/access_tokens'

const AuthFinder = withAuthFinder(() => hash.use('scrypt'), {
    uids: ['email'],
    passwordColumnName: 'password',
})

export default class User extends compose(BaseModel, AuthFinder) {
    @beforeCreate()
    static async setUUID(user: User) {
        user.id = randomUUID()
    }

    @column({ isPrimary: true })
    declare id: string

    @column()
    declare name: string | null

    @column()
    declare email: string

    @column({ serializeAs: null })
    declare password: string | null

    @column()
    declare address: string | null

    @column()
    declare phone: string | null

    @column()
    declare avatar: string | null

    @column()
    declare role: 'admin' | 'customer'

    @column.dateTime({ autoCreate: true })
    declare createdAt: DateTime

    @column.dateTime({ autoCreate: true, autoUpdate: true })
    declare updatedAt: DateTime | null

    static accessTokens = DbAccessTokensProvider.forModel(User, {
        expiresIn: '30 days',
        prefix: 'veg_',
        table: 'auth_access_tokens',
        type: 'auth_token',
        tokenSecretLength: 40,
    })

    currentAccessToken?: AccessToken
}
