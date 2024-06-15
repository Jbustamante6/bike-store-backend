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
    public $tableName = 'purchases';

    /**
     * Run the migrations.
     * @table purchases
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->time('purchase_date');
            $table->json('details');
            $table->integer('purchaser_id')->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('payment_method_id');

            $table->index(["purchaser_id"], 'fk_purchases_users1_idx');

            $table->index(["seller_id"], 'fk_purchases_users2_idx');

            $table->index(["payment_method_id"], 'fk_purchases_payment_methods1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('purchaser_id', 'fk_purchases_users1_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('seller_id', 'fk_purchases_users2_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('payment_method_id', 'fk_purchases_payment_methods1_idx')
                ->references('id')->on('payment_methods')
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
