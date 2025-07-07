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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->text('description'); 
            $table->string('status');
            $table->string('image')->nullable();
            $table->string('finish_date'); 
            $table->timestamps(); 

            
            $table->foreignId('tag_id')->constrained('tags');
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('user_specific_id')->constrained('users_specific');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('events');
    }
};
