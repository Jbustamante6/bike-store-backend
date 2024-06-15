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
    public $tableName = 'shippings';

    /**
     * Run the migrations.
     * @table shippings
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tracking_number')->nullable();
            $table->integer('shipping_company_id');
            $table->integer('purchase_id');
            $table->integer('address_id');

            $table->index(["shipping_company_id"], 'fk_shippings_shipping_companies1_idx');

            $table->index(["purchase_id"], 'fk_shippings_purchases1_idx');

            $table->index(["address_id"], 'fk_shippings_adresses1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('shipping_company_id', 'fk_shippings_shipping_companies1_idx')
                ->references('id')->on('shipping_companies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('purchase_id', 'fk_shippings_purchases1_idx')
                ->references('id')->on('purchases')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('address_id', 'fk_shippings_adresses1_idx')
                ->references('id')->on('addresses')
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
