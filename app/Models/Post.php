<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'featured_image',
        'term_type',
        'category_id'
    ];

    //get Post By Category
    public static function getPostByCat($category_id){
        $getPost = Post::where('category_id', $category_id)->get();
        return $getPost;
    }
}
