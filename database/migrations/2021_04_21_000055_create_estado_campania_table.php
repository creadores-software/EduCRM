<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoCampaniaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'estado_campania';

    /**
     * Run the migrations.
     * @table estado_campania
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 45);
            $table->string('descripcion')->nullable();
            $table->unsignedInteger('tipo_estado_color_id');

            $table->index(["tipo_estado_color_id"], 'fk_estado_campania_tipo_estado_color_idx');


            $table->foreign('tipo_estado_color_id', 'fk_estado_campania_tipo_estado_color_idx')
                ->references('id')->on('tipo_estado_color')
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
