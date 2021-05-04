<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'segmento';

    /**
     * Run the migrations.
     * @table segmento
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('descripcion');
            $table->text('filtros');
            $table->tinyInteger('global')->nullable()->default('0');
            $table->unsignedBigInteger('usuario_id')->nullable()->default(null);

            $table->index(["usuario_id"], 'fk_usuario_idx');


            $table->foreign('usuario_id', 'fk_usuario_idx')
                ->references('id')->on('users')
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
