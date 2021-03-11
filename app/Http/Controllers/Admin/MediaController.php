<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Media;

class MediaController extends Controller
{
    public function index(){
        $media = Media::orderBy('id', 'DESC')->paginate('40');
        return view('admin.common.media.index', compact('media'));
    }

    //store for Ajax
    public function store(Request $request){
        /*
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        */
        
        if ($files = $request->file('image')) {
        
            //$image = $request->image->move('public/images');
            $image = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME).'-'.time().'.'.$request->image->getClientOriginalExtension();
            $imagepath = $request->image->move('public/uploads/images', $image);
                
            
            // return Response()->json([
            //     "success" => true,
            //     "image" => $image
            // ]);
            Media::create([
                'original_name' => 'a',
                'file_type' => 'b',
                'filename' => $image,
                'file_size' => 'c',
                'file_extension' => 'd',
                'file_directory' => 'e',
                'user_id' => 1,
            ]);
            $filelocation = url('/public/uploads/images/').'/'.$image;
            return array('ok', $filelocation); 
            //return redirect()->back()->with('success', 'Media Uploaded Succeefully');

        } else {
            return 'err'; 
        }

    }


    //store Media for No Ajax
    public function storeMedia(Request $request){
        /*
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        */
        
        if ($files = $request->file('image')) {
        
            //$image = $request->image->move('public/images');
            $image = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME).'-'.time().'.'.$request->image->getClientOriginalExtension();
            $imagepath = $request->image->move('public/uploads/images', $image);
            // return Response()->json([
            //     "success" => true,
            //     "image" => $image
            // ]);
            Media::create([
                'original_name' => $request->image->getClientOriginalName(),
                'file_type' => $request->image->getClientmimeType(),
                'filename' => $image,
                'file_size' => $imagepath->getSize(),
                'file_extension' => $request->image->getClientOriginalExtension(),
                'file_directory' => '/public/uploads/images/',
                'user_id' => auth()->user()->id,
            ]);
            $filelocation = url('/public/uploads/images/').'/'.$image;
            // return array('ok', $filelocation); 
            return redirect()->back()->with('success', 'Media Uploaded Succeefully');

        } else {
            return 'err'; 
        }

    }


    //Ajax Load Image
    public function getMedia(){
        $get = Media::orderBy('created_at', 'DESC')->get();
        return $get;
        //return url('/public/uploads/images/').'/'.$get[0]->filename;
    }

    //Delete Media 
    public function destroy($id)
    {
        $d = Media::find($id);
        if(file_exists(public_path('/uploads/images/'.$d->filename))){
            unlink(public_path('/uploads/images/'.$d->filename));
        }
        $d->delete();
        return redirect()->back()->with('delete', 'Media Deleted Succeefully');
    }
}
