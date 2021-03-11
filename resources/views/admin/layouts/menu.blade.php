@extends('admin.layouts.master')
@section('title','Dashboard')
@push('css')
@endpush
@section('main_menu','HOME')
@section('active_menu','Dashboard')
@section('link',route('admin_dashboard'))
@section('page-content')
    <link href="{{ asset('public/js/style.css') }}" rel="stylesheet">
    
        {!! Menu::render() !!}
   

      
@endsection

@section('cusjs')

  <script>
                    var menus = {
                        "oneThemeLocationNoMenus": "",
                        "moveUp": "Move up",
                        "moveDown": "Mover down",
                        "moveToTop": "Move top",
                        "moveUnder": "Move under of %s",
                        "moveOutFrom": "Out from under  %s",
                        "under": "Under %s",
                        "outFrom": "Out from %s",
                        "menuFocus": "%1$s. Element menu %2$d of %3$d.",
                        "subMenuFocus": "%1$s.Menusu of subelement %2$d of %3$s."
                    };
                    var arraydata = [];
                    var addcustommenur = '{{ route("haddcustommenu") }}';
                    var updateitemr = '{{ route("hupdateitem")}}';
                    var generatemenucontrolr = '{{ route("hgeneratemenucontrol") }}';
                    var deleteitemmenur = '{{ route("hdeleteitemmenu") }}';
                    var deletemenugr = '{{ route("hdeletemenug") }}';
                    var createnewmenur = '{{ route("hcreatenewmenu") }}';
                    var csrftoken = "{{ csrf_token() }}";
                    var menuwr = "{{ url()->current() }}";

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrftoken
                        }
                    });
                </script>
                <script type="text/javascript"
                        src="{{ asset('public/js/scripts.js') }}"></script>
                <script type="text/javascript"
                        src="{{ asset('public/js/scripts2.js')}}"></script>
                <script type="text/javascript"
                        src="{{ asset('public/js/menu.js')}}"></script>

                <script>
                    function addcustommenu() {
                        jQuery("#spincustomu").show();

                        jQuery.ajax({
                            data: {
                                labelmenu: jQuery("#custom-menu-item-name").val(),
                                linkmenu: jQuery("#custom-menu-item-url").val(),
                                idmenu: jQuery("#idmenu").val()
                            },

                            url: addcustommenur,
                            type: 'POST',
                            success: function (response) {

                                window.location = "";

                            },
                            complete: function () {
                                jQuery("#spincustomu").hide();
                            }

                        });
                    }
                </script>


@endsection