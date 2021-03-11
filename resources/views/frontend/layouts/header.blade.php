<?php 
$companyPhone =  \App\Helpers\WebsiteSettings::settings('company_phone');
$getProductCats = \App\Models\ProductCategory::where('visibility', '1')->where('parent_id', null)->get();
?>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                    </div>
                    <div class="support_info">
                        <p>Telephone Enquiry: 
                            <a href="tel:{{$companyPhone }}">
                                {{$companyPhone }}
                            </a>
                        </p>
                    </div>
                    <div class="top_right text-right">
                        <ul>
                           @if(Auth::check())
                                <li>
                                    <a href="{{route('frontend_customer_dashboard')}}"> 
                                        {{Auth::user()->name}} 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                    
                                @else
                                    <li>
                                        <a href="{{route('frontend_customer_login')}}">
                                                Signin | Signup 
                                        </a>
                                    </li> 
                                @endif
                        </ul>
                    </div> 
                    <div class="search_container">
                        <form action="#">
                            <div class="hover_category">
                                <select class="select_option" name="select" id="categori">
                                    <option selected value="1">All Categories</option>
                                    <option value="2">Accessories</option>
                                    <option value="3">Accessories & More</option>
                                    <option value="4">Butters & Eggs</option>
                                    <option value="5">Camera & Video </option>
                                    <option value="6">Mornitors</option>
                                    <option value="7">Tablets</option>
                                    <option value="8">Laptops</option>
                                    <option value="9">Handbags</option>
                                    <option value="10">Headphone & Speaker</option>
                                    <option value="11">Herbs & botanicals</option>
                                    <option value="12">Vegetables</option>
                                    <option value="13">Shop</option>
                                    <option value="14">Laptops & Desktops</option>
                                    <option value="15">Watchs</option>
                                    <option value="16">Electronic</option>
                                </select>                        
                            </div>
                            <div class="search_box">
                                <input placeholder="Search product..." type="text">
                                <button type="submit">Search</button> 
                            </div>
                        </form>
                    </div> 
                    
                    <div class="middel_right_info">
                        <!-- Mini cart -->
                            @include('frontend.product.mini-cart')
                        <!-- End Mini Cart -->
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <!--- -------------
                            -------Mobile menu
                            ------------------->
                            @php $secondaryMenu =   Menu::getByName('secondary'); @endphp
                            @foreach($secondaryMenu as $link)
                            <li class="menu-item{{$link['child'] ? '-has-children' : ''}}">
                                <a href="{{ url($link['link']) }}">{{ $link['label'] }}</a>
                                @if($link['child'])
                                    @php $subMneu = $link['child'] @endphp
                                    <ul class="sub-menu">
                                        @foreach($subMneu as $link)
                                        <a href="{{ url($link['link']) }}">{{ $link['label'] }}</a>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="Offcanvas_footer d-none">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Offcanvas menu area end-->

<!--header area start-->
<header>
    <div class="main_header">
        <!--header top start-->
        <div class="header_top">
            <div class="container">  
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="support_info">
                            <p>Telephone Enquiry:
                                 <a href="tel:{{$companyPhone }}">{{$companyPhone}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                @if(Auth::check())
                                <li>
                                    <a href="{{route('frontend_customer_dashboard')}}"> 
                                        {{Auth::user()->name}} 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                    
                                @else
                                    <li>
                                        <a href="{{route('frontend_customer_login')}}">
                                             Signin | Signup 
                                        </a>
                                    </li> 
                                @endif
                            </ul>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->
        <!--header middel start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{ \App\Helpers\websiteSettings::siteLogo() }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="middel_right">
                            <div class="search_container">
                                <form action="{{route('frontend_search')}}" method="get">
                                    @csrf
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori1">
                                            <option selected value="">All Categories</option>
                                            @php $pcategory = \App\Models\ProductCategory::where('visibility', '1')->get() @endphp 
                                            @foreach ($pcategory as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>                        
                                    </div>
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text" name="search" required>
                                        <button type="submit">Search</button> 
                                    </div>
                                </form>
                            </div>
                            <div class="middel_right_info">
                                <!-- Mini cart -->
                                @include('frontend.product.mini-cart')
                                <!-- End Mini Cart -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
        <!--header bottom satrt-->
        <div class="main_menu_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="categories_menu">
                            <!-- Header Category Show All Desktop as Menu-->
                            <div class="categories_title">
                                <h2 class="categori_toggle">ALL CATEGORIES</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    @if($getProductCats)
                                    @foreach($getProductCats as $pCat)
                                        @php $checkSubCat = \App\Models\ProductCategory::where('visibility', '1')
                                                            ->where('parent_id', $pCat->id)->get(); 
                                        @endphp
                                        <li class="{{count($checkSubCat) > 0 ? 'menu_item_children' : ''}}">
                                            <a href="{{route('frontend_single_product_category', $pCat->slug)}}">
                                                {{$pCat->name}} 
                                                <?php echo count($checkSubCat) > 0 ? '<i class="fa fa-angle-right"></i>': ''; ?>
                                            </a>
                                            @if(count($checkSubCat) > 0)
                                            <ul class="categories_mega_menu">
                                                @foreach($checkSubCat as $sCat)
                                                <li class="menu_item_children"><a href="{{route('frontend_single_product_category', $sCat->slug)}}"> {{$sCat->name}} </a>
                                                    @php $checkSubSubCat = \App\Models\ProductCategory::where('visibility', '1')
                                                            ->where('parent_id', $sCat->id)->get(); 
                                                    @endphp
                                                    <ul class="categorie_sub_menu">
                                                        @foreach($checkSubSubCat as $ssCat)
                                                        <li>
                                                            <a href="{{route('frontend_single_product_category', $ssCat->slug)}}">
                                                                {{$ssCat->name}}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif     
                                        </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="main_menu menu_position"> 
                            <?php
                            $headerPrimaryMenu= Menu::getByName('primary'); //return array
                            ?>
                            <nav>  
                                <ul>
                                    @foreach($headerPrimaryMenu as $menu)
                                    <li><a class=""  href="{{$menu['link']}}">
                                        {{$menu['label']}}
                                    </a>
                                    </li>
                                    @endforeach
                                </ul>  
                            </nav> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </div> 
</header>
<!--header area end-->

<!--sticky header area start-->
<div class="sticky_header_area sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{ \App\Helpers\websiteSettings::siteLogo() }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="sticky_header_right menu_position">
                    <div class="main_menu"> 
                        <nav>  
                            <ul>
                              
                                @php $secondaryMenu =   Menu::getByName('secondary'); @endphp
                                @foreach($secondaryMenu as $link)
                                <li><a href="{{ url($link['link']) }}">{{ $link['label'] }}</a>
                                    @if($link['child'])
                                     @php $subMneu = $link['child'] @endphp
                                    <ul class="sub_menu pages">
                                        @foreach($subMneu as $link)
                                        <li><a href="{{ url($link['link']) }}">{{ $link['label'] }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>  
                        </nav> 
                    </div>
                    <div class="middel_right_info">
                        <!-- Mini cart -->
                        @include('frontend.product.mini-cart')
                        <!--mini cart -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--sticky header area end-->