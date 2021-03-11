<link rel="stylesheet" href="{{asset('public/admin/plugins/toastr/toastr.min.css')}}">

<script src="{{asset('public/admin/plugins/toastr/toastr.min.js')}}"></script>

@if(Session::get('success') == true)
    <script>
        toastr.success("{{ Session::get('success') }}")
    </script>

@endif

@if(Session::get('delete') == true)
    <script>
        toastr.error("{{ Session::get('delete') }}")
    </script>
@endif


@if(Session::get('error') == true)
    <script>
        toastr.error("{{ Session::get('delete') }}")
    </script>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}")
        </script>
    @endforeach
@endif