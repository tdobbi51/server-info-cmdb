<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interfaces', function (Blueprint $table) {

            $table->increments('id');
            
            $table->string('name');

            $table->string('ip')->unique()->index();

            $table->string('dns_name')->nullable()->index();

            $table->integer('host_id')->unsigned()->nullable();

            // If host is deleted, delete the associated interface records
            $table->foreign('host_id')->references('id')->on('hosts')->onDelete('cascade');

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
        Schema::drop('interfaces');
    }
}
