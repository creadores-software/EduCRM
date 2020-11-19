<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contacto';

    /**
     * Run the migrations.
     * @table contacto
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tipo_documento_id')->nullable()->comment('
');
            $table->string('identificacion', 30)->nullable();
            $table->integer('prefijo_id')->nullable();
            $table->string('nombres', 200);
            $table->string('apellidos', 200);
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('genero_id')->nullable();
            $table->integer('estado_civil_id')->nullable();
            $table->string('celular', 15);
            $table->string('telefono', 15)->nullable();
            $table->string('correo_personal', 200);
            $table->string('correo_institucional', 200)->nullable();
            $table->integer('lugar_residencia')->nullable();
            $table->string('direccion_residencia', 200)->nullable();
            $table->integer('estrato')->nullable();
            $table->boolean('activo')->nullable()->default('1');
            $table->string('observacion')->nullable();

            $table->index(["prefijo_id"], 'fk_contacto_prefijo_idx');

            $table->index(["tipo_documento_id"], 'fk_contacto_tipo_documento_idx');

            $table->index(["genero_id"], 'fk_contacto_genero_idx');

            $table->index(["estado_civil_id"], 'fk_contacto_estado_civil_idx');

            $table->index(["lugar_residencia"], 'fk_contacto_ciudad_idx');


            $table->foreign('tipo_documento_id', 'fk_contacto_tipo_documento_idx')
                ->references('id')->on('tipo_documento')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('prefijo_id', 'fk_contacto_prefijo_idx')
                ->references('id')->on('prefijo')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estado_civil_id', 'fk_contacto_estado_civil_idx')
                ->references('id')->on('estado_civil')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('lugar_residencia', 'fk_contacto_ciudad_idx')
                ->references('id')->on('lugar')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('genero_id', 'fk_contacto_genero_idx')
                ->references('id')->on('genero')
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
