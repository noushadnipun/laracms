<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermTaxonomy;
use App\Models\Term;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $getTaxonomyName;
    protected $getTaxonomySlug;
    protected $getTermSlug;

    public function __construct(Request $request){
        $checkTaxonomy = TermTaxonomy::where('slug', $request->taxonomy)->where('term_type', $request->type)->first();
        $this->getTaxonomySlug = $checkTaxonomy['slug'];
        $this->getTaxonomyName = $checkTaxonomy['name'];
        $this->getTermSlug = $request->type;
    }

    public function index(Request $request){
        $taxonomy_name = $this->getTaxonomyName;
        $taxonomy_slug = $this->getTaxonomySlug;
        $term_slug = $this->getTermSlug;

        if(empty($taxonomy_slug)){
           return view('admin.404', ['message' => 'Invalid Taxonomy Type']);
        }

        if($request->id){
            $category = Category::find($request->id);
        } else {
            $category = '';
        }
        return view('admin.common.category.index', compact('taxonomy_name', 'taxonomy_slug', 'term_slug', 'category'));
    }

     //store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
        ]);

        $taxonomy_name = $this->getTaxonomyName;
        $taxonomy_slug = $this->getTaxonomySlug;
        $term_slug = $this->getTermSlug;

        if(empty($taxonomy_slug)){
           return view('admin.404', ['message' => 'Invalid Taxonomy Type']);
        } else {
            $data = new Category();
            $data->taxonomy_type = $taxonomy_slug;
            $data->name = $request->name;
            $data->slug = $request->slug;
            $data->description = $request->description;
            $data->parent_id = $request->parent_id;
            $data->image = $request->catimg_id;
            $data->save();
            return redirect()->back()->with('success', 'Added Successfully');
        }
        
    }
    //update
    public function update(Request $request)
    {
        
        $taxonomy_name = $this->getTaxonomyName;
        $taxonomy_slug = $this->getTaxonomySlug;
        $term_slug = $this->getTermSlug;

        if(empty($taxonomy_slug)){
           return view('admin.404', ['message' => 'Invalid Taxonomy Type']);
        }  else {
            $data = Category::find($request->id);
            $data->taxonomy_type = $taxonomy_slug;
            $data->name = $request->name;
            $data->slug = $request->slug;
            $data->description = $request->description;
            $data->parent_id = $request->parent_id;
            $data->image = $request->catimg_id;
            $data->save();
            return redirect()->back()->with('success', 'Edited Successfully');
        }
        
    }

      public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        //Chnage all child id which under this id
        $changeParent = Category::where('parent_id', $id)->get();
        if(!empty($changeParent)){
            foreach($changeParent as $change){
                $upParent = Category::where('parent_id', $id)->first();
                $upParent->parent_id = null;
                $upParent->save();
            }
        }

        $data->delete();
        return redirect()->back()->with('delete', 'Deleted Successfully');
    }
}
