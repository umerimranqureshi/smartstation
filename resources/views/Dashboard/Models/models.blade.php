@extends('Dashboard.layouts.app')
@section('styles')

<link href="{{asset('admin/assets/libs/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />
<link href="{{asset('admin/assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />


@endsection

@section('content')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="header-title mb-4">All Models</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#my_Model_modal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    ADD Models
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover  m-0" width="918px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Device Name</th>
                                        <th>Series Name</th>
                                        <th>Model Name</th>
                                        <th>Model Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($models)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($models as $model)

                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$model->DeviceName}}</td>
                                        <td>{{$model->SeriesName}}</td>
                                        <td>{{$model->ModelName}}</td>
                                        <td>{{$model->image}}</td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#model_edit_modal_{{$model->id}}"></i>
                                            <a href="{{url('deletemodel',$model->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal" id="model_edit_modal_{{$model->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Device Model</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editmodel',$model->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Device Name<span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="device_name" id="device_id" >
                                                                            <option>Select Device Name</option>
                                                                            @foreach($devices as $device)
                                                                                <option value="{{$device->id}}" data-value="{{$device->id}}" required>{{$device->DeviceName}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden" name="device_id" value="" id='device_id_to_be_add'>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Series Name<span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="series_name" id="series_id" >
                                                                            <option>Select Series Name</option>
                                                                            @foreach($series as $serie)
                                                                                <option value="{{$serie->id}}" data-value="{{$serie->id}}" required>{{$serie->SeriesName}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input type="hidden" name="device_id" value="" id='device_id_to_be_add'>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="ServiceImage">Model Name<span class="text-danger">*</span></label>
                                                                        <input type="text" name="ModelName" value="{{$model->ModelName}}" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ServiceDescription">Model Image<span class="text-danger">*</span></label>
                                                                        <input type="file" name="image" parsley-trigger="change" required class="form-control" value="{{$model->image}}" />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ModelDescription">Model Description<span class="text-danger">*</span></label>
                                                                        <textarea class="summernote" name="ModelDescription" value="{{$model->ModelDescription}}">{!!$model->ModelDescription!!}</textarea>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" >
                                                            Update
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                    @endisset
                                </tbody>
                            </table><br>
                            <div class="d-flex justify-content-center">
                                {{$models->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal" id="my_Model_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Models</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('savemodel')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="DeviceName">Device Name<span class="text-danger">*</span></label>
                                    <select class="form-control" name="device_name" id="device_name" onchange="updateDeviceSeries()">
                                        <option>Select Device Name</option>
                                        @foreach($devices as $device)
                                            <option value="{{$device->id}}" data-value="{{$device->id}}" required>{{$device->DeviceName}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="device_id" value="" id='device_id_to_be_add'>
                                </div>

                                <div class="form-group">
                                    <label for="DeviceName">Device Series Name<span class="text-danger">*</span></label>
                                    <select class="form-control" name="series_name" id="series_name" >

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ModelName">Model Name<span class="text-danger">*</span></label>
                                    <input type="text" name="ModelName" placeholder="Enter Model Name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="ModelImage">Model Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" parsley-trigger="change" required class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="ModelDescription">Model Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="ModelDescription"></textarea>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-primary waves-effect waves-light" type="submit" >
                        Submit
                    </button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>

    var APP_URL = {!! json_encode(url('/')) !!}


    function updateDeviceSeries()
    {

        let id = $("#device_name").val();

        console.log(APP_URL)

        console.log("here");
            $.ajax({
                type: 'GET',
                url: APP_URL+'/getSeriesAgainstBrand/'+id,
                beforeSend:function(){


                },
                complete:function (){


                },
                success: function (data) {


                    let html = '<option>Select Series Name</option>'
                    data.forEach(function(val, index)
                    {
                        html +='<option value="'+val.id+'" data-value="'+val.id+'" >'+val.SeriesName+'</option>'
                    });


                     $("#series_name").empty().append(html);


                },
                error: function (data) {

                }
            });



    }




</script>
<script src="{{asset('admin/assets/libs/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/form-summernote.init.js')}}"></script>


@endsection
