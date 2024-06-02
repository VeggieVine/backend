import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
    protected tableName = 'order_items'

    async up() {
        this.schema.createTable(this.tableName, (table) => {
            table.uuid('id').primary()
            table
                .uuid('order_id')
                .notNullable()
                .references('id')
                .inTable('orders')
                .onDelete('CASCADE')
            table
                .uuid('product_id')
                .notNullable()
                .references('id')
                .inTable('products')
                .onDelete('CASCADE')

            table.timestamp('created_at').notNullable()
            table.timestamp('updated_at').nullable()
        })
    }

    async down() {
        this.schema.dropTable(this.tableName)
    }
}
