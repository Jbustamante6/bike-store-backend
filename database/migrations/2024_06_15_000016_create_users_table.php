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
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('doc_number');
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('email', 150);
            $table->string('username', 150);
            $table->text('password');
            $table->integer('document_type_id');

            $table->unique(["doc_number"], 'id_number_UNIQUE');

            $table->unique(["email"], 'email_UNIQUE');

            $table->unique(["username"], 'username_UNIQUE');

            $table->index(["document_type_id"], 'fk_users_document_types_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('document_type_id', 'fk_users_document_types_idx')
                ->references('id')->on('document_types')
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
