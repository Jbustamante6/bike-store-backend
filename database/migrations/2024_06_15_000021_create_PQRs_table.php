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
    public $tableName = 'PQRs';

    /**
     * Run the migrations.
     * @table PQRs
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
            $table->integer('PQR_types_id');
            $table->integer('PQR_status_id');

            $table->index(["PQR_types_id"], 'fk_PQRs_PQR_types1_idx');

            $table->index(["PQR_status_id"], 'fk_PQRs_PQR_statusses1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('PQR_types_id', 'fk_PQRs_PQR_types1_idx')
                ->references('id')->on('PQR_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('PQR_status_id', 'fk_PQRs_PQR_statusses1_idx')
                ->references('id')->on('PQR_statusses')
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
