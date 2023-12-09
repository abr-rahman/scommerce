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
        Schema::create('utils', function (Blueprint $table) {
            $table->id();
            $table->longText('privacy')->nullable();
            $table->longText('terms')->nullable();
            $table->longText('refund_policy')->nullable();
            $table->longText('warranty_policy')->nullable();
            $table->longText('others')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utils');
    }
};
