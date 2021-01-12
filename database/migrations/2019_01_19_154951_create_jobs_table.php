<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('years_of_experience',['1 Year','2 Year','3 Year','4 Year','More than 5 year']);
            $table->enum('computer',['Excellent','Very Good','Good','Acceptable','Not Required']);
            $table->enum('gander',['Male','Female','Males and females']);
            $table->enum('qualification',['Higher education','Above average education','Intermediate Education (Diploma)','Masters','Doctor','Without education']);
            $table->enum('english_language',['Excellent','Very Good','Good','Acceptable','Not Required']);
            $table->enum('microsoft_office',['Excellent','Very Good','Good','Acceptable','Not Required']);
            $table->enum('age',['18 - 25 year','26 - 35 year','36 - 55 year','All Ages']);
            $table->text('other_conditions')->nullable();
            $table->string('basic_salary')->nullable();
            $table->enum('Job_type',['Full Time','Part Time','Freelancer']);
            $table->string('Job_title');
            // City Id
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            // Employments Id
            $table->integer('employments_id')->unsigned();
            $table->foreign('employments_id')->references('id')->on('employments')->onUpdate('cascade')->onDelete('cascade');
            // User Id
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->text('job_details')->nullable();
            $table->integer('accept');
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
        Schema::dropIfExists('jobs');
    }
}
