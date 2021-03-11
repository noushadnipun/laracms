@extends('admin.layouts.master')

@section('site-title')
Add New {{$term_name}}
@endsection

@section('page-content')

    <form role="form" method="POST" action ="{{ (!empty($post)) ? route('admin_term_type_update', $term_slug)  : route('admin_term_type_store', $term_slug) }}" enctype="multipart/form-data">
    @csrf
    @if(!empty($post))
        <input type="hidden" name="id" value="{{$post->id}}" />
    @endif
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-info  {{ (!empty($post)) ? 'alert-primary' : '' }}">
                    <h3 class="card-title panel-title float-left">
                        {{ (!empty($post)) ? 'Edit '.$term_name : 'Add '.$term_name }}
                    </h3>
                </div><!-- end card-header-->
                <div class="card-body">
                    <div class="form-group">
                        <label for="{{$term_slug}}_title">{{$term_name}} Title</label>
                        <input type="text" class="form-control form-control-sm" id="{{$term_slug}}_title" name="name" placeholder="Enter {{$term_name}} title" value="{{ (!empty($post)) ? $post->name : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="{{$term_slug}}_slug">{{$term_name}} Slug</label>
                        @if(!empty($post)) 
                            <input class="slug_edit d-none" id="slug_edit" name="slug_edit" type="checkbox"> 
                            <label for="slug_edit" class=" font-weight-normal text-success slug_fa" role="button" style="font-size: 10px;"> 
                                <i class="fas fa-edit"></i>    
                            </label>
                        @endif
                        <input type="text" class="form-control form-control-sm {{ (!empty($post)) ?  : $term_slug.'_slug_active' }}" id="{{$term_slug}}_slug" name="slug" placeholder="Enter {{$term_name}} Slug" value="{{ (!empty($post)) ? $post->slug : '' }}" autocomplete="off" {{ (!empty($post)) ? 'readonly' : '' }}>
                    </div>
                    <div class="form-group">
                        <label for="post_content">{{$term_name}} Description</label>
                        <div class="pad">
                            <textarea id="compose-textarea" class="form-control" name="description">{{ (!empty($post)) ? $post->description : '' }}</textarea>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>

        <div class="col-md-5">
            @php
                $termTaxonomy = \App\Models\TermTaxonomy::where('term_type', $term_slug)->get();
            @endphp
            @foreach($termTaxonomy as $key => $taxonomy)
            <div class="card"> <!-- category -->      
                <div class="card-header card-info">
                    <h3 class="card-title panel-title">{{$taxonomy->name}}</h3>
                </div> 
                <div class="card-body">
                    <?php
                        global $avaiableCat;
                        global $taxSlug;
                        $taxSlug = $taxonomy->slug;
                        global $termSlug;
                        $termSlug = $term_slug;
                        //$avaiableCat = (!empty($post)) ? $post->category_id : '';
                        $avaiableCat = (!empty($post)) ? explode(',', $post->category_id) : [];

                        if (!function_exists('selectCat'))   {
                        function selectCat($parent_id = null, $sub_mark = "") {
                            global $avaiableCat;
                            global $taxSlug;
                            global $termSlug;
                            $getCat = \App\Models\Category::where('parent_id', $parent_id)->where('taxonomy_type', $taxSlug)->orderBy('created_at', 'desc')->get();
                            foreach($getCat as $row){ ?>
                               
                                <option value="{{$row->id}}" 
                                    <?php foreach($avaiableCat as $cat){ echo $row->id  ==  $cat ? 'selected' : '';} ?>
                                    > 
                                    {{$sub_mark.$row->name}} 
                                </option>
                               
                                <?php selectCat($row->id, $sub_mark .'— ');
                                
                            }
                    }};?>
                    <select class="form-control form-control-sm select2Cat" id="category_id" name="category_id[]">
                        <option value="">None</option>
                        <?php selectCat();?>
                    </select>
                </div>
            </div>  <!-- end category -->  
            @endforeach


            <div class="card"><!-- Featured Image-->
                <div class="card-header card-info">
                    <h3 class="card-title panel-title">Featured Image</h3>
                     <h3 class="card-title panel-title float-right">
                        <a type="button" data-toggle="modal" data-target="#{{$term_slug}}" class="text-primary">Insert Image</a> 
                    </h3>
                </div>             
                <div class="card-body">
                    <div class="{{$term_slug}}img row mx-auto">
                            <!-- product images and hidden fields -->
                            @if((!empty($post)) && $post->featured_image)
                                <?php
                                    $fimg = \App\Models\Media::where('id', $post->featured_image)->first();
                                ?>
                                @if(!empty($fimg->id))
                                    <div class="product-img product-images col-md-2 col-3">
                                        <input type="hidden" name="{{$term_slug}}img_id" value="{{$fimg->id}}">
                                        <img class="img-fluid" src="{{asset('/public/uploads/images/').'/'.$fimg->filename}}">
                                        <a href="javascript:void()" class="remove"><span class="fa fa-trash"></span></a>
                                    </div>
                                @endif
                            @endif
                            <!-- dynamically added after  -->
                    </div>  
                </div> 
            </div><!-- End Featured Image -->

            <div class="card card-info">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>  

        </div>   
    </div>        
</form> 

<?php echo \App\CustomClass\MediaManager::mediaScript();?> 
<?php echo \App\CustomClass\MediaManager::media('single', $term_slug, $term_slug.'img');?> 

@endsection

@section('cusjs')

<script>

        $(".slug_edit").change(function(){
            console.log(this.checked)
            $("#{{$term_slug}}_slug").attr('readonly',!this.checked)
            if(this.checked == true){
                $("#{{$term_slug}}_slug").addClass('{{$term_slug}}_slug_active')
                $("label.slug_fa i").addClass('fa-check').removeClass('fa-edit')
            }
            if(this.checked == false){
                $("#{{$term_slug}}_slug").removeClass('{{$term_slug}}_slug_active')
                $("label.slug_fa i").addClass('fa-edit').removeClass('fa-check')
            }
        })
        $("#{{$term_slug}}_title").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $(".{{$term_slug}}_slug_active").val(Text);
        });
        
    
</script>


@endsection