<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TermTaxonomy;

class TermTaxonomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $termTaxonomy = [
            [
                'name'=>'Categories',
                'slug'=>'post_category',
                'term_type'=>'post',
            ],
            [
               'name'=>'Categories',
               'slug'=>'slider_category',
               'term_type'=>'slider',
            ],
        ];
        foreach ($termTaxonomy as $key => $value) {
            TermTaxonomy::create($value);
        }
    }
}
