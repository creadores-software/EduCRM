<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciaActividadOcioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'preferencia_actividad_ocio';

    /**
     * Run the migrations.
     * @table preferencia_actividad_ocio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('informacion_relacional_id');
            $table->unsignedInteger('actividad_ocio_id');

            $table->index(["actividad_ocio_id"], 'fk_preferencia_actividad_ocio_idx');

            $table->index(["informacion_relacional_id"], 'fk_preferencia_relacional_idx');


            $table->foreign('actividad_ocio_id', 'fk_preferencia_actividad_ocio_idx')
                ->references('id')->on('actividad_ocio')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('informacion_relacional_id', 'fk_preferencia_relacional_idx')
                ->references('id')->on('informacion_relacional')
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
