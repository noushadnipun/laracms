<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Term;

class TermsSeeder extends Seeder
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
                'name'=>'Post',
                'slug'=>'post',
             ],
            [
               'name'=>'Page',
               'slug'=>'page',
            ],
            [
               'name'=>'Slider',
               'slug'=>'slider',
            ],
        ];

        foreach ($terms as $key => $value) {
            Term::create($value);
        }
    }
}
