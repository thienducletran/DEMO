<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $laptop = \App\Models\Category::create(['name' => 'Laptop', 'slug' => 'laptop']);
        $phone = \App\Models\Category::create(['name' => 'Điện thoại', 'slug' => 'dien-thoai']);
        $accessory = \App\Models\Category::create(['name' => 'Phụ kiện', 'slug' => 'phu-kien']);
        $monitor = \App\Models\Category::create(['name' => 'PC - Linh kiện', 'slug' => 'pc']);
        
        // Create Users with Roles
        $admin = \App\Models\User::create([
            'name' => 'Admin System',
            'email' => 'admin@techstore.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);

        $manager = \App\Models\User::create([
            'name' => 'Manager Tech',
            'email' => 'manager@techstore.com',
            'password' => bcrypt('123456'),
            'role' => 'manager'
        ]);

        $customer = \App\Models\User::create([
            'name' => 'Khách Hàng Vip',
            'email' => 'khachhang@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'customer'
        ]);

        // Create a Store for the Manager
        $store = \App\Models\Store::create([
            'user_id' => $manager->id,
            'name' => 'Gian Hàng Của Manager Tech',
            'slug' => 'gian-hang-cua-manager-tech',
            'description' => 'Chuyên bán lẻ thiết bị công nghệ chính hãng',
            'status' => 'approved' // Admin đã duyệt
        ]);

        // Products
        \App\Models\Product::insert([
            [
                'category_id' => $laptop->id,
                'name' => 'MacBook Pro 16" M3 Max',
                'slug' => 'macbook-pro-16-m3-max',
                'price' => 84990000,
                'old_price' => 89990000,
                'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&q=80&w=300',
                'rating' => 5.0,
                'reviews' => 128
            ],
            [
                'category_id' => $phone->id,
                'name' => 'iPhone 15 Pro Max 256GB',
                'slug' => 'iphone-15-pro-max-256gb',
                'price' => 29590000,
                'old_price' => 34990000,
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.9,
                'reviews' => 2056
            ],
            [
                'category_id' => $laptop->id,
                'name' => 'Asus ROG Strix SCAR 18',
                'slug' => 'asus-rog-strix-scar-18',
                'price' => 115990000,
                'old_price' => 120000000,
                'image' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.8,
                'reviews' => 45
            ],
            [
                'category_id' => $laptop->id,
                'name' => 'Dell XPS 15 9530',
                'slug' => 'dell-xps-15-9530',
                'price' => 54990000,
                'old_price' => 58990000,
                'image' => 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.7,
                'reviews' => 89
            ],
            [
                'category_id' => $laptop->id,
                'name' => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'slug' => 'lenovo-thinkpad-x1-carbon-gen-11',
                'price' => 42990000,
                'old_price' => 45990000,
                'image' => 'https://images.unsplash.com/photo-1629131726692-1accd0c53ce0?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.9,
                'reviews' => 112
            ],
            [
                'category_id' => $phone->id,
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'price' => 33990000,
                'old_price' => 37990000,
                'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.8,
                'reviews' => 845
            ],
            [
                'category_id' => $accessory->id,
                'name' => 'Bàn phím cơ Keychron Q1 Pro',
                'slug' => 'keychron-q1-pro',
                'price' => 4590000,
                'old_price' => 4990000,
                'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.9,
                'reviews' => 312
            ],
            [
                'category_id' => $accessory->id,
                'name' => 'Tai nghe AirPods Pro 2',
                'slug' => 'airpods-pro-2',
                'price' => 5690000,
                'old_price' => 6190000,
                'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.9,
                'reviews' => 945
            ],
            [
                'category_id' => $monitor->id,
                'name' => 'Màn hình Dell UltraSharp U2723QE',
                'slug' => 'dell-u2723qe',
                'price' => 14590000,
                'old_price' => 15990000,
                'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.8,
                'reviews' => 120
            ],
            [
                'category_id' => $accessory->id,
                'name' => 'Chuột Logitech MX Master 3S',
                'slug' => 'logitech-mx-master-3s',
                'price' => 2490000,
                'old_price' => 2790000,
                'image' => 'https://images.unsplash.com/photo-1527814050087-379381547330?auto=format&fit=crop&q=80&w=300',
                'rating' => 4.9,
                'reviews' => 567
            ],
            [
                'category_id' => $laptop->id,
                'name' => '🚀 ĐÂY LÀ SẢN PHẨM TỪ DATABASE',
                'slug' => 'san-pham-tu-db',
                'price' => 99999999,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=300',
                'rating' => 5.0,
                'reviews' => 9999
            ],
        ]);

        // Assign all seeded products to the manager's store
        \App\Models\Product::query()->update(['store_id' => $store->id]);

        // Create a sample order for the customer
        $order = \App\Models\Order::create([
            'user_id' => $customer->id,
            'status' => 'pending',
            'total_price' => 84990000,
            'shipping_address' => '123 Đường Mẫu, Quận 1, TP HCM',
            'payment_method' => 'cod'
        ]);

        $product = \App\Models\Product::first();
        if ($product) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }
    }
}
