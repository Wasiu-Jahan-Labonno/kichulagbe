<?php


use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $seller = User::firstOrCreate(
            ['email' => 'seller@example.com'],
            ['name' => 'Test Seller', 'password' => bcrypt('password')]
        );

        $category = Category::firstOrCreate(
            ['slug' => 'electronics'],
            ['name' => 'Electronics']
        );

        $products = [
            [
                'name'        => 'Smartphone X',
                'description' => 'Latest Smartphone with 5G support',
                'price'       => 499.99,
                'stock'       => 50,
                'image'       => 'products/smartphone-x.jpg',
            ],
            [
                'name'        => 'Wireless Headphones',
                'description' => 'Noise cancelling headphones with long battery life',
                'price'       => 89.99,
                'stock'       => 100,
                'image'       => 'products/headphones.jpg',
            ],
            [
                'name'        => '4K Smart TV',
                'description' => '55 inch Ultra HD Smart TV with HDR',
                'price'       => 799.00,
                'stock'       => 20,
                'image'       => 'products/tv.jpg',
            ],
            [
                'name'        => 'Gaming Laptop',
                'description' => 'Powerful gaming laptop with RTX graphics',
                'price'       => 1200.00,
                'stock'       => 15,
                'image'       => 'products/laptop.jpg',
            ],
            [
                'name'        => 'Bluetooth Speaker',
                'description' => 'Portable speaker with deep bass',
                'price'       => 59.99,
                'stock'       => 70,
                'image'       => 'products/speaker.jpg',
            ],
            [
                'name'        => 'Smartwatch Pro',
                'description' => 'Track your health and fitness in style',
                'price'       => 149.00,
                'stock'       => 60,
                'image'       => 'products/smartwatch.jpg',
            ],
            [
                'name'        => 'DSLR Camera',
                'description' => 'Capture moments with a professional camera',
                'price'       => 999.99,
                'stock'       => 10,
                'image'       => 'products/camera.jpg',
            ],
            [
                'name'        => 'Tablet Z10',
                'description' => '10.1 inch high-resolution tablet for work and play',
                'price'       => 299.00,
                'stock'       => 40,
                'image'       => 'products/tablet.jpg',
            ],
            [
                'name'        => 'Wireless Mouse',
                'description' => 'Ergonomic design with long battery life',
                'price'       => 19.99,
                'stock'       => 150,
                'image'       => 'products/mouse.jpg',
            ],
            [
                'name'        => 'Mechanical Keyboard',
                'description' => 'RGB mechanical keyboard for gamers and typists',
                'price'       => 69.00,
                'stock'       => 80,
                'image'       => 'products/keyboard.jpg',
            ],
            [
                'name'        => 'VR Headset',
                'description' => 'Immersive virtual reality experience',
                'price'       => 349.00,
                'stock'       => 25,
                'image'       => 'products/vr.jpg',
            ],
            [
                'name'        => 'External Hard Drive',
                'description' => '1TB portable hard drive with USB 3.0',
                'price'       => 59.00,
                'stock'       => 90,
                'image'       => 'products/hdd.jpg',
            ],
        ];

        foreach ($products as $data) {
            Product::create([
                'seller_id'   => $seller->id,
                'category_id' => $category->id,
                ...$data,
            ]);
        }
    }
}

