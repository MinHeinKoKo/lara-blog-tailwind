<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Min Hein',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminMINHEIN')
        ]);

        \App\Models\User::factory(10)->create();



        $this->call([
            CategorySeeder::class,
            PostSeeder::class
        ]);

        $photos = Storage::allFiles("public");
        array_shift($photos);
        Storage::delete($photos);
    }
}
