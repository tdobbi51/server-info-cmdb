<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_host', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('host_id')->unsigned()->index();

            // Deleting a host will also delete the link to its assiciated applications
            // it will not delete the application records, just the association in this pivit table            
            $table->foreign('host_id')->references('id')->on('hosts')->onDelete('cascade');

            $table->integer('application_id')->unsigned()->index();

            // Deleting an application will also delete the link to its assiciated hosts
            // it will not delete the host record, just the association in this pivit table
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');


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
        Schema::drop('application_host');
    }
}
