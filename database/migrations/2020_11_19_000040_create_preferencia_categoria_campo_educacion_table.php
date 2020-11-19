<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciaCategoriaCampoEducacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'preferencia_categoria_campo_educacion';

    /**
     * Run the migrations.
     * @table preferencia_categoria_campo_educacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('informacion_relacional_id');
            $table->integer('categoria_campo_educacion_id');

            $table->index(["categoria_campo_educacion_id"], 'fk_campo_educacion_idx');

            $table->index(["informacion_relacional_id"], 'fk_informacion_relacional_has_categoria_amplia_area_conocim_idx1');


            $table->foreign('informacion_relacional_id', 'fk_informacion_relacional_has_categoria_amplia_area_conocim_idx1')
                ->references('id')->on('informacion_relacional')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('categoria_campo_educacion_id', 'fk_campo_educacion_idx')
                ->references('id')->on('categoria_campo_educacion')
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
