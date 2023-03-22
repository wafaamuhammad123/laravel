<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            //adding field
            //nullable means that it accepts null by def instead of 0's

            $table->foreign('user_id')->references('id')->on('users');
            //adding constraint
        });
    }
};