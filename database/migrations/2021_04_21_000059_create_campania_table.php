<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaniaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'campania';

    /**
     * Run the migrations.
     * @table campania
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('tipo_campania_id');
            $table->string('nombre', 150);
            $table->unsignedInteger('periodo_academico_id');
            $table->unsignedInteger('equipo_mercadeo_id');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->text('descripcion')->nullable();
            $table->double('inversion')->nullable();
            $table->unsignedInteger('nivel_formacion_id')->nullable();
            $table->unsignedInteger('nivel_academico_id')->nullable();
            $table->unsignedInteger('facultad_id')->nullable();
            $table->unsignedInteger('segmento_id')->nullable();
            $table->tinyInteger('activa')->default('1');

            $table->index(["segmento_id"], 'fk_campania_segmento_idx');

            $table->index(["nivel_formacion_id"], 'fk_campania_nivel_formacion_idx');

            $table->index(["nivel_academico_id"], 'fk_campania_nivel_academico_idx');

            $table->index(["tipo_campania_id"], 'fk_campania_tipo_campania_idx');

            $table->index(["periodo_academico_id"], 'fk_campania_periodo_academico_idx');

            $table->index(["equipo_mercadeo_id"], 'fk_campania_equipo_mercadeo_idx');

            $table->index(["facultad_id"], 'fk_campania_facultad_idx');


            $table->foreign('equipo_mercadeo_id', 'fk_campania_equipo_mercadeo_idx')
                ->references('id')->on('equipo_mercadeo')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('tipo_campania_id', 'fk_campania_tipo_campania_idx')
                ->references('id')->on('tipo_campania')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('periodo_academico_id', 'fk_campania_periodo_academico_idx')
                ->references('id')->on('periodo_academico')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('nivel_academico_id', 'fk_campania_nivel_academico_idx')
                ->references('id')->on('nivel_academico')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('nivel_formacion_id', 'fk_campania_nivel_formacion_idx')
                ->references('id')->on('nivel_formacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('facultad_id', 'fk_campania_facultad_idx')
                ->references('id')->on('facultad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('segmento_id', 'fk_campania_segmento_idx')
                ->references('id')->on('segmento')
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