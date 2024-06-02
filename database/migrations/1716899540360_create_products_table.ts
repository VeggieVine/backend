import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
    protected tableName = 'products'

    async up() {
        this.schema.createTable(this.tableName, (table) => {
            table.uuid('id').primary()
            table.string('name', 256).notNullable()
            table.text('description').nullable()
            table.string('category', 256).nullable()
            table.float('price').notNullable()
            table.integer('stock').notNullable()
            table.string('image', 256).nullable()

            table.timestamp('created_at').notNullable()
            table.timestamp('updated_at').nullable()
        })
    }

    async down() {
        this.schema.dropTable(this.tableName)
    }
}
