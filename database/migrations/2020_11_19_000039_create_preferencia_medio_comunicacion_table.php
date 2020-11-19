<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciaMedioComunicacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'preferencia_medio_comunicacion';

    /**
     * Run the migrations.
     * @table preferencia_medio_comunicacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('informacion_relacional_id');
            $table->integer('medio_comunicacion_id');

            $table->index(["informacion_relacional_id"], 'fk_informacion_relacional_has_medio_comunicacion_informacio_idx');

            $table->index(["medio_comunicacion_id"], 'fk_informacion_relacional_has_medio_comunicacion_medio_comu_idx');


            $table->foreign('informacion_relacional_id', 'fk_informacion_relacional_has_medio_comunicacion_informacio_idx')
                ->references('id')->on('informacion_relacional')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('medio_comunicacion_id', 'fk_informacion_relacional_has_medio_comunicacion_medio_comu_idx')
                ->references('id')->on('medio_comunicacion')
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
