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
    public $tableName = 'addresses';

    /**
     * Run the migrations.
     * @table addresses
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('address');
            $table->tinyInteger('is_default');
            $table->string('postal_code', 45)->nullable();
            $table->integer('city_id');
            $table->integer('user_id');

            $table->index(["city_id"], 'fk_adresses_cities1_idx');

            $table->index(["user_id"], 'fk_adresses_users1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('city_id', 'fk_adresses_cities1_idx')
                ->references('id')->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id', 'fk_adresses_users1_idx')
                ->references('id')->on('users')
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
