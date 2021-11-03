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
                                <h4 class="header-title mb-4">All Device Series</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#my_device_series">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    ADD Series
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
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($series)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($series as $serie)
                                    
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$serie->DeviceName}}</td>
                                        <td>{{$serie->SeriesName}}</td>
                                        <td><img src="{{asset('frontend/image/Series')}}/{{$serie->image}}" width="120" /></td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#device_edit_series_{{$serie->id}}"></i> 
                                            <a href="{{url('deleteseries',$serie->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal" id="device_edit_series_{{$serie->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Device Series</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editseries',$serie->id)}}" method="post"enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Device Name<span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="device_name" id="device_id" onchange="updateDeviceIdByName(this.id)">
                                                                            <option>Select Device Name</option>
                                                                            @foreach($devices as $device)
                                                                                <<option value="{{$device->id}}" data-value="{{$device->id}}" required>{{$device->DeviceName}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">Series Name<span class="text-danger">*</span></label>
                                                                        <input type="text" name="SeriesName" value="{{$serie->SeriesName}}" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="SeriesDescription">Series Description<span class="text-danger">*</span></label>
                                                                        <textarea class="summernote" name="SeriesDescription">{!!$serie->SeriesDescription!!}</textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">Series Image<span class="text-danger">*</span></label>
                                                                        <input type="file" name="image" class="form-control" value="{{$serie->image}}">
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
                            </table>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="modal" id="my_device_series">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Device Series</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('saveseries')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="DeviceName">Device Name<span class="text-danger">*</span></label>
                                    <select class="form-control" name="device_name" id="device_name" onchange="updateDeviceIdByName(this.id)">
                                        <option>Select Device Name</option>
                                        @foreach($devices as $device)
                                            <option value="{{$device->id}}" data-value="{{$device->id}}" required>{{$device->DeviceName}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="device_id" value="" id='device_id_to_be_add'>
                                </div>

                                <div class="form-group">
                                    <label for="SeriesName">Series Name<span class="text-danger">*</span></label>
                                    <input type="text" name="SeriesName" placeholder="Enter Series Name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Series Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="SeriesDescription">Series Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="SeriesDescription"></textarea>
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
<script src="{{asset('admin/assets/libs/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/form-summernote.init.js')}}"></script>
@endsection