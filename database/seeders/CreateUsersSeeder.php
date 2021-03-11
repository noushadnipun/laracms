<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'role_id'=>'1',
               'name'=>'Noushad Nipun',
               'email'=>'system@nipun.com',
               'password'=>bcrypt('23568923'),
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
