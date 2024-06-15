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
    public $tableName = 'pqrs';

    /**
     * Run the migrations.
     * @table pqrs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('comment');
            $table->string('email', 45)->nullable();
            $table->string('claimant_type')->nullable();
            $table->integer('claimant_id')->nullable();
            $table->string('responsible_type')->nullable();
            $table->integer('responsible_id')->nullable();
            $table->text('answer')->nullable();
            $table->integer('pqr_types_id');
            $table->integer('pqr_status_id');

            $table->index(["pqr_types_id"], 'fk_pqrs_pqr_types1_idx');

            $table->index(["pqr_status_id"], 'fk_pqrs_pqr_statusses1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('pqr_types_id', 'fk_pqrs_pqr_types1_idx')
                ->references('id')->on('pqr_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pqr_status_id', 'fk_pqrs_pqr_statusses1_idx')
                ->references('id')->on('pqr_statusses')
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
