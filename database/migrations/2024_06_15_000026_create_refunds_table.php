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
    public $tableName = 'refunds';

    /**
     * Run the migrations.
     * @table refunds
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->json('details');
            $table->integer('refund_status_id');
            $table->integer('purchase_id');

            $table->index(["refund_status_id"], 'fk_refunds_refund_statusses1_idx');

            $table->index(["purchase_id"], 'fk_refunds_purchases1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('refund_status_id', 'fk_refunds_refund_statusses1_idx')
                ->references('id')->on('refund_statusses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('purchase_id', 'fk_refunds_purchases1_idx')
                ->references('id')->on('purchases')
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
