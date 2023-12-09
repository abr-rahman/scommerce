<?php

use App\Models\Attribute;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\BulkVariant;
use App\Models\Color;
use App\Models\Size;
use App\Models\Tag;
use App\Models\Tax;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(SubCategory::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Brand::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tax::class)->nullable()->constrained()->onDelete('cascade');
            $table->string('product_code', 350)->unique()->nullable();
            $table->integer('added_by')->nullable();
            $table->string('product_name');
            $table->text('tag')->nullable();
            $table->integer('numbering')->nullable()->unique();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('meterials')->nullable();
            $table->text('other_info')->nullable();
            $table->integer('warranty_day')->nullable();
            $table->string('product_image')->nullable();
            $table->text('thumbnail_image')->nullable();
            $table->string('status')->default(1);
            $table->string('a_status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
