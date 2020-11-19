<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciaFormacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'preferencia_formacion';

    /**
     * Run the migrations.
     * @table preferencia_formacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('informacion_relacional_id');
            $table->integer('formacion_id');

            $table->index(["formacion_id"], 'fk_formacion_has_informacion_relacional_formacion1_idx');

            $table->index(["informacion_relacional_id"], 'fk_formacion_has_informacion_relacional_informacion_relacio_idx');


            $table->foreign('formacion_id', 'fk_formacion_has_informacion_relacional_formacion1_idx')
                ->references('id')->on('formacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('informacion_relacional_id', 'fk_formacion_has_informacion_relacional_informacion_relacio_idx')
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
