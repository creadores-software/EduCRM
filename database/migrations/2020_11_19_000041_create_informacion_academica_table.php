<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionAcademicaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informacion_academica';

    /**
     * Run the migrations.
     * @table informacion_academica
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('contacto_id');
            $table->integer('formacion_id')->comment('Solo es requerido cuando se trata de un estudio de educación superior. No aplica para colegio.');
            $table->boolean('finalizado')->nullable();
            $table->date('fecha_grado_estimada')->nullable();
            $table->date('fecha_grado_real')->nullable();

            $table->index(["formacion_id"], 'fk_informacion_academica_programa1_idx');

            $table->index(["contacto_id"], 'fk_informacion_academica_contacto1_idx');


            $table->foreign('contacto_id', 'fk_informacion_academica_contacto1_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('formacion_id', 'fk_informacion_academica_programa1_idx')
                ->references('id')->on('formacion')
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
