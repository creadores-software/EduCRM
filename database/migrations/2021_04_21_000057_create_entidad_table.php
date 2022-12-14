<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'entidad';

    /**
     * Run the migrations.
     * @table entidad
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 200);
            $table->string('nit', 45)->nullable();
            $table->unsignedInteger('lugar_id');
            $table->string('direccion', 200)->nullable()->default(null);
            $table->string('barrio', 150)->nullable();
            $table->string('correo', 200)->nullable();
            $table->string('telefono', 150)->nullable()->default(null)->comment('Se deja más espacio en caso de tener más telefonos');
            $table->string('sitio_web')->nullable();
            $table->unsignedInteger('sector_id')->nullable()->default(null);
            $table->unsignedInteger('actividad_economica_id')->nullable()->default(null);
            $table->string('codigo_ies', 10)->nullable()->comment('Se diligencia si es IES');
            $table->tinyInteger('acreditacion_ies')->nullable();
            $table->enum('calendario', ['A', 'B'])->nullable()->comment('Se diligencia si es Colegios');
            $table->tinyInteger('mi_universidad')->nullable()->default('0');

            $table->index(["actividad_economica_id"], 'fk_entidad_actividad_economica_idx');

            $table->index(["sector_id"], 'fk_entidad_sector_idx');

            $table->index(["lugar_id"], 'fk_empresa_lugar_idx');


            $table->foreign('lugar_id', 'fk_empresa_lugar_idx')
                ->references('id')->on('lugar')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('actividad_economica_id', 'fk_entidad_actividad_economica_idx')
                ->references('id')->on('actividad_economica')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('sector_id', 'fk_entidad_sector_idx')
                ->references('id')->on('sector')
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
