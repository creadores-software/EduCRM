<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilMedioComunicacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'perfil_medio_comunicacion';

    /**
     * Run the migrations.
     * @table perfil_medio_comunicacion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('medio_comunicacion_id');
            $table->unsignedInteger('informacion_relacional_id');
            $table->string('perfil', 150);

            $table->index(["informacion_relacional_id"], 'fk_pfmc_informacion_relacional_idx');

            $table->index(["medio_comunicacion_id"], 'fk_pfmc_medio_comunicacion_idx');


            $table->foreign('medio_comunicacion_id', 'fk_pfmc_medio_comunicacion_idx')
                ->references('id')->on('medio_comunicacion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('informacion_relacional_id', 'fk_pfmc_informacion_relacional_idx')
                ->references('id')->on('informacion_relacional')
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
