@extends('admin.layouts.master')

@section('site-title')
404 Not Found
@endsection

@section('page-content')

    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
   
    
@endsection

