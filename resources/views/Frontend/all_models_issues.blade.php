@extends('Frontend.layouts.app')
@section('styles')
<style type="text/css">
.box {
	height: 200px;
	border: 1px solid blue;
	box-sizing: border-box;
}
.issueimage{

}
@media screen and (max-width: 576px) {
	.issueimage {
		width:50px;
	}
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

section{
	padding-top: 7.5rem;
	padding-right: 0px;
	padding-bottom: 1rem;
	padding-left: 0px;
}
.repairbutton{
	background-color: #00a9e4;
	color: white;
	border-width: 0px!important;
	border-color: rgba(0,0,0,0);
	border-radius: 4px;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
	border-bottom-left-radius: 4px;
	font-size: 13px;
	font-family: 'Roboto',Helvetica,Arial,Lucida,sans-serif!important;
	font-weight: 700!important;text-transform: uppercase!important;
}
.issueimage {
	transition: transform .7s ease-in-out;
}
.issueimage:hover {
	transform: rotate(360deg);
}
.left-box {
	float: left;
	padding-right: 4%;
	width: 43%;
}
.right-box {
	float: left;
	width: 53%;
}
.info-box {
	background-color: #fafafa;
	border: 1px solid #b1b1b1;
	border-radius: 8px;
	margin-top: 108px;
	padding: 18px;
}
.txt-center {
	text-align: center;
}
.button {

	border: 0 none;
	border-radius: 4px;
	color: #fff;
	font-family: OpenSans-Semibold;
	font-size: 18px;
	height: 45px;
	cursor: pointer;
	padding: 0 40px;
	text-transform: uppercase;
}
.left-box ul {
	list-style: none;
	margin: 20px 0;
	padding: 0;
}
.info-box h2 {
	border-bottom: 1px solid #e2e2e2;
	font-size: 17px;
	margin: 0;
	padding: 0 0 15px;
	text-align: center;
}
.txt30 {
	font-size: 30px;
}
.heading {
	margin: 35px 0;
}
.avn-regular {
	font-family: 'AvenirNextLTPro-Regular';
}
ul.product2 {
	list-style: none;
	margin: 0;
	padding: 0;
}
.cp, .cp li {
	cursor: pointer;
}
ul.product4 li {
	display: inline-block;
	float: none;
	margin-top: 0px;
	margin-right: 1%;
	margin-bottom: 2%;
	margin-left: 1%;
	width: 17.5%;
}
ul.product2 li {
	border: 1px solid #dedede;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	-o-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	padding: 5px;
	width: 20%;
}
.cp, .cp li {
	cursor: pointer;
}
li {
	line-height: 20px;
}
li {
	display: list-item;
	text-align: -webkit-match-parent;
}
ul.product2 {
	list-style: none;
	margin: 0;
	padding: 0;
}
ul.product2 li .imgbox {
	height: 50px;
	display: block;
}
@media only screen and (max-width: 767px){
	.left-box, .right-box {
		float: none;
		width: auto;
	}
}
input.text-field {
	border: 1px solid #b1b1b1;
	border-radius: 4px;
	color: #000;
	height: 34px;
	-moz-box-sizing: border-box;
	-o-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	padding: 0 4px;
	width: 100%;
}
</style>
@endsection
@section('content')
<br>
<section class="mb-0">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="et_pb_column et_pb_column_4_4 et_pb_column_0 et_pb_css_mix_blend_mode_passthrough et-last-child">
					<div class="et_pb_module et_pb_text et_pb_text_0 et_pb_text_align_left et_pb_bg_layout_light">
						<div class="et_pb_text_inner">
							<h1>{{$modelDetials->ModelName}}&nbsp;</h1>
						</div>
					</div>
				</div>
			</div>
			<br>
			@foreach($issues as $issue)
			<div class="col-md-3 col-sm-3 col-3" >
				<img class="image" src="{{asset('frontend/image/IssuePage')}}/{{$issue->image}}"/>
			</div>
			@endforeach
		</div>
	</div>
</section>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="et_pb_column et_pb_column_4_4 et_pb_column_5 et_pb_css_mix_blend_mode_passthrough et-last-child">
				<div class="et_pb_module et_pb_text et_pb_text_1 et_pb_text_align_left et_pb_bg_layout_light">
					<div class="et_pb_text_inner">
						<h2>Choose Repair for  {{$modelDetials->ModelName}}</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2 class="txt16 ">If the problem is not listed below. Please enter it here </h2>
			<h3 class="txt16 open-bold">Please select the best match. </h3>
			<form method="post" action="{{url('/booking-form')}}">
				@csrf
			<ul>
				@isset($issuess)
				@foreach ($issuess as $issue)
				<li>
					
					<span>
						<input type="checkbox" name="issue_id[]" id="selectedIssues{{$issue->id}}"
						value="{{$issue->id}}" data-name="{{$issue->issue_name}}" data-price="{{$issue->issue_price}}"
						onclick="issue({{$issue->id}})">
					</span>
					<label for="selectedIssues{{$issue->id}}">{{$issue->issue_name}}</label>

				</li>
				@endforeach
				@endisset
				<input type="hidden" name="modelDetials" value="{{$modelDetials->id}}">
			</ul>

		</div>
		<div class="col-md-6">
			<div class="info-box">
				<div id="qoute">
					
				</div>

				<ul id="IssueView" style="list-style: none;">

				</ul>
				<center>
					<button type="submit" class="btn btn-primary mb-3 repairbutton">Repair Now</button>
				</center>
			</div>
		</div>
		</form>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="et_pb_column et_pb_column_4_4 et_pb_column_0 et_pb_css_mix_blend_mode_passthrough et-last-child">
				<div class="et_pb_module et_pb_text et_pb_text_0 et_pb_text_align_left et_pb_bg_layout_light">
					<div class="et_pb_text_inner">
						<h3>Can’t Find Repair In The List?&nbsp;</h3>
					</div>
				</div>
			</div>
			<p>if you are unable to find repair listed here for your device please click on Chat</p>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-12">
			<div class="card">
				<div class="card-body">
					<i class="fa fa-check-circle fa-2x" style="color: #00AFF2;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 20px;color: #00aff2!important;line-height: 1.5em;text-align: center; ">No fix, No Charges</span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="card">
				<div class="card-body">
					<i class="fa fa-check-circle fa-2x" style="color: #00AFF2;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 20px;color: #00aff2!important;line-height: 1.5em;text-align: center; ">No fix, No Charges</span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="card">
				<div class="card-body">
					<i class="fa fa-check-circle fa-2x" style="color: #00AFF2;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 20px;color: #00aff2!important;line-height: 1.5em;text-align: center; ">No fix, No Charges</span>
				</div>
			</div>
		</div>
		<br>
		<p></p>
	</div>
</div>
<br>
@endsection
@section('scripts')
<script type="text/javascript">
	function issue(id){
		var IssueName='';
        var issue_price = '';

if ($(".selected").length >= 1  && $('#selectedIssues'+id).is(":checked")) {
	
	alert("greater than or equal to 1 are checked");

  		
			IssueName=$('#selectedIssues'+id).data('name');
            issue_price = $('#selectedIssues' + id).data('price');


            var html='<li id="remove'+id+'" class="selected">\n' +
			'                                            <h2 class="txt-blue">'+IssueName+'<br><br>\n';
            if(issue_price >0){
                html+='<span>$ ' + issue_price + '<input type="hidden" value="' + issue_price + '" id="total_price' + id + '"> </span>\n';
            }
                html+='                                                <strong class="clearfix"></strong>\n' +
			'                                            </h2>\n' +
			'                                            <div class="info-box-inner">\n' +
			'                                            </div>\n' +
			'                                        </li>';

			$('#IssueView').append(html);
		


		document.getElementById("IssueView").style.display = "none";



		// var div='<li id="remove'+id+'" class="selected">\n' + '<h2 class="txt-blue">'+IssueName+'<br><br>\n';
           
  //               div+='</h2>\n' + '<div class="info-box-inner">\n' + '</div>\n' + '</li>';

  //               $('#qoute').append(div);


}

// else if($(".selected").length <= 2  && $('#selectedIssues'+id).not(":checked"))
// {
// alert("there is lessn than or equal to 2 are unchecked");


// 	document.getElementById("IssueView").style.display = "block";

//         if ($('#selectedIssues'+id).is(":checked")){
// 			IssueName=$('#selectedIssues'+id).data('name');
//             issue_price = $('#selectedIssues' + id).data('price');
//             var html='<li id="remove'+id+'" class="selected">\n' +
// 			'                                            <h2 class="txt-blue">'+IssueName+'<br><br>\n';
//             if(issue_price >0){
//                 html+='<span>$ ' + issue_price + '<input type="hidden" value="' + issue_price + '" id="total_price' + id + '"> </span>\n';
//             }
//                 html+='                                                <strong class="clearfix"></strong>\n' +
// 			'                                            </h2>\n' +
// 			'                                            <div class="info-box-inner">\n' +
// 			'                                            </div>\n' +
// 			'                                        </li>';

// 			$('#IssueView').append(html);
// 		}
// 		else{
// 			IssueName=$('#selectedIssues'+id).data('name');
// 			$('#remove'+id).remove();
// 		}
// }

else if($(".selected").length > 2  && $('#selectedIssues'+id).not(":checked"))
{
alert("there is greater than to 2 are unchecked");

       
			IssueName=$('#selectedIssues'+id).data('name');
			$('#remove'+id).remove();
	
		document.getElementById("IssueView").style.display = "none";

}


else{

	alert("else ");
	document.getElementById("IssueView").style.display = "block";

        if ($('#selectedIssues'+id).is(":checked")){
			IssueName=$('#selectedIssues'+id).data('name');
            issue_price = $('#selectedIssues' + id).data('price');
            var html='<li id="remove'+id+'" class="selected">\n' +
			'                                            <h2 class="txt-blue">'+IssueName+'<br><br>\n';
            if(issue_price >0){
                html+='<span>$ ' + issue_price + '<input type="hidden" value="' + issue_price + '" id="total_price' + id + '"> </span>\n';
            }
                html+='                                                <strong class="clearfix"></strong>\n' +
			'                                            </h2>\n' +
			'                                            <div class="info-box-inner">\n' +
			'                                            </div>\n' +
			'                                        </li>';

			$('#IssueView').append(html);
		}
		else{
			IssueName=$('#selectedIssues'+id).data('name');
			$('#remove'+id).remove();
		}
}

	}
</script>
@endsection

