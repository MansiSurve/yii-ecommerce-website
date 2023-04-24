<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_items}}`.
 */
class m230419_100822_create_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_items}}', [
            'id' => $this->integer(11)->notNull(),
            'product_name' => $this->string(225)->notNull(),
            'product_id' => $this->integer(1)->notNull(),
            'unit_price' => $this->decimal(10,2)->notNull(),
            'order_id' => $this->integer(1)->notNull(),
            'quantity' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey(
            'FK_order_items-order_id',
            '{{%order_items}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );


        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-order_items-product_id}}',
            '{{%order_items}}',
            'product_id'
        );

         //add foreign key for table `{{%products}}`
        $this->addForeignKey(
            'fk-order_items-product_id',
            '{{%order_items}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_items}}');
    }
}
