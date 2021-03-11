@extends('frontend.layouts.master')

@section('site-title')
{{$page->name}}
@endsection

@section('page-content')

<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>{{$page->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
<!--breadcrumbs area end-->



    <!--Privacy Policy area start-->
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <?php echo $page->description;?>
                    
                </div>
            </div>
        </div>
    </div>
    <!--Privacy Policy area end-->


@endsection