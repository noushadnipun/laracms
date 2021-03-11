<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Post;

class PostController extends Controller
{
    protected $getTermSlug;
    protected $getTermName;

    public function __construct(Request $request){
        $checkTerm = Term::where('slug', $request->type)->first();
        $this->getTermSlug = $checkTerm['slug'];
        $this->getTermName = $checkTerm['name'];
    }
    
    //index 
    public function index()
    {
        $term_name = $this->getTermName;
        $term_slug = $this->getTermSlug;

        if(empty($term_slug)){
           return view('admin.404', ['message' => 'Invalid Post Type']);
        }
        $getPost = Post::where('term_type', $term_slug)->orderBy('created_at', 'desc')->get();
        return view('admin.common.post.index', compact('getPost', 'term_name', 'term_slug'));
    }

    //form
    public function form(Request $request)
    {
        $term_name = $this->getTermName;
        $term_slug = $this->getTermSlug;
        
        if(empty($term_slug)){
           return view('admin.404', ['message' => 'Invalid Post Type']);
        }else {

            if($request->id){
                $post = Post::find($request->id);
            } else {
                $post = '';
            }
            
            return view('admin.common.post.form', compact('term_slug', 'term_name', 'post'));
        }
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
        ]);
        $term_name = $this->getTermName;
        $term_slug = $this->getTermSlug;
        
        if(empty($term_slug)){
           return view('admin.404', ['message' => 'Invalid Post Type']);
        } else {
            $featured_image = $term_slug.'img_id';
            $category = !empty($request->category_id) ? implode(",", $request->category_id) : '';
            $data = new Post();
            $data->term_type = $term_slug;
            $data->name = $request->name;
            $data->slug = $request->slug;
            $data->description = $request->description;
            $data->featured_image = $request->$featured_image;
            $data->category_id = $category;
            $data->save();
            return redirect()->back()->with('success', 'Added Successfully');
        }
        
    }

    //update
    public function update(Request $request)
    {
        
        $term_name = $this->getTermName;
        $term_slug = $this->getTermSlug;
        
        if(empty($term_slug)){
           return view('admin.404', ['message' => 'Invalid Post Type']);
        } else {
            $featured_image = $term_slug.'img_id';
            $category = !empty($request->category_id) ? implode(",", $request->category_id) : '';
            $data = Post::find($request->id);
            $data->term_type = $term_slug;
            $data->name = $request->name;
            $data->slug = $request->slug;
            $data->description = $request->description;
            $data->featured_image = $request->$featured_image;
            $data->category_id = $category;
            $data->save();
            return redirect()->back()->with('success', 'Edited Successfully');
        }
    }

    //delete
    public function destroy(Request $request)
    {
        $data = Post::find($request->id);
        $data->delete();
        return redirect()->back()->with('delete', 'Deleted Successfully');
    }
}
