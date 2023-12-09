<?php

use App\Models\OfflineCustomer;
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
        Schema::create('offline_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(OfflineCustomer::class)->constrained()->onDelete('cascade');
            $table->float('sub_total')->nullable();
            $table->float('grand_total');
            $table->string('invoice_number')->unique()->nullable();
            $table->float('payable_amount')->nullable();
            $table->float('due_amount')->nullable();
            $table->float('vat')->nullable();
            $table->float('shipping_charge')->nullable();
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
        Schema::dropIfExists('offline_orders');
    }
};
