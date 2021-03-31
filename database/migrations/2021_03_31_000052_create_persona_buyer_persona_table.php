<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaBuyerPersonaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'persona_buyer_persona';

    /**
     * Run the migrations.
     * @table persona_buyer_persona
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('buyer_persona_id');
            $table->unsignedInteger('informacion_relacional_id');

            $table->index(["informacion_relacional_id"], 'fk_pbp_informacion_relacional_idx');

            $table->index(["buyer_persona_id"], 'fk_pbp_buyer_persona_idx');


            $table->foreign('buyer_persona_id', 'fk_pbp_buyer_persona_idx')
                ->references('id')->on('buyer_persona')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('informacion_relacional_id', 'fk_pbp_informacion_relacional_idx')
                ->references('id')->on('informacion_relacional')
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
