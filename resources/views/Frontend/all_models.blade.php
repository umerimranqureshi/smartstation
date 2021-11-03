@extends('Frontend.layouts.app')
@section('styles')
<style type="text/css">
	
	.card-horizontal {
	    display: flex;
	    flex: 1 1 auto;
	}
	
	.tp-bullet-inner
	{
		display: none;
	}
	.et_pb_text_0 {
	    font-weight: 700;
	    font-size: 27px;
	    background-image: linear-gradient(
	90deg
	,#00AFF2 30%,#ffffff 100%);
	    padding-top: 8px!important;
	    padding-right: 8px!important;
	    padding-bottom: 0px!important;
	    padding-left: 8px!important;
	    margin-bottom: 15px!important;
	}
	.et_pb_text_0.et_pb_text {
	    color: #ffffff!important;
	}
	
	.et_pb_text_1 {
	    background-image: linear-gradient(
	90deg
	,#00AFF2 30%,#ffffff 100%);
	    padding-top: 8px!important;
	    padding-right: 8px!important;
	    padding-left: 8px!important;
	    margin-bottom: 15px!important;
	}
	.et_pb_text>:last-child {
	    padding-bottom: 0;
	}
	.et_pb_text_inner {
	    position: relative;
	}
	.et_pb_text_1 h2 {
	    font-weight: 700;
	    text-transform: uppercase;
	    color: #ffffff!important;
	    text-align: center;
    	padding-bottom: 4px;
	}

</style>
@endsection

@section('content')
<br><br></br></br></br></br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="et_pb_column et_pb_column_4_4 et_pb_column_0 et_pb_css_mix_blend_mode_passthrough et-last-child">
				<div class="et_pb_module et_pb_text et_pb_text_0 et_pb_text_align_left et_pb_bg_layout_light">
					<div class="et_pb_text_inner">
						<h1><center>All PHONE Models&nbsp;</center></h1>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="col-md-2 col-sm-12">
			<a href="{{route('apple_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Apple</p>
	            </div>
	        </a>
            <br>
        </div>
        <div class="col-md-2 col-sm-12">
			<a href="{{route('samsung_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Samsung</p>
	            </div>
	        </a>
            <br>
        </div>
        <div class="col-md-2 col-sm-12">
			<a href="{{route('sony_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Sony</p>
	            </div>
	        </a>
            <br>
        </div>
        <div class="col-md-2 col-sm-12">
			<a href="{{route('htc_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>HTC</p>
	            </div>
	        </a>
            <br>
        </div>
        <div class="col-md-2 col-sm-12">
			<a href="{{route('huawei_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Huawei</p>
	            </div>
	        </a>
            <br>
        </div>
		<div class="col-md-2 col-sm-12">
			<a href="{{route('lg_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>LG</p>
	            </div>
	        </a>
            <br>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('oneplus_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>OnePlus</p>
	            </div>
	        </a>
	        <br>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('vivo_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Vivo</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
            <a href="{{route('asus_device')}}">
            	<div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                   <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>ASUS</p>
            	</div>
            </a>	
        </div>
        <div class="col-md-2 col-sm-12">
            <a href="{{route('oppo_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Oppo</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('nokia_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Nokia</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('xiaomi_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Xiaomi</p>
	            </div>
	        </a>
        </div>
        <br>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('google_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Google Pixel</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('blackberry_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>BlackBerry</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('motorola_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Motorola</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('samsungtab_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Samsung Tablets</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('microsoft_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>Microsoft</p>
	            </div>
	        </a>
        </div>
        <div class="col-md-2 col-sm-12">
        	<a href="{{route('zte_device')}}">
	            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">
	                <div class="about-main-icon pb-4">
	                    <i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
	                </div>
	                <p>ZTE</p>
	            </div>
	        </a>
        </div>
    </div>
</div>
<br>
@endsection
@section('scripts')

@endsection