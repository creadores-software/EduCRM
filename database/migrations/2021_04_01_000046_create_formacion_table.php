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
            $table->integer('codigo_snies')->nullable();
            $table->string('titulo_otorgado', 150)->nullable()->default(null);
            $table->unsignedInteger('campo_educacion_id')->nullable()->default(null);
            $table->unsignedInteger('modalidad_id')->nullable();
            $table->unsignedInteger('periodicidad_id')->nullable();
            $table->integer('periodos_duracion')->nullable();
            $table->unsignedInteger('reconocimiento_id')->nullable();
            $table->double('costo_matricula')->nullable();
            $table->tinyInteger('activo')->nullable()->default('1');
            $table->unsignedInteger('facultad_id')->nullable();

            $table->index(["reconocimiento_id"], 'fk_formacion_reconocimiento_idx');

            $table->index(["campo_educacion_id"], 'fk_programa_area_conocimiento');

            $table->index(["nivel_formacion_id"], 'fk_programa_nivel_formacion');

            $table->index(["entidad_id"], 'fk_formacion_entidad');

            $table->index(["periodicidad_id"], 'fk_formacion_periodicidad_idx');

            $table->index(["modalidad_id"], 'fk_formacion_modalidad_idx');

            $table->index(["facultad_id"], 'fk_formacion_facultad1_idx');


            $table->foreign('entidad_id', 'fk_formacion_entidad')
                ->references('id')->on('entidad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('campo_educacion_id', 'fk_programa_area_conocimiento')
                ->references('id')->on('campo_educacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('nivel_formacion_id', 'fk_programa_nivel_formacion')
                ->references('id')->on('nivel_formacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('modalidad_id', 'fk_formacion_modalidad_idx')
                ->references('id')->on('modalidad')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('reconocimiento_id', 'fk_formacion_reconocimiento_idx')
                ->references('id')->on('reconocimiento')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('periodicidad_id', 'fk_formacion_periodicidad_idx')
                ->references('id')->on('periodicidad')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('facultad_id', 'fk_formacion_facultad1_idx')
                ->references('id')->on('facultad')
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