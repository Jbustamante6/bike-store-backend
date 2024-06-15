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
    public $tableName = 'books_has_services';

    /**
     * Run the migrations.
     * @table books_has_services
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('book_id');
            $table->integer('service_id');

            $table->index(["service_id"], 'fk_books_has_services_services1_idx');

            $table->index(["book_id"], 'fk_books_has_services_books1_idx');


            $table->foreign('book_id', 'fk_books_has_services_books1_idx')
                ->references('id')->on('books')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('service_id', 'fk_books_has_services_services1_idx')
                ->references('id')->on('services')
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
