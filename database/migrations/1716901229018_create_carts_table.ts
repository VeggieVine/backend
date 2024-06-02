import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
    protected tableName = 'carts'

    async up() {
        this.schema.createTable(this.tableName, (table) => {
            table.uuid('id').primary()
            table
                .uuid('user_id')
                .notNullable()
                .references('id')
                .inTable('users')
                .onDelete('CASCADE')
            table
                .uuid('product_id')
                .notNullable()
                .references('id')
                .inTable('products')
                .onDelete('CASCADE')
            table.integer('quantity').notNullable()

            table.timestamp('created_at').notNullable()
            table.timestamp('updated_at').nullable()
        })
    }

    async down() {
        this.schema.dropTable(this.tableName)
    }
}
