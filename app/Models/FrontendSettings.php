<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendSettings extends Model
{
    use HasFactory;
    protected $table ="frontend_settings";
    protected $fillable = [
        'meta_name',
        'meta_value'
    ];

    public static function frontSetting($arg){
        if(!empty($arg)){
            $get = FrontendSettings::where('meta_name', $arg)->first();
            return $get->meta_value;
        } else {
            return '';
        }
    }
}
