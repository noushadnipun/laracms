 <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            {{\App\Helpers\WebsiteSettings::settings('footer_content')}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                            <?php
                                $footerOne = Menu::getByName('footer-1'); //return array
                                $footerTwo = Menu::getByName('footer-2'); //return arrayv
                             ?>
                                @foreach($footerOne as $menu)
                                    <li><a href="{{$menu['link']}}">
                                        {{$menu['label']}}
                                    </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                 @foreach($footerTwo as $menu)
                                    <li><a href="{{$menu['link']}}">
                                        {{$menu['label']}}
                                    </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                   <div class="widgets_container newsletter">
                        <h3>Follow Us</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href=" {{\App\Helpers\WebsiteSettings::settings('fb_url')}}" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="{{\App\Helpers\WebsiteSettings::settings('twitter_url')}}" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="{{\App\Helpers\WebsiteSettings::settings('instagram_url')}}" title="instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="subscribe_form">
                           <h3>Join Our Newsletter Now</h3>
                            <form id="mc-form" class="mc-form footer-newsletter" >
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                                <button id="mc-submit">Subscribe!</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2021.  All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->
   
    


<!-- JS
============================================ -->

@include('frontend.layouts.js')



</body>
</html>