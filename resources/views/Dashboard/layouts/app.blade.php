<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <link rel="shortcut icon" href="{{asset('frontend/image/logo.jpg')}}">


    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

   
    
    @yield('styles')

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        
        <!-- Topbar Start -->
        @include('Dashboard.layouts.header')
        <!-- end Topbar --> 
        
        <!-- ========== Left Sidebar Start ========== -->
        @include('Dashboard.layouts.side_bar')
            <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        @include('Dashboard.layouts.footer')
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
   
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    

    
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>

    <script src="{{asset('admin/assets/libs/morris-js/morris.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/raphael/raphael.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/pages/dashboard.init.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
    @yield('scripts')

</body>

</html>