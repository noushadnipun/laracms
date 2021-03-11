@extends('admin.layouts.master')

@section('site-title')
{{$term_name}}
@endsection

@section('page-content')
    <div class="card">
        <div class="card-header card-info">
            <h3 class="card-title panel-title float-left"> All {{$term_name}}</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($getPost as $data)
                <tr>
                    <td class="align-middle">{{$data->id}}</td>
                    <td class="align-middle">
                        <?php
                            $fimg = \App\Models\Media::where('id', $data->featured_image)->first();
                        ?>
                        @if(!empty($fimg->id))
                            <img style="width: 50px;" class="img-fluid" src="{{asset('/public/uploads/images/').'/'.$fimg->filename}}">
                        @endif
                    </td>
                    <td class="align-middle">{{$data->name}}</td>
                    <td class="align-middle">{{$data->created_at}}</td>
                    <td class="align-middle">
                        <a href="{{route('admin_term_type_edit', [$term_slug, $data->id])}}" class="btn-sm alert-success"><i class="fa fa-edit"></i></a>   
                        <a href="{{route('admin_term_type_delete', [$term_slug, $data->id])}}" class="btn-sm alert-danger" onclick="return confirm('Are you sure want to Delete?')"><i class="fa fa-trash"></i></a>  
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
     </div>
    
@endsection