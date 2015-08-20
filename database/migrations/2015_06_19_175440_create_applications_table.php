<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->integer('environment_id')->unsigned();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->integer('business_id')->unsigned();
            $table->text('notes')->nullable();
            $table->integer('devteam_id')->unsigned()->nullable();
            $table->foreign('devteam_id')->references('id')->on('devteams');    
            $table->foreign('environment_id')->references('id')->on('environments');  
            $table->foreign('business_id')->references('id')->on('businesses'); 
                 
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
        Schema::drop('applications');
    }
}
