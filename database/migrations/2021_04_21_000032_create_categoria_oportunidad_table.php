<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaOportunidadTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'categoria_oportunidad';

    /**
     * Run the migrations.
     * @table categoria_oportunidad
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
            $table->integer('interes_minimo');
            $table->integer('interes_maximo');
            $table->integer('probabilidad_minima');
            $table->integer('probabilidad_maxima');
            $table->string('color_hexadecimal', 7);
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
