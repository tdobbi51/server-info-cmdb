<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hostname')->unique()->index();
            $table->string('type')->nullable();
            $table->string('os_type')->nullable();
            $table->string('os_version')->nullable();
            $table->string('os_revision')->nullable();
            $table->mediumInteger('memory')->unsigned()->nullable();
            $table->smallInteger('cpus')->unsigned()->nullable();
            $table->smallInteger('cores')->unsigned()->nullable();
            $table->mediumInteger('speed')->unsigned()->nullable();
            $table->mediumInteger('storage')->unsigned()->nullable();
            $table->string('model')->nullable();
            $table->string('serial')->nullable();
            $table->string('asset')->nullable();
            $table->string('rack')->nullable();
            $table->string('hostid')->nullable();
            $table->string('business')->nullable();
            $table->string('contacts')->nullable();
            $table->date('inservice_date')->default('0000-00-00');
            $table->text('notes')->nullable();     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hosts');
    }
}
