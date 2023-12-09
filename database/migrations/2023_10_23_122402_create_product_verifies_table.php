<?php

use App\Models\Product;
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
        Schema::create('product_verifies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('barcode_number')->unique()->nullable();
            $table->string('shope_name')->nullable();
            $table->string('invoice_attachment')->nullable();
            $table->string('district')->nullable();
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
        Schema::dropIfExists('product_verifies');
    }
};







