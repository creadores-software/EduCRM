<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionRelacionalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informacion_relacional';

    /**
     * Run the migrations.
     * @table informacion_relacional
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('maximo_nivel_formacion_id')->nullable()->default(null);
            $table->unsignedInteger('ocupacion_actual_id')->nullable()->default(null);
            $table->unsignedInteger('estilo_vida_id')->nullable()->default(null);
            $table->unsignedInteger('religion_id')->nullable()->default(null);
            $table->unsignedInteger('raza_id')->nullable()->default(null);
            $table->unsignedInteger('generacion_id')->nullable()->default(null);
            $table->unsignedInteger('personalidad_id')->nullable()->default(null);
            $table->unsignedInteger('beneficio_id')->nullable()->default(null);
            $table->unsignedInteger('frecuencia_uso_id')->nullable()->default(null);
            $table->unsignedInteger('estatus_usuario_id')->nullable()->default(null);
            $table->unsignedInteger('estatus_lealtad_id')->nullable()->default(null);
            $table->unsignedInteger('estado_disposicion_id')->nullable()->default(null);
            $table->unsignedInteger('actitud_servicio_id')->nullable()->default(null);
            $table->tinyInteger('autoriza_comunicacion')->nullable()->default('1');

            $table->index(["generacion_id"], 'fk_informacion_relacional_generacion_idx');

            $table->index(["estado_disposicion_id"], 'fk_informacion_relacional_estado_disposicion_idx');

            $table->index(["religion_id"], 'fk_informacion_relacional_religion_idx');

            $table->index(["estatus_lealtad_id"], 'fk_informacion_relacional_estatus_lealtad_idx');

            $table->index(["maximo_nivel_formacion_id"], 'fk_informacion_relacional_nivel_educativo_idx');

            $table->index(["beneficio_id"], 'fk_informacion_relacional_beneficio_idx');

            $table->index(["frecuencia_uso_id"], 'fk_informacion_relacional_frecuencia_uso_idx');

            $table->index(["raza_id"], 'fk_informacion_relacional_raza_idx');

            $table->index(["ocupacion_actual_id"], 'fk_informacion_relacional_ocupacion_idx');

            $table->index(["actitud_servicio_id"], 'fk_informacion_relacional_actitud_idx');

            $table->index(["personalidad_id"], 'fk_informacion_relacional_personalidad_idx');

            $table->index(["estatus_usuario_id"], 'fk_informacion_relacional_estatus_usuario_idx');

            $table->index(["estilo_vida_id"], 'fk_informacion_relacional_estilo_vida_idx');


            $table->foreign('actitud_servicio_id', 'fk_informacion_relacional_actitud_idx')
                ->references('id')->on('actitud_servicio')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('beneficio_id', 'fk_informacion_relacional_beneficio_idx')
                ->references('id')->on('beneficio')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estado_disposicion_id', 'fk_informacion_relacional_estado_disposicion_idx')
                ->references('id')->on('estado_disposicion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estatus_lealtad_id', 'fk_informacion_relacional_estatus_lealtad_idx')
                ->references('id')->on('estatus_lealtad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estatus_usuario_id', 'fk_informacion_relacional_estatus_usuario_idx')
                ->references('id')->on('estatus_usuario')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estilo_vida_id', 'fk_informacion_relacional_estilo_vida_idx')
                ->references('id')->on('estilo_vida')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('frecuencia_uso_id', 'fk_informacion_relacional_frecuencia_uso_idx')
                ->references('id')->on('frecuencia_uso')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('generacion_id', 'fk_informacion_relacional_generacion_idx')
                ->references('id')->on('generacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('maximo_nivel_formacion_id', 'fk_informacion_relacional_nivel_educativo_idx')
                ->references('id')->on('nivel_formacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('ocupacion_actual_id', 'fk_informacion_relacional_ocupacion_idx')
                ->references('id')->on('ocupacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('personalidad_id', 'fk_informacion_relacional_personalidad_idx')
                ->references('id')->on('personalidad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('raza_id', 'fk_informacion_relacional_raza_idx')
                ->references('id')->on('raza')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('religion_id', 'fk_informacion_relacional_religion_idx')
                ->references('id')->on('religion')
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
