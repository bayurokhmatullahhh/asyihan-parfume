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
        Schema::create('payment_gateway_settings', function (Blueprint $table) {
            $table->id();
            $table->string('gateway', 50)->default('midtrans');
            $table->string('environment', 20); // sandbox or production
            $table->string('merchant_name', 255)->nullable();
            $table->text('client_key')->nullable(); // encrypted
            $table->text('server_key')->nullable(); // encrypted
            $table->boolean('is_active')->default(false);
            $table->boolean('is_3ds')->default(true);
            $table->string('active_environment', 20)->default('sandbox');
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->unique(['gateway', 'environment']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateway_settings');
    }
};
