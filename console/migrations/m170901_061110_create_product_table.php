<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m170901_061110_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'quantity' => $this->integer(11)->notNull(),
            'provider' => $this->string(255)->notNull(),
            'dt_delivery'=> $this->integer(11),
            'price' => $this->integer(11)->notNull()

        ]);

        $this->addForeignKey(
            'products_by_category_fk',
            'product',
            'category_id',
            'category',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('products_by_category_fk', 'product');
        $this->dropTable('product');
    }
}
