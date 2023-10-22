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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectname')->nullable();
            $table->string('academicyear')->nullable();
            $table->string('gradelevel')->nullable();
            $table->string('class')->nullable();
            $table->longText('description')->nullable();
            $table->json('projectmembers')->nullable();
            $table->json('projectadvisors')->nullable();
            $table->string('abstract')->nullable();
            $table->string('code')->nullable();
            $table->string('approval')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
