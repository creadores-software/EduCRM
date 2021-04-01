<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciboTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'recibo';

    /**
     * Run the migrations.
     * @table recibo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('informacion_financiera_id');
            $table->string('referencia', 45);
            $table->double('valor');
            $table->unsignedInteger('concepto_pago_id')->nullable();
            $table->string('detalles')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->date('fecha_cobro')->nullable();
            $table->unsignedInteger('medio_pago_id')->nullable();
            $table->unsignedInteger('estado_recibo_id')->nullable();
            $table->tinyInteger('activo')->nullable();

            $table->index(["concepto_pago_id"], 'fk_recibo_concepto_pago_idx');

            $table->index(["informacion_financiera_id"], 'fk_recibo_informacion_financiera_idx');

            $table->index(["estado_recibo_id"], 'fk_recibo_estado_recibo_idx');

            $table->index(["medio_pago_id"], 'fk_recibo_medio_pago_idx');


            $table->foreign('medio_pago_id', 'fk_recibo_medio_pago_idx')
                ->references('id')->on('medio_pago')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('concepto_pago_id', 'fk_recibo_concepto_pago_idx')
                ->references('id')->on('concepto_pago')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('estado_recibo_id', 'fk_recibo_estado_recibo_idx')
                ->references('id')->on('estado_recibo')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('informacion_financiera_id', 'fk_recibo_informacion_financiera_idx')
                ->references('id')->on('informacion_financiera')
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
