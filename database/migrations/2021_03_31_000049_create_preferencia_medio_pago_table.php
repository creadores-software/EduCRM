<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciaMedioPagoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'preferencia_medio_pago';

    /**
     * Run the migrations.
     * @table preferencia_medio_pago
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('informacion_financiera_id');
            $table->unsignedInteger('medio_pago_id');

            $table->index(["medio_pago_id"], 'fk_pmp_informacion_financiera_idx');

            $table->index(["informacion_financiera_id"], 'fk_pmp_medio_pago_idx');


            $table->foreign('informacion_financiera_id', 'fk_pmp_medio_pago_idx')
                ->references('id')->on('informacion_financiera')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('medio_pago_id', 'fk_pmp_informacion_financiera_idx')
                ->references('id')->on('medio_pago')
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
