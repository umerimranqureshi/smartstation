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
						<h1>SAMSUNG DEVICE'S&nbsp;</h1>
					</div>
				</div>
			</div>
		</div>
		<br>
		@foreach($series as $serie)
        <div class="col-md-2 col-sm-12" onClick="getSeriesModals('{{$serie->id}}','{{$samsungID}}')">
            <div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="600ms">
                <div class="about-main-icon pb-4">
                	<i class="fa fa-mobile-alt fa-3x" aria-hidden="true"></i>
                </div>
                <p>{{$serie->SeriesName}}</p>
            </div>
            <br>
        </div>
        @endforeach
    </div>
</div>
<br>
<div class="container" id="Device">
	<div class="row">
		<div class="col-12">
	    	<div class="et_pb_column et_pb_column_4_4 et_pb_column_5 et_pb_css_mix_blend_mode_passthrough et-last-child">
	    		<div class="et_pb_module et_pb_text et_pb_text_1 et_pb_text_align_left et_pb_bg_layout_light">
	    			<div class="et_pb_text_inner">
	    				<h2>Choose model for Samsung</h2>
	    			</div>
	    		</div>
	    	</div>
	    </div>
    </div>
</div>
<br>
<div class="container">
	<div class="row" id="PageView">

	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function getSeriesModals(seriesID, deviceID)
	{
		let baseURl = window.location.origin+'/getSeriesModals/'+seriesID+'/'+deviceID;
		$.ajax({
			type: 'GET',
            url: baseURl,

            beforeSend:function(){


            },
            complete:function (){


            },
            success: function (data) {

            	if(data.length >0)
            	{


                 populateModals(data);


            	}
            	else
            	{

            	   $('#PageView').html('No Data Found');
            	}

            },
            error: function (data) {

            }
        });
	}
	function populateModals(data)
	{
		let html = "";

		data.forEach(function(val, index)
		{
			var image = '{{asset('')}}'+'frontend/image/Model/' + val.image;
			html+='<div class="col-md-3 col-sm-12" onClick="redirectTo('+val.id+')" >'+
        				'<div class="about-box active center-block bg-blue wow zoomIn" data-wow-delay="500ms">'+
           					'<div class="about-main-icon pb-4 rotate">'+
            					'<img src="'+ image +'"/>'+
            				'</div>'+
            				'<h3 style="color: #00A9E4;font-weight: 700;text-transform: uppercase;font-size: 18px;">'+ val.ModelName+'</h3>'+
            				
        				'</div>'+
        				'</br>'+
        			'</div>';
    })
		$('#PageView').html(html);
		
		$('html,body').animate({
        scrollTop: $("#Device").offset().top},
        'slow');
	}




	function redirectTo(val)
    {
        location.href = '/device_issues/'+val;

    }
</script>
@endsection
