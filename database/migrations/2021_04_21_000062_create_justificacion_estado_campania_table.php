<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJustificacionEstadoCampaniaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'justificacion_estado_campania';

    /**
     * Run the migrations.
     * @table justificacion_estado_campania
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('estado_campania_id');
            $table->string('nombre', 45);

            $table->index(["estado_campania_id"], 'fk_justificacion_estado_campania_estado_campania_idx');


            $table->foreign('estado_campania_id', 'fk_justificacion_estado_campania_estado_campania_idx')
                ->references('id')->on('estado_campania')
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
