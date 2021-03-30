<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentescoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'parentesco';

    /**
     * Run the migrations.
     * @table parentesco
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('contacto_origen');
            $table->unsignedInteger('contacto_destino');
            $table->unsignedInteger('tipo_parentesco_id');
            $table->tinyInteger('acudiente')->nullable()->default('0');

            $table->index(["contacto_destino"], 'fk_parentesco_contacto_destino_idx');

            $table->index(["contacto_origen"], 'fk_parentesco_contacto_origen_idx');

            $table->index(["tipo_parentesco_id"], 'fk_parentesco_tipo_parentesco_idx');


            $table->foreign('contacto_destino', 'fk_parentesco_contacto_destino_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('contacto_origen', 'fk_parentesco_contacto_origen_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('tipo_parentesco_id', 'fk_parentesco_tipo_parentesco_idx')
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
