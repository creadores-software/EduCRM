<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionRelacionalActividadOcioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informacion_relacional_actividad_ocio';

    /**
     * Run the migrations.
     * @table informacion_relacional_actividad_ocio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('informacion_relacional_id');
            $table->integer('actividad_ocio_id');

            $table->index(["informacion_relacional_id"], 'fk_informacion_relacional_has_actividad_ocio_informacion_re_idx');

            $table->index(["actividad_ocio_id"], 'fk_informacion_relacional_has_actividad_ocio_actividad_ocio_idx');


            $table->foreign('informacion_relacional_id', 'fk_informacion_relacional_has_actividad_ocio_informacion_re_idx')
                ->references('id')->on('informacion_relacional')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('actividad_ocio_id', 'fk_informacion_relacional_has_actividad_ocio_actividad_ocio_idx')
                ->references('id')->on('actividad_ocio')
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
