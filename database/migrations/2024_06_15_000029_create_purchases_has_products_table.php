<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'purchases_has_products';

    /**
     * Run the migrations.
     * @table purchases_has_products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('purchase_id');
            $table->integer('product_id');

            $table->index(["product_id"], 'fk_purchases_has_products_products1_idx');

            $table->index(["purchase_id"], 'fk_purchases_has_products_purchases1_idx');


            $table->foreign('purchase_id', 'fk_purchases_has_products_purchases1_idx')
                ->references('id')->on('purchases')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_id', 'fk_purchases_has_products_products1_idx')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};
