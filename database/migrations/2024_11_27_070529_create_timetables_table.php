<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//     public function up()
//     {
//         // In migration file
// Schema::create('timetables', function (Blueprint $table) {
//     $table->id();
//     $table->string('class');
//     $table->integer('days');
//     $table->integer('periods');
//     $table->time('time');
//     $table->integer('duration');
//     $table->integer('breaks');
//     $table->timestamps();
// });

//     }

public function up()
{
    Schema::create('timetables', function (Blueprint $table) {
        $table->id();
        $table->string('class');
        $table->integer('days');
        $table->integer('periods');
        $table->time('time');
        $table->integer('duration');
        $table->integer('breaks');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::create('timetables', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('class');
    //         $table->integer('days');
    //         $table->integer('periods');
    //         $table->time('time');
    //         $table->integer('duration');
    //         $table->timestamps();
    //     });
        
    // }

    public function down()
    {
        Schema::dropIfExists('timetables');
    }

    
}
