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
            $table->string('order_number', 50)->nullable()->unique()->after('id');
            $table->foreignId('user_id')->nullable()->after('order_number')->constrained()->nullOnDelete();
            $table->unsignedTinyInteger('essence_number')->nullable()->change();
            $table->string('essence_name')->nullable()->change();
            $table->text('address')->nullable()->after('email');
            $table->string('city')->nullable()->after('address');
            $table->string('province')->nullable()->after('city');
            $table->string('postal_code', 20)->nullable()->after('province');
            $table->string('expedition')->nullable()->after('postal_code');
            $table->decimal('shipping_cost', 12, 2)->default(0)->after('expedition');
            $table->string('payment_method')->default('qris')->after('shipping_cost');
            $table->string('payment_status')->default('pending')->after('payment_method');
            $table->text('craftsman_note')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'order_number',
                'user_id',
                'address',
                'city',
                'province',
                'postal_code',
                'expedition',
                'shipping_cost',
                'payment_method',
                'payment_status',
                'craftsman_note',
            ]);
        });
    }
};
