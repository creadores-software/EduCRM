<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoInteraccionEstadosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tipo_interaccion_estados';

    /**
     * Run the migrations.
     * @table tipo_interaccion_estados
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('tipo_interaccion_id');
            $table->unsignedInteger('estado_interaccion_id');

            $table->index(["estado_interaccion_id"], 'fk_tipo_interaccion_has_estado_interaccion_estado_interacci_idx');

            $table->index(["tipo_interaccion_id"], 'fk_tipo_interaccion_has_estado_interaccion_tipo_interaccion_idx');


            $table->foreign('tipo_interaccion_id', 'fk_tipo_interaccion_has_estado_interaccion_tipo_interaccion_idx')
                ->references('id')->on('tipo_interaccion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estado_interaccion_id', 'fk_tipo_interaccion_has_estado_interaccion_estado_interacci_idx')
                ->references('id')->on('estado_interaccion')
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
