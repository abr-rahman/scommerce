<?php

use App\Enums\StatusEnum;
use App\Models\District;
use App\Models\Upazila;
use Devfaysal\BangladeshGeocode\Models\Division;
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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('org_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('location')->nullable();
            $table->foreignIdFor(District::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Upazila::class)->nullable()->constrained()->onDelete('cascade');
            $table->string('social_link')->nullable();
            $table->string('status')->default(StatusEnum::Active->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
