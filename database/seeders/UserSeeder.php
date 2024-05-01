<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void  //creation of 9 users
    {
        User::create([
            'name'=> 'Nicole Carda',
            'email'=> 'nikicarda96@gmail.com',
            'password'=> bcrypt('1,2,3,4,5,6,7,8')
        ])->assignRole('Admin');;


        User::factory(9)->create();

    }
}
