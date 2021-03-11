<?php 
/**
 * Here All Website Front Setings method
 */
namespace App\Helpers;

use App\Models\FrontendSettings;

use App\Models\Media;

use App\Models\Post;

class WebsiteSettings {
    
    public static function settings($arg){
        return FrontendSettings::frontSetting($arg);
    }

    /** 
     * String To Array Convert  
     * Saved Array To Sql
     * Like That => ['', '']
    */

    public static function strToArr($arr){
        if(is_array($arr)){
            return $arr;
        }else{
            $strRep = str_replace(['[','"','"',']'], ['','',',',''] ,"$arr");
            return explode(',', $strRep); //Make Array
        }
        
    }

    /**
     * Website Logo
     * We are getting value as Media ID From DB
     */
    public static function siteLogo(){
        $logo = Self::settings('site_logoimg_id');
        return Media::fileLocation($logo);
    }

    /**
     * Home Slider 
     * We are getting value as Category ID From DB
     */
    public static function homeSlider(){
        $slider = Self::settings('home_slider');
        return Post::getPostByCat($slider);
    }

      /**
     * Home Slider 
     * We are getting value as Category ID From DB
     */
    public static function homeSliderRight(){
        $slider = Self::settings('home_slider_right_side_banner');
        return Post::getPostByCat($slider);
    }

    /**
     * HomePage Product Show By Category ID
     * 
     */
    public static function homeProductShowCase(){
        return Self::strToArr(Self::settings('home_product_category'));
    }


}

?>