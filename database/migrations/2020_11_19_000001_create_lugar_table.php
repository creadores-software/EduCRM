<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'lugar';

    /**
     * Run the migrations.
     * @table lugar
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->enum('tipo', ['P', 'D', 'C'])->comment('Pais, Departamento, Ciudad');
            $table->integer('padre_id')->nullable();

            $table->index(["padre_id"], 'fk_lugar_padre_idx');


            $table->foreign('padre_id', 'fk_lugar_padre_idx')
                ->references('id')->on('lugar')
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
