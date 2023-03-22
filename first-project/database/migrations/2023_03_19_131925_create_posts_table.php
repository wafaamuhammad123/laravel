<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
 { 
    /**
     * Run the migrations.
     */

     //if i wanna edit in the columns i have to make new file

     //Im creating a posts table that has these columns
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            //will create to me 2 columns(updated at,created at)
        });
    }

};

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class () extends Migration {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('posts', function (Blueprint $table) {
//             $table->id();
//             $table->string('title');
//             $table->text('description');
//             $table->unsignedBigInteger('user_id');
//             $table->foreign('user_id')->references('id')->on('users');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
// };