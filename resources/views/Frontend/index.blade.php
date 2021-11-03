@extends('Frontend.layouts.app')

@section('styles')
<script src="https://apps.elfsight.com/p/platform.js" defer></script>

<style type="text/css">
    .pb-4{
        padding-bottom: 0.5rem!important;
    }
    .rotate {
    cursor:pointer;
    }

    .rotate:hover { 
        color:#afafaf;
        -moz-animation: spin .4s 1 linear;
        -o-animation: spin .4s 1 linear;
        -webkit-animation: spin .4s 1 linear;
        animation: spin .4s 1 linear;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(359deg); }
    }

    @-moz-keyframes spin {
        0% { -moz-transform: rotate(0deg); }
        100% { -moz-transform: rotate(359deg); }
    }

    @-o-keyframes spin {
        0% { -o-transform: rotate(0deg); }
        100% { -o-transform: rotate(359deg); }
    }

    @-ms-keyframes spin {
        0% { -ms-transform: rotate(0deg); }
        100% { -ms-transform: rotate(359deg); }
    }
    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(359deg); }
    }
    

.card:hover{
     transform: scale(1.05);
  box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
}

.slider_image{
    transition: none 0s ease 0s !important;
    text-align: inherit !important;
    line-height: 35px !important;
    border-width: 0px !important;
    margin: 0px 0px 0px 72px !important;
    padding: 0px !important;
    letter-spacing: 0px !important;
    font-weight: 600 !important;
    font-size: 15px !important ;
    margin-left: 11px !important;
}

@media screen and (min-width: 480px){
    .slider_image{
        font-size: 40px !important;
    }
}
/*
.slider_text{
    transition: none 0s ease 0s !important;
    text-align: inherit !important;
    line-height: 35px !important;
    border-width: 0px !important;
    margin: 0px 0px 0px 72px !important;
    padding: 0px !important;
    letter-spacing: 0px !important;
    font-weight: 600 !important;
    font-size: 20px !important;
    margin-left: 11px !important;
}

@media screen and (min-width: 480px){
    .slider_text{
        font-size: 40px !important;
    }*/

 /*   .header_logo{
        margin-top: -5px;
    }*/

}
/*.header_logo{
        margin-top: -5px !important;
    }*/





/*a[href="https://elfsight.com/google-reviews-widget/?utm_source=websites&utm_medium=clients&utm_content=google-reviews&utm_term=smartstation.focusdmt.com&utm_campaign=free-widget"] {
        display: none !important;
    }



    .elfsight-app-2821d517-4b50-4ef2-acb3-cd46e3675def + a[target="_blank"]{
        display: none !important;
    }*/
</style>
@endsection
@section('content')
<div id="slider-section" class="slider-section">
    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        
        <div id="vertical-bullets" class="rev_slider fullwidthabanner white vertical-tpb" data-version="5.4.1">
            <ul>
                @foreach($sliders as $slider)
                <li data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="01">
                    

                    <img src="{{asset('frontend/image/Slider')}}/{{$slider->image}}"  data-kenburns="on" data-duration="15000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10"  data-bgfit="cover" data-bgrepeat="no-repeat" data-bgposition="center center" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="bg-overlay bg-black opacity-5"></div>
                    
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-30','-30','-10','-10']"
                         data-width="" data-height="" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <h6 class="text-white main-font text-capitalize slider_image">{{$slider->title}}</h6>
                    </div>
                    
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['20','20','30','30']"
                         data-width="none" data-height="none" data-type="text"
                         data-textAlign="['center','center','center','center']"
                         data-responsive_offset="on" data-start="1000"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <a href="{{route('all_models')}}" class="btn btn-medium btn-rounded btn-blue btn-hvr-green btn-hvr-up" style="margin-top:20px;">Book Now</a>
                        </h1>
                    </div>

                    <!-- <div class="tp-caption tp-resizeme rs-parallaxlevel-3"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['100','100','110','110']"
                         data-width="none" data-height="none" data-textalign="['center','center','center','center']" data-type="text"
                         data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>
                        <a href="{{$slider->link}}" class="scroll btn btn-medium btn-rounded btn-blue btn-hvr-green btn-hvr-up">Learn More</a>
                    </div> -->
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <ul class="social-icons social-icons-simple revicon white d-none d-md-block d-lg-block">
        <li class="d-table"><a href="javascript:void(0)" class="facebook_bg_hvr2"><i class="fab fa-facebook-f"></i></a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="twitter_bg_hvr2"><i class="fab fa-twitter"></i> </a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="linkdin_bg_hvr2"><i class="fab fa-linkedin-in"></i> </a> </li>
        <li class="d-table"><a href="javascript:void(0)" class="instagram_bg_hvr2"><i class="fab fa-instagram"></i> </a> </li>
    </ul>
</div>

<!--<a href="#about" class="scroll-down link scroll main-font font-15 animate">Scroll Down <i class="fas fa-long-arrow-alt-down"></i></a>-->

<br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <center>
                    <h2 class="font-weight-bolder" style="text-transform: capitalize;font-family: 'Roboto',Helvetica,Arial,Lucida,sans-serif;font-weight: 700;font-size: 37px;color: #00a9e4">Book With Mobile Repair Shop Online</h2>
                <p>Get an instant price for your Device and book for free</p>
                <a href="{{route('all_models')}}" class="btn btn-primary  btn-lg">Take My Device For Repair</a></center>
            </div>
        </div>
        <br>
        <div class="row">
            
            <div class="col-md-3 col-sm-12">
                <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
                    <div class="about-main-icon pb-4">
                        <i class="fa fa-tint fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>Water Damage</p>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-12">
                <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="600ms">
                    <div class="about-main-icon pb-4">
                        <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>Screen Replacement</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="600ms">
                    <div class="about-main-icon pb-4">
                        <i class="fa fa-battery-half fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>Battery Replacement</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="600ms">
                    <div class="about-main-icon pb-4">
                        <i class="fa fa-camera fa-3x" aria-hidden="true"></i>
                    </div>
                    <p>Camera Replacement</p>
                </div>
            </div>

        </div>
    </div>
<br>

<div style="background-color: #f5f5f5;">
    <br><br>
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms">
            <div class="col-12 text-center">
                <p class="text-blue text-lg" style="text-transform: capitalize;font-family: 'Roboto',Helvetica,Arial,Lucida,sans-serif;line-height: 32px;font-weight: 700;font-size: 37px;color: #00a9e4">Device Pick-Up And Drop-Off Service</p>
            </div>
        </div>
        <br>
        <div class="row">
           @foreach($services as $service)
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 wow fadeInLeft" data-wow-delay="300ms">
                <div class="card h-100">
                    <img class="card-img-top" src="{{asset('frontend/image/Services')}}/{{$service->image}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <center><h5 class="card-title">{{$service->ServiceTitle}}</h5></center>
                        <p style="text-align: justify;">{!!$service->ServiceDescription!!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        
        <div class="col-12">
            <h1 style="text-align:center;font-family:Arial,sans-serif;font-size: 30px;padding-bottom: 10px;color: #333;font-weight: 500;line-height: 1em;">iPhone, iPad & Mobile Phone Repair Services Australia</h1>
            @isset($mainpages)
            @foreach($mainpages as $mainpage)
            <p style="text-align:center;padding-bottom: 1em;">
                {!! $mainpage->Description!!}
            </p>
            @endforeach
            @endisset
            
        </div>
        @isset($repairs)
        @foreach($repairs as $repair)
        <div class="col-md-4 col-sm-12">
            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
                <div class="about-main-icon pb-4 rotate">
                    <img src="{{asset('frontend/image/RepairService')}}/{{$repair->image}}" height="120" width="120"/>
                </div>
                <h3 style="color: #00A9E4;font-weight: 700;text-transform: uppercase;font-size: 18px;">{{$repair->ServiceName}}</h3>
                <p>{!! $repair->ServiceDetail !!}</p>
            </div>
            <br>
        </div>
        @endforeach
        @endisset
    </div> 
</div>
<br><br>
<div class="container">
    <div class="elfsight-app-2821d517-4b50-4ef2-acb3-cd46e3675def" ></div>
</div>
<br><br>



@endsection
