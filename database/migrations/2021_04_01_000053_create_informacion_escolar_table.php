<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionEscolarTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informacion_escolar';

    /**
     * Run the migrations.
     * @table informacion_escolar
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
            $table->unsignedInteger('nivel_formacion_id');
            $table->date('fecha_inicio')->nullable()->default(null);
            $table->date('fecha_grado')->nullable()->default(null);
            $table->tinyInteger('finalizado')->nullable()->default(null);
            $table->integer('grado')->nullable();

            $table->index(["contacto_id"], 'fk_informacion_escolar_contacto_idx');

            $table->index(["nivel_formacion_id"], 'fk_informacion_escolar_nivel_formacion_idx');

            $table->index(["entidad_id"], 'fk_informacion_escolar_entidad_idx');


            $table->foreign('contacto_id', 'fk_informacion_escolar_contacto_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('entidad_id', 'fk_informacion_escolar_entidad_idx')
                ->references('id')->on('entidad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('nivel_formacion_id', 'fk_informacion_escolar_nivel_formacion_idx')
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