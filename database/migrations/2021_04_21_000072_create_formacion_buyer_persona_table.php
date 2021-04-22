<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacionBuyerPersonaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formacion_buyer_persona';

    /**
     * Run the migrations.
     * @table formacion_buyer_persona
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('formacion_id');
            $table->unsignedInteger('buyer_persona_id');

            $table->index(["formacion_id"], 'fk_fobp_formacion_idx');

            $table->index(["buyer_persona_id"], 'fk_fobp_buyer_persona_idx');


            $table->foreign('formacion_id', 'fk_fobp_formacion_idx')
                ->references('id')->on('formacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('buyer_persona_id', 'fk_fobp_buyer_persona_idx')
                ->references('id')->on('buyer_persona')
                ->onDelete('restrict')
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
}
