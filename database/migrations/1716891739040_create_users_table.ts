import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
    protected tableName = 'users'

    async up() {
        this.schema.createTable(this.tableName, (table) => {
            table.uuid('id').primary()
            table.string('name', 256).notNullable()
            table.string('email', 256).notNullable().unique()
            table.string('password', 60).nullable()
            table.string('address', 256).nullable()
            table.string('phone', 256).nullable()
            table.string('avatar', 256).nullable()
            table.enum('role', ['admin', 'customer']).defaultTo('customer')

            table.timestamp('created_at').notNullable()
            table.timestamp('updated_at').nullable()
        })
    }

    async down() {
        this.schema.dropTable(this.tableName)
    }
}
