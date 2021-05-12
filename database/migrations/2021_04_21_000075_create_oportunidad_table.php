<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOportunidadTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'oportunidad';

    /**
     * Run the migrations.
     * @table oportunidad
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('campania_id');
            $table->unsignedInteger('contacto_id');
            $table->unsignedInteger('formacion_id');
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->unsignedInteger('estado_campania_id');
            $table->unsignedInteger('justificacion_estado_campania_id');
            $table->integer('interes')->nullable();
            $table->integer('capacidad')->nullable();
            $table->unsignedInteger('categoria_oportunidad_id')->nullable();
            $table->double('ingreso_recibido')->nullable();
            $table->double('ingreso_proyectado')->nullable();
            $table->tinyInteger('adicion_manual')->nullable()->default('0');
            $table->dateTime('ultima_actualizacion')->nullable();
            $table->dateTime('ultima_interaccion')->nullable();

            $table->index(["estado_campania_id"], 'fk_oportunidad_estado_campania_idx');

            $table->index(["campania_id"], 'fk_oportunidad_campania_idx');

            $table->index(["categoria_oportunidad_id"], 'fk_oportunidad_categoria_oportunidad_idx');

            $table->index(["formacion_id"], 'fk_oportunidad_formacion_idx');

            $table->index(["contacto_id"], 'fk_oportunidad_contacto_idx');

            $table->index(["justificacion_estado_campania_id"], 'fk_oportunidad_justificacion_estado_campania_idx');


            $table->foreign('campania_id', 'fk_oportunidad_campania_idx')
                ->references('id')->on('campania')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('contacto_id', 'fk_oportunidad_contacto_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estado_campania_id', 'fk_oportunidad_estado_campania_idx')
                ->references('id')->on('estado_campania')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('justificacion_estado_campania_id', 'fk_oportunidad_justificacion_estado_campania_idx')
                ->references('id')->on('justificacion_estado_campania')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('formacion_id', 'fk_oportunidad_formacion_idx')
                ->references('id')->on('formacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('categoria_oportunidad_id', 'fk_oportunidad_categoria_oportunidad_idx')
                ->references('id')->on('categoria_oportunidad')
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