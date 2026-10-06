<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->nullable()->after('name');
            $table->string('brand')->nullable()->after('sku');
            $table->integer('import_price')->nullable()->after('brand');
            $table->integer('stock')->default(0)->after('price');
            $table->json('gallery')->nullable()->after('image');
            $table->boolean('is_active')->default(true)->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sku', 'brand', 'import_price', 'stock', 'gallery', 'is_active']);
        });
    }
};
