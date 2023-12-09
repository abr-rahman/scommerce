<?php

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
        Schema::create('dealer_ships', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('business_name');
            $table->text('business_address');
            $table->string('trade_license_number');
            $table->string('trade_license_photo')->nullable();
            $table->text('attachment')->nullable();
            $table->string('bin_number')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('tin_photo')->nullable();
            $table->string('nid_number')->unique()->nullable();
            $table->string('nid_photo')->nullable();
            $table->text('others')->nullable();
            $table->text('p_address')->nullable();
            $table->string('status')->default(2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealer_ships');
    }
};
