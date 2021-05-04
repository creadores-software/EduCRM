<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ledgers';

    /**
     * Run the migrations.
     * @table ledgers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('user_type')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->string('recordable_type');
            $table->unsignedBigInteger('recordable_id');
            $table->unsignedTinyInteger('context');
            $table->string('event');
            $table->text('properties');
            $table->text('modified');
            $table->text('pivot');
            $table->text('extra');
            $table->text('url')->nullable()->default(null);
            $table->string('ip_address', 45)->nullable()->default(null);
            $table->string('user_agent')->nullable()->default(null);
            $table->string('signature');

            $table->index(["user_id", "user_type"], 'ledgers_user_id_user_type_index');

            $table->index(["recordable_type", "recordable_id"], 'ledgers_recordable_type_recordable_id_index');
            $table->nullableTimestamps();
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
