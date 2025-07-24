<?php

namespace Database\Seeders;

use App\Models\UserModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        UserModel::factory()->create([
            [
            'nama'          => 'Lazuardi Mandegar',
            'email'         => 'test@gmail.com',
            'nim'           => '2313010000',
            'password'      =>  Hash::make('2313010000'),
            'hak_akses'     => 'admin',
            'foto'          => 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'
            ],
            [
            'nama'          => 'Ardi Mulyana Saputra',
            'email'         => 'test2@gmail.com',
            'nim'           => '2313010001',
            'password'      =>  Hash::make('2313010001'),
            'hak_akses'     => 'user',
            'foto'          => 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'
            ]
            
        ]);


    }
}
