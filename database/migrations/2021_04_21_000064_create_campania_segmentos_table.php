<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaniaSegmentosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'campania_segmentos';

    /**
     * Run the migrations.
     * @table campania_segmentos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('campania_id');
            $table->unsignedInteger('segmento_id');
            $table->integer('orden');
            $table->enum('operador', ['Y', 'O'])->default('Y')->comment('Y: And, O: Or');

            $table->index(["segmento_id"], 'fk_campania_has_segmento_segmento_idx');

            $table->index(["campania_id"], 'fk_campania_has_segmento_campania_idx');


            $table->foreign('campania_id', 'fk_campania_has_segmento_campania_idx')
                ->references('id')->on('campania')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('segmento_id', 'fk_campania_has_segmento_segmento_idx')
                ->references('id')->on('segmento')
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
