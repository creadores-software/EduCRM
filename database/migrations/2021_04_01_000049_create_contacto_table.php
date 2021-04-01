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
            $table->unsignedInteger('tipo_documento_id')->nullable()->default(null);
            $table->string('identificacion', 30)->nullable()->default(null);
            $table->unsignedInteger('prefijo_id')->nullable()->default(null);
            $table->string('nombres', 200);
            $table->string('apellidos', 200);
            $table->date('fecha_nacimiento')->nullable()->default(null);
            $table->unsignedInteger('genero_id')->nullable()->default(null);
            $table->unsignedInteger('estado_civil_id')->nullable()->default(null);
            $table->string('celular', 15);
            $table->string('telefono', 15)->nullable()->default(null);
            $table->string('correo_personal', 200);
            $table->string('correo_institucional', 200)->nullable()->default(null);
            $table->unsignedInteger('lugar_residencia')->nullable()->default(null);
            $table->string('direccion_residencia', 200)->nullable()->default(null);
            $table->unsignedInteger('estrato')->nullable()->default(null);
            $table->tinyInteger('activo')->nullable()->default('1');
            $table->string('observacion')->nullable()->default(null);
            $table->unsignedInteger('referido_por')->nullable()->default(null)->comment(' Solo se debe diligenciar cuando el origen es referido.');
            $table->unsignedInteger('origen_id');
            $table->string('otro_origen', 45)->nullable()->default(null);
            $table->unsignedInteger('informacion_relacional_id')->nullable()->default(null);

            $table->index(["prefijo_id"], 'fk_contacto_prefijo');

            $table->index(["genero_id"], 'fk_contacto_genero');

            $table->index(["lugar_residencia"], 'fk_contacto_ciudad');

            $table->index(["tipo_documento_id"], 'fk_contacto_tipo_documento');

            $table->index(["referido_por"], 'fk_contacto_referido_idx');

            $table->index(["estado_civil_id"], 'fk_contacto_estado_civil');

            $table->index(["origen_id"], 'fk_contacto_origen_idx');

            $table->index(["informacion_relacional_id"], 'fk_contacto_informacion_relacional_idx');


            $table->foreign('lugar_residencia', 'fk_contacto_ciudad')
                ->references('id')->on('lugar')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estado_civil_id', 'fk_contacto_estado_civil')
                ->references('id')->on('estado_civil')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('genero_id', 'fk_contacto_genero')
                ->references('id')->on('genero')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('informacion_relacional_id', 'fk_contacto_informacion_relacional_idx')
                ->references('id')->on('informacion_relacional')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('origen_id', 'fk_contacto_origen_idx')
                ->references('id')->on('origen')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('prefijo_id', 'fk_contacto_prefijo')
                ->references('id')->on('prefijo')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('referido_por', 'fk_contacto_referido_idx')
                ->references('id')->on('contacto')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('tipo_documento_id', 'fk_contacto_tipo_documento')
                ->references('id')->on('tipo_documento')
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
