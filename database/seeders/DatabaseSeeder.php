<?php

namespace Database\Seeders;

// use App\Models\Position;

use App\Models\Position;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // trong model có trait hasfactory đã có dữ liệu mẫu
        //nếu đã chạy có rồi thì có thể coment vaof để k chạy lần 2
        // Room::factory(10)->create();
        // User::factory(10)->create();
        // Position::factory(10)->create();
        Product::factory(10)->create();
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
