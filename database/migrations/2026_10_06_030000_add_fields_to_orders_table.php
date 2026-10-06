<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_code')->nullable()->unique()->after('id');
            $table->string('customer_name')->nullable()->after('user_id');
            $table->string('customer_phone')->nullable()->after('customer_name');
            $table->decimal('shipping_fee', 15, 2)->default(0)->after('total_price');
            $table->decimal('discount_amount', 15, 2)->default(0)->after('shipping_fee');
        });
        
        // Update existing orders with a generated code
        DB::table('orders')->whereNull('order_code')->chunkById(100, function ($orders) {
            foreach ($orders as $order) {
                DB::table('orders')
                    ->where('id', $order->id)
                    ->update(['order_code' => 'ORD-' . str_pad($order->id, 6, '0', STR_PAD_LEFT)]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['order_code', 'customer_name', 'customer_phone', 'shipping_fee', 'discount_amount']);
        });
    }
};
