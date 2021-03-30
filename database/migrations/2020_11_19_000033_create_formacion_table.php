<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'formacion';

    /**
     * Run the migrations.
     * @table formacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 150);
            $table->unsignedInteger('entidad_id');
            $table->unsignedInteger('nivel_formacion_id');
            $table->unsignedInteger('campo_educacion_id')->nullable()->default(null);
            $table->tinyInteger('activo')->nullable()->default('1');

            $table->index(["entidad_id"], 'fk_formacion_entidad_idx');

            $table->index(["campo_educacion_id"], 'fk_programa_area_conocimiento_idx');

            $table->index(["nivel_formacion_id"], 'fk_programa_nivel_educativo_idx');


            $table->foreign('entidad_id', 'fk_formacion_entidad_idx')
                ->references('id')->on('entidad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('campo_educacion_id', 'fk_programa_area_conocimiento_idx')
                ->references('id')->on('campo_educacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('nivel_formacion_id', 'fk_programa_nivel_educativo_idx')
                ->references('id')->on('nivel_formacion')
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
