@extends('admin.layouts.master')

@section('site-title')
Medias
@endsection
  
@section('page-content')
    
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                     <form method="POST" enctype="multipart/form-data" class="uploadform" action="<?php echo route('admin_media_store_noajax'); ?>" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2 text-center">
                                <img id="image_preview_container" src="" style="max-height: 150px;">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group alert alert-primary">
                                    <input type="file" class="form-control mx-auto w-75" name="image" placeholder="Choose image" id="image">
                                    <span class="text-danger"><?php //echo $errors->first('title'); ?></span>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12 text-center mt-2">
                                <button id="submitButton" type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($media as $item)
                        <div class="product-images col-md-2 col-3" style="background: #f2f2f2;">
                            <a href="{{asset('/public/uploads/images/').'/'. $item->filename}}" data-toggle="lightbox" data-title="{{$item->filename}}" data-gallery="gallery">
                                <img src="{{asset('/public/uploads/images/').'/'. $item->filename}}" class="media img-fluid mb-2" alt="{{$item->filename}}"/>
                                <a href="{{route('admin_media_delete', $item->id)}}" class="remove"><span class="fa fa-trash"></span></a>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    {{$media->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
<?php echo \App\CustomClass\MediaManager::mediaScript();?> 
@endsection

@section('cusjs')
    <!-- Ekko Lightbox -->
     <link rel="stylesheet" href="{{asset('public/admin/plugins/ekko-lightbox/ekko-lightbox.css')}}">
    <!-- Ekko Lightbox -->
    <script src="{{asset('public/admin/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
    <style>
        img.media{
            width: 130px;
            height: 80px;
            margin: 0 auto;
        }
    </style>
    <script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    })
    </script>
@endsection