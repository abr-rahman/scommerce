<?php

use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Division::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(District::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Upazila::class)->nullable()->constrained()->onDelete('cascade');
            $table->float('charge')->nullable();
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
        Schema::dropIfExists('shippings');
    }
};
