<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciaCampoEducacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'preferencia_campo_educacion';

    /**
     * Run the migrations.
     * @table preferencia_campo_educacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('campo_educacion_id');
            $table->unsignedInteger('informacion_relacional_id');

            $table->index(["informacion_relacional_id"], 'fk_pce_informacion_relacional_idx');

            $table->index(["campo_educacion_id"], 'fk_pce_campo_educacion_idx');


            $table->foreign('campo_educacion_id', 'fk_pce_campo_educacion_idx')
                ->references('id')->on('campo_educacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('informacion_relacional_id', 'fk_pce_informacion_relacional_idx')
                ->references('id')->on('informacion_relacional')
                ->onDelete('cascade')
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
