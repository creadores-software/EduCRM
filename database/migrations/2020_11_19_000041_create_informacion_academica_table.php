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
            $table->unsignedInteger('contacto_id');
            $table->unsignedInteger('entidad_id');
            $table->unsignedInteger('formacion_id');
            $table->tinyInteger('finalizado')->nullable()->default(null);
            $table->date('fecha_grado_estimada')->nullable()->default(null);
            $table->date('fecha_grado_real')->nullable()->default(null);

            $table->index(["entidad_id"], 'fk_informacion_academica_entidad_idx');

            $table->index(["contacto_id"], 'fk_informacion_academica_contacto_idx');

            $table->index(["formacion_id"], 'fk_informacion_academica_formacion_idx');


            $table->foreign('contacto_id', 'fk_informacion_academica_contacto_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('entidad_id', 'fk_informacion_academica_entidad_idx')
                ->references('id')->on('entidad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('formacion_id', 'fk_informacion_academica_formacion_idx')
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
