<?php

use App\Models\BulkVariant;
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
        Schema::create('bulk_variant_children', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BulkVariant::class)->nullable()->constrained()->onDelete('cascade');
            $table->string('child_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulk_variant_children');
    }
};
