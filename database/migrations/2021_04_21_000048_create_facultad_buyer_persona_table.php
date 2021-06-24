<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadBuyerPersonaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'facultad_buyer_persona';

    /**
     * Run the migrations.
     * @table facultad_buyer_persona
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('facultad_id');
            $table->unsignedInteger('buyer_persona_id');

            $table->index(["buyer_persona_id"], 'fk_fbp_buyer_persona_idx');

            $table->index(["facultad_id"], 'fk_ffbp_facultad_idx');


            $table->foreign('facultad_id', 'fk_ffbp_facultad_idx')
                ->references('id')->on('facultad')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('buyer_persona_id', 'fk_fbp_buyer_persona_idx')
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
