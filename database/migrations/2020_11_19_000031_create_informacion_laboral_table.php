<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionLaboralTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informacion_laboral';

    /**
     * Run the migrations.
     * @table informacion_laboral
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('contacto_id');
            $table->integer('entidad_id');
            $table->integer('ocupacion_id');
            $table->string('area', 45)->nullable();
            $table->string('funciones')->nullable();
            $table->string('telefono', 15)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();

            $table->index(["ocupacion_id"], 'fk_informacion_laboral_cargos1_idx');

            $table->index(["contacto_id"], 'fk_informacion_laboral_contacto1_idx');

            $table->index(["entidad_id"], 'fk_informacion_laboral_empresa1_idx');


            $table->foreign('contacto_id', 'fk_informacion_laboral_contacto1_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('ocupacion_id', 'fk_informacion_laboral_cargos1_idx')
                ->references('id')->on('ocupacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('entidad_id', 'fk_informacion_laboral_empresa1_idx')
                ->references('id')->on('entidad')
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
