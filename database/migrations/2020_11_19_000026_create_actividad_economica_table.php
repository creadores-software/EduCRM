<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadEconomicaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'actividad_economica';

    /**
     * Run the migrations.
     * @table actividad_economica
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('categoria_actividad_economica_id');
            $table->string('nombre', 150);
            $table->boolean('es_ies')->nullable()->default('0');
            $table->boolean('es_colegio')->nullable()->default('0');

            $table->index(["categoria_actividad_economica_id"], 'fk_actividad_economica_categoria_actividad_economica1_idx');


            $table->foreign('categoria_actividad_economica_id', 'fk_actividad_economica_categoria_actividad_economica1_idx')
                ->references('id')->on('categoria_actividad_economica')
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
