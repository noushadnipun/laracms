<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terms = [
            [
               'name'=>'Admin',
               'slug'=>'admin',
               'description' => 'An Administrator'
            ],
            [
               'name'=>'Editor',
               'slug'=>'editor',
               'description' => 'A Website Manager'
            ]
        ];

        foreach ($terms as $key => $value) {
            Role::create($value);
        }
    }
}
