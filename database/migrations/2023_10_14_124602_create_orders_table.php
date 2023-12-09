<?php

use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');
            $table->string('customer_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->foreignIdFor(User::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Division::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(District::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Upazila::class)->nullable()->constrained()->onDelete('cascade');
            $table->string('thana')->nullable();
            $table->text('address')->nullable();
            $table->text('landmark')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('shipping_charge')->nullable();
            $table->float('payable_amount')->nullable();
            $table->float('due_amount')->nullable();
            $table->string('coupon_code')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('grand_total');
            $table->string('invoice_number')->unique()->nullable();
            $table->string('status')->default(2);
            $table->string('role')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
