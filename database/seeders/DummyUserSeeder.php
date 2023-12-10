<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataUser = [
            [
                'name' => 'Admin 1',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('password'),

            ],
            [
                'name' => 'Pimpinan 1',
                'email' => 'pimpinan@gmail.com',
                'role' => 'pimpinan',
                'password' => bcrypt('password'),

            ],
        ];
        foreach($dataUser as $key => $item){
            User::create($item);
        }
    }
}
