<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcupacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ocupacion';

    /**
     * Run the migrations.
     * @table ocupacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 150);
            $table->unsignedInteger('tipo_ocupacion_id');

            $table->index(["tipo_ocupacion_id"], 'fk_ocupacion_tipo_ocupacion_idx');


            $table->foreign('tipo_ocupacion_id', 'fk_ocupacion_tipo_ocupacion_idx')
                ->references('id')->on('tipo_ocupacion')
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
