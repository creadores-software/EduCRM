<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionUniversitariaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informacion_universitaria';

    /**
     * Run the migrations.
     * @table informacion_universitaria
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
            $table->unsignedInteger('tipo_acceso_id')->nullable();
            $table->date('fecha_inicio')->nullable()->default(null);
            $table->date('fecha_grado')->nullable()->default(null);
            $table->unsignedInteger('periodo_academico_inicial')->nullable();
            $table->unsignedInteger('periodo_academico_final')->nullable();
            $table->tinyInteger('finalizado')->nullable()->default(null);
            $table->double('promedio')->nullable();
            $table->integer('periodo_alcanzado')->nullable();

            $table->index(["periodo_academico_final"], 'fk_informacion_universitaria_periodo_academico_final_idx');

            $table->index(["entidad_id"], 'fk_informacion_universitaria_entidad_idx');

            $table->index(["tipo_acceso_id"], 'fk_informacion_universitaria_tipo_acceso_idx');

            $table->index(["formacion_id"], 'fk_informacion_universitaria_formacion_idx');

            $table->index(["periodo_academico_inicial"], 'fk_informacion_universitaria_periodo_academico_inicial_idx');

            $table->index(["contacto_id"], 'fk_informacion_universitaria_contacto_idx');


            $table->foreign('contacto_id', 'fk_informacion_universitaria_contacto_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('entidad_id', 'fk_informacion_universitaria_entidad_idx')
                ->references('id')->on('entidad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('formacion_id', 'fk_informacion_universitaria_formacion_idx')
                ->references('id')->on('formacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('tipo_acceso_id', 'fk_informacion_universitaria_tipo_acceso_idx')
                ->references('id')->on('tipo_acceso')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('periodo_academico_inicial', 'fk_informacion_universitaria_periodo_academico_inicial_idx')
                ->references('id')->on('periodo_academico')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('periodo_academico_final', 'fk_informacion_universitaria_periodo_academico_final_idx')
                ->references('id')->on('periodo_academico')
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
