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
    public $tableName = 'products';

    /**
     * Run the migrations.
     * @table products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->string('sku', 150);
            $table->integer('existences');
            $table->json('properties');
            $table->tinyInteger('to_sell');
            $table->integer('product_type_id');
            $table->integer('product_status_id')->nullable();

            $table->unique(["sku"], 'sku_UNIQUE');

            $table->index(["product_type_id"], 'fk_products_product_types1_idx');

            $table->index(["product_status_id"], 'fk_products_product_statusses1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('product_type_id', 'fk_products_product_types1_idx')
                ->references('id')->on('product_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_status_id', 'fk_products_product_statusses1_idx')
                ->references('id')->on('product_statusses')
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
