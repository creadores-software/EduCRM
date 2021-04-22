<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertenenciaEquipoMercadeoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pertenencia_equipo_mercadeo';

    /**
     * Run the migrations.
     * @table pertenencia_equipo_mercadeo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedInteger('equipo_mercadeo_id');
            $table->tinyInteger('es_lider')->nullable()->default('0');

            $table->index(["equipo_mercadeo_id"], 'fk_pertenencia_equipo_equipo_mercadeo_idx');

            $table->index(["users_id"], 'fk_pertenencia_equipo_users_idx');


            $table->foreign('users_id', 'fk_pertenencia_equipo_users_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('equipo_mercadeo_id', 'fk_pertenencia_equipo_equipo_mercadeo_idx')
                ->references('id')->on('equipo_mercadeo')
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
