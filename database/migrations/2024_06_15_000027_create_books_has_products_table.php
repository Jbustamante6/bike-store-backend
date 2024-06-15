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
    public $tableName = 'books_has_products';

    /**
     * Run the migrations.
     * @table books_has_products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('product_id');
            $table->integer('book_id');

            $table->index(["book_id"], 'fk_products_has_books_books1_idx');

            $table->index(["product_id"], 'fk_products_has_books_products1_idx');


            $table->foreign('product_id', 'fk_products_has_books_products1_idx')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('book_id', 'fk_products_has_books_books1_idx')
                ->references('id')->on('books')
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
