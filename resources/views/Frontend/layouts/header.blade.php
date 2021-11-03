<style>
    .header_logo{
        width: 92px;
        margin-top:-5px;
    }
    @media screen and (min-width: 480px) {
        .header_logo {
                width: 92px;
            margin-top: -5px;
        }
    }
</style>
<header>
    <!--Navigation-->
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
        <div class="container round-nav">
            <a href="{{url('/')}}" title="Logo">
                <img src="{{asset('frontend/Asset 1-8 (1).png')}}" class="header_logo">
            </a>

            <div class="collapse navbar-collapse">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="{{route('apple_device')}}">Apple</a>
                    <a class="nav-link" href="{{route('samsung_device')}}">Samsung</a>
                    <a class="nav-link" href="{{route('macbook')}}">MacBook</a>
                    <a class="nav-link" href="{{route('huawei_device')}}">Huawei</a>
                    <a class="nav-link" href="{{route('oppo_device')}}">OPPO</a>
                    <a class="nav-link" href="{{route('other_device')}}">Other</a>
                    <a href="" class="btn btn-sm btn-rounded btn-green btn-hvr-up btn-hvr-blue" data-animation-duration="500" data-fancybox data-src="#animatedModal" >Contact Us</a>
                    <a href="{{route('all_models')}}" class="btn btn-sm btn-rounded btn-green btn-hvr-up btn-hvr-blue">Book Now</a>

                </div>
            </div>
        </div>

        <div class="navigation-toggle">
            <ul class="slider-social toggle-btn my-0">
                <li>
                    <a href="javascript:void(0);" class="sidemenu_btn" id="sidemenu_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="side-menu hidden">
        <div class="mega-title" id="mega-title">
            <h2 class="inner-mega-title">Smart Stations</h2>
        </div>

        <span id="btn_sideNavClose">
            <i class="las la-times btn-close"></i>
        </span>
        
        <div class="inner-wrapper">
            <nav class="side-nav w-100">
                <a href="{{url('/')}}" title="Logo" class="logo scroll navbar-brand">
                    <img src="{{asset('frontend/smart-station.png')}}" alt="logo">
                </a>
                <ul class="navbar-nav text-capitalize">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('apple_device')}}">Apple</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('samsung_device')}}">Samsung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('macbook')}}">MacBook</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sony_device')}}">Sony</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('oppo_device')}}">OPPO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('other_device')}}">Other</a>
                    </li>
                    <li class="get-started-btn">
                        <a href="" class="btn btn-sm btn-rounded btn-green btn-hvr-up btn-hvr-blue" data-animation-duration="500" data-fancybox data-src="#animatedModal">Contact Us</a>
                    </li>
                    <br>
                    <li class="get-started-btn">
                        <a href="{{route('all_models')}}" class="btn btn-sm btn-rounded btn-green btn-hvr-up btn-hvr-blue">Book Now</a>
                    </li>
                </ul>
            </nav>

            <div class="side-footer w-100">
                <ul class="social-icons-simple">
                    <li><a class="facebook_bg_hvr2 wow fadeInLeft" href="javascript:void(0)" data-wow-delay="300ms"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a class="instagram_bg_hvr2 wow fadeInUp" href="javascript:void(0)" data-wow-delay="500ms"><i class="fab fa-instagram"></i> </a> </li>
                    <li><a class="twitter_bg_hvr2 wow fadeInRight" href="javascript:void(0)" data-wow-delay="300ms"><i class="fab fa-twitter"></i> </a> </li>
                </ul>
                <p>&copy;</p>
            </div>
        </div>
    </div>
    
    <a id="close_side_menu" href="javascript:void(0);"></a>
    
    <div class="quote-content hidden animated-modal" id="animatedModal">
        <form action="{{route('saveuser')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12" ></div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control"  name="UserName" placeholder="Name" required="" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  name="UserPhone" placeholder="Contact #" required="" type="text">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control"  name="UserEmail" placeholder="Email" required="" type="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control"  name="UserAddress" placeholder="City / Country" required="" type="text">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control"  name="UserMessage"  placeholder="Please write your Problem or Message."></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-large btn-rounded btn-green btn-hvr-up btn-hvr-blue">Submit Now</button>
                </div>
            </div>
        </form>
    </div>
</header>