<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoCampaniaEstadosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tipo_campania_estados';

    /**
     * Run the migrations.
     * @table tipo_campania_estados
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('tipo_campania_id');
            $table->unsignedInteger('estado_campania_id');
            $table->integer('orden');
            $table->integer('dias_cambio')->comment('Cantidad de dias en los que se espera que la persona cambie a un nuevo estado.');

            $table->index(["estado_campania_id"], 'fk_tipo_campania_estado_campania_estado_campania_idx');

            $table->index(["tipo_campania_id"], 'fk_tipo_campania_estado_campania_tipo_campania_idx');


            $table->foreign('tipo_campania_id', 'fk_tipo_campania_estado_campania_tipo_campania_idx')
                ->references('id')->on('tipo_campania')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('estado_campania_id', 'fk_tipo_campania_estado_campania_estado_campania_idx')
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
