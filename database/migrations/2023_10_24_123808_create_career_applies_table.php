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
        Schema::create('career_applies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('deparment')->nullable();
            $table->string('photo')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->text('skills')->nullable();
            $table->text('reason_of_join')->nullable();
            $table->text('choos_reason')->nullable();
            $table->string('cv')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_applies');
    }
};