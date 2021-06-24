<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaniaFormacionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'campania_formaciones';

    /**
     * Run the migrations.
     * @table campania_formaciones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('campania_id');
            $table->unsignedInteger('formacion_id');

            $table->index(["campania_id"], 'fk_campania_formaciones_campania_idx');

            $table->index(["formacion_id"], 'fk_campania_formaciones_formacion_idx');


            $table->foreign('campania_id', 'fk_campania_formaciones_campania_idx')
                ->references('id')->on('campania')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('formacion_id', 'fk_campania_formaciones_formacion_idx')
                ->references('id')->on('formacion')
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
