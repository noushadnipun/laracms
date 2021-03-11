<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table ="medias";
    protected $fillable = [
        'user_id',
        'original_name',
        'filename',
        'file_type',
        'file_size',
        'file_extension',
        'file_directory'
    ];


    public function getFileName($media_id){
        $media = Media::where('id', $media_id)->first();
        return $media->filename;
    }

    public static function fileLocation($media_id){
        if(!empty($media_id)){
            $media = Media::where('id', $media_id)->first();
            $filename = $media->filename;
            return asset('/public/uploads/images/').'/'.$filename;
        } else {
            return asset('/public/frontend/images/no-images.jpg');
        }
    }
}
