<!DOCTYPE html>
<html lang="en" class="js csstransitions">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="author" content="Themes Industry">
    <meta name="description" content="">
    <title></title>
    <link href="{{asset('frontend/image/logo.jpg')}}" rel="icon">
    <link href="{{asset('vendor/css/bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/css/LineIcons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/css/revolution-settings.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/css/cubeportfolio.min.css')}}" rel="stylesheet">
    <link href="{{asset('corporate-finance/css/navigation.css')}}" rel="stylesheet">
    <link href="{{asset('corporate-finance/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('corporate-finance/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('toastr\toastr.css ')}}" rel="stylesheet">
    @yield('styles')
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">


<div class="loader-bg">
    <div class="loader"></div>
</div>

@include('Frontend.layouts.header')


@yield('content')


@include('Frontend.layouts.footer')

<div class="go-top">
    <i class="fas fa-angle-up"></i><i class="fas fa-angle-up"></i></div>

    <script src="{{asset('vendor/js/bundle.min.js')}}"></script>

    <script src="{{asset('vendor/js/jquery.appear.js')}}"></script>
    <script src="{{asset('vendor/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/js/parallaxie.min.js')}}"></script>
    <script src="{{asset('vendor/js/wow.min.js')}}"></script>
    <script src="{{asset('vendor/js/jquery.cubeportfolio.min.js')}}"></script>

    <script src="{{asset('vendor/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('vendor/js/jquery.themepunch.revolution.min.js')}}"></script>

    <script src="{{asset('vendor/js/morphext.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('vendor/js/extensions/revolution.extension.video.min.js')}}"></script>


    <script src="{{asset('corporate-finance/js/isotope.pkgd.js')}}"></script>
    <script src="{{asset('corporate-finance/js/modernizr.custom.97074.js')}}"></script>
    <script src="{{asset('corporate-finance/js/jquery.hoverdir.js')}}"></script>

    <script src="{{asset('vendor/js/contact_us.js')}}"></script>
    <script src="{{asset('corporate-finance/js/script.js')}}"></script>

    @yield('scripts')
</body>
</html>