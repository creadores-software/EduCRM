<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoParentescoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tipo_parentesco';

    /**
     * Run the migrations.
     * @table tipo_parentesco
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 100);
            $table->unsignedInteger('tipo_contrario_id')->nullable()->default(null)->comment('En el tipo madre, el contrario es hijo.');

            $table->index(["tipo_contrario_id"], 'fk_tipo_parentesco_tipo_contrario_idx');


            $table->foreign('tipo_contrario_id', 'fk_tipo_parentesco_tipo_contrario_idx')
                ->references('id')->on('tipo_parentesco')
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
