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
                                <h4 class="header-title mb-4">All Devices</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    ADD Device
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover  m-0" width="918px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Device Name</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($devices)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($devices as $device)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$device->DeviceName}}</td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#device_edit_modal_{{$device->id}}"></i> 
                                            <a href="{{route('deletedevice',$device->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal" id="device_edit_modal_{{$device->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Devices</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editdevice',$device->id)}}" method="post">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Device Name<span class="text-danger">*</span></label>
                                                                        <input type="text" name="DeviceName" value="{{$device->DeviceName}}" parsley-trigger="change" required placeholder="Enter Device Name" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="DeviceDescription">Device Description<span class="text-danger">*</span></label>
                                                                        <textarea class="summernote" name="DeviceDescription" value="{{$device->DeviceDescription}}">{{$device->DeviceDescription}}</textarea>
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

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Devices</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('savedevice')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="DeviceName">Device Name<span class="text-danger">*</span></label>
                                    <input type="text" name="DeviceName" parsley-trigger="change" required placeholder="Enter Device Name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="DeviceDescription">Device Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="DeviceDescription"></textarea>
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