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
        //
        Schema::create('users_specific', function (Blueprint $table) {
            $table->id(); 
            $table->string('email')->unique(); 
            $table->string('user_name'); 
            $table->string('password'); 
            $table->timestamps(); 

           
            $table->foreignId('user_level_id')->constrained('users_levels');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('users');
    }
};
