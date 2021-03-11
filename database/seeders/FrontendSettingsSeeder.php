<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\FrontendSettings;

class FrontendSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
               'meta_name'=>'company_phone',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'site_logoimg_id',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'home_slider',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'home_product_category',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'home_slider_right_side_banner',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'footer_content',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'fb_url',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'twitter_url',
               'meta_value'=>'',
            ],
            [
               'meta_name'=>'instagram_url',
               'meta_value'=>'',
            ],

            
        ];

        foreach ($settings as $key => $value) {
            FrontendSettings::create($value);
        }
    }
}
