<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampoEducacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'campo_educacion';

    /**
     * Run the migrations.
     * @table campo_educacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('categoria_campo_educacion_id');
            $table->string('nombre', 150);

            $table->index(["categoria_campo_educacion_id"], 'fk_categoria_campo_educacion_idx');


            $table->foreign('categoria_campo_educacion_id', 'fk_categoria_campo_educacion_idx')
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
