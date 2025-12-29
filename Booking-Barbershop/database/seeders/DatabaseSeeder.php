<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Layanan;
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
        User::factory(10)->create([
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>'admin12345',
            'role'=>'admin'
        ]);
       

        Barber::create([
             'nama_barber'=>'Budi'
        ]);

    }
}
