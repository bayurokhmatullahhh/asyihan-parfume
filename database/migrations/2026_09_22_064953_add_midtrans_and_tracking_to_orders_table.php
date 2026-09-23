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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('snap_token', 255)->nullable()->after('payment_status');
            $table->string('midtrans_transaction_id', 100)->nullable()->after('snap_token');
            $table->string('midtrans_payment_type', 50)->nullable()->after('midtrans_transaction_id');
            $table->timestamp('paid_at')->nullable()->after('midtrans_payment_type');
            $table->string('tracking_number', 100)->nullable()->after('paid_at');
            $table->string('tracking_courier', 50)->nullable()->after('tracking_number');
            $table->timestamp('shipped_at')->nullable()->after('tracking_courier');
            $table->timestamp('delivered_at')->nullable()->after('shipped_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'snap_token',
                'midtrans_transaction_id',
                'midtrans_payment_type',
                'paid_at',
                'tracking_number',
                'tracking_courier',
                'shipped_at',
                'delivered_at',
            ]);
        });
    }
};
