<?php

use App\Models\Color;
use App\Models\OfflineOrder;
use App\Models\Product;
use App\Models\Size;
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
        Schema::create('offline_order_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(OfflineOrder::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Color::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Size::class)->nullable()->constrained()->onDelete('cascade');
            $table->float('product_price');
            $table->string('quantity');
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
        Schema::dropIfExists('offline_order_lists');
    }
};
