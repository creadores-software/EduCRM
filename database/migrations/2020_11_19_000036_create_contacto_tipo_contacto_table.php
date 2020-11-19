<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTipoContactoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contacto_tipo_contacto';

    /**
     * Run the migrations.
     * @table contacto_tipo_contacto
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tipo_contacto_id');
            $table->integer('contacto_id');

            $table->index(["tipo_contacto_id"], 'fk_ctc_tipo_contacto_idx');

            $table->index(["contacto_id"], 'fk_ctc_contacto_idx');


            $table->foreign('tipo_contacto_id', 'fk_ctc_tipo_contacto_idx')
                ->references('id')->on('tipo_contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('contacto_id', 'fk_ctc_contacto_idx')
                ->references('id')->on('contacto')
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
