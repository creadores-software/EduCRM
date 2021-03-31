<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionFinancieraTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'informacion_financiera';

    /**
     * Run the migrations.
     * @table informacion_financiera
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('rango_salario_id')->nullable();
            $table->double('saldo_favor')->nullable()->default('0');
            $table->double('saldo_pendiente')->nullable()->default('0');

            $table->index(["rango_salario_id"], 'fk_informacion_financiera_rango_salario_idx');


            $table->foreign('rango_salario_id', 'fk_informacion_financiera_rango_salario_idx')
                ->references('id')->on('rango_salario')
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
