import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
    protected tableName = 'orders'

    async up() {
        this.schema.createTable(this.tableName, (table) => {
            table.uuid('id').primary()
            table
                .uuid('user_id')
                .notNullable()
                .references('id')
                .inTable('users')
                .onDelete('CASCADE')
            table.datetime('order_date').notNullable()
            table.float('grand_total').notNullable()
            table.enum('status', ['pending', 'completed', 'cancelled']).defaultTo('pending')

            table.timestamp('created_at').notNullable()
            table.timestamp('updated_at').nullable()
        })
    }

    async down() {
        this.schema.dropTable(this.tableName)
    }
}
