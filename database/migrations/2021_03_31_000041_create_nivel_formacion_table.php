<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelFormacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'nivel_formacion';

    /**
     * Run the migrations.
     * @table nivel_formacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 100);
            $table->unsignedInteger('nivel_academico_id');

            $table->index(["nivel_academico_id"], 'fk_nivel_formacion_nivel_academico_idx');


            $table->foreign('nivel_academico_id', 'fk_nivel_formacion_nivel_academico_idx')
                ->references('id')->on('nivel_academico')
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
