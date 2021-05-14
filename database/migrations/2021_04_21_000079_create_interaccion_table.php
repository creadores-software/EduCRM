<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteraccionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'interaccion';

    /**
     * Run the migrations.
     * @table interaccion
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->unsignedInteger('tipo_interaccion_id');
            $table->unsignedInteger('estado_interaccion_id');
            $table->string('observacion');
            $table->unsignedInteger('oportunidad_id')->nullable()->comment('Interacción en medio de una campaña.');
            $table->unsignedInteger('contacto_id')->nullable()->comment('Si el contacto se hace en un contexo diferente a camapaña.');
            $table->unsignedBigInteger('users_id');

            $table->index(["users_id"], 'fk_interaccion_users1_idx');

            $table->index(["tipo_interaccion_id"], 'fk_interaccion_tipo_interaccion_idx');

            $table->index(["contacto_id"], 'fk_interaccion_contacto_idx');

            $table->index(["oportunidad_id"], 'fk_interaccion_oportunidad_idx');

            $table->index(["estado_interaccion_id"], 'fk_interaccion_estado_interaccion_idx');


            $table->foreign('tipo_interaccion_id', 'fk_interaccion_tipo_interaccion_idx')
                ->references('id')->on('tipo_interaccion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estado_interaccion_id', 'fk_interaccion_estado_interaccion_idx')
                ->references('id')->on('estado_interaccion')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('oportunidad_id', 'fk_interaccion_oportunidad_idx')
                ->references('id')->on('oportunidad')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('contacto_id', 'fk_interaccion_contacto_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('users_id', 'fk_interaccion_users1_idx')
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