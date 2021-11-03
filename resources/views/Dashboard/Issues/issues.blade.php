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
                                <h4 class="header-title mb-4">All Issues</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#device_issue">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    ADD Issues
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover  m-0" width="918px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Model Name</th>
                                        <th>Issue Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($issues)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($issues as $issue)

                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$issue->model_id}}</td>
                                        <td>{!!$issue->IssueDescription!!}</td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#issue_edit_modal_{{$issue->id}}"></i>
                                            <a href="{{url('deleteissue',$issue->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal" id="issue_edit_modal_{{$issue->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Issue</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editissue',$issue->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Modal Name<span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="model_id" id="model_id" onchange="updateDeviceIdByName(this.id)">
                                                                            <option>Select Modal Name</option>
                                                                            @foreach($models as $model)
                                                                                <option value="{{$model->ModelName}}" data-value="{{$model->id}}" required>{{$model->device_id}} {{$model->series_id}} {{$model->ModelName}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>



                                                                    <div class="form-group">
                                                                        <label for="ModelDescription">Issue Description<span class="text-danger">*</span></label>
                                                                            <textarea class="summernote" name="IssueDescription" value="{{$issue->IssueDescription}}">{!!$issue->IssueDescription!!}</textarea>
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
<div class="modal" id="device_issue">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Issues</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('saveissue')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="DeviceName">Modal Name<span class="text-danger">*</span></label>
                                    <select class="form-control" name="model_id" id="model_id">
                                        <option>Select Modal Name</option>
                                        @foreach($models as $model)
                                            <option value="{{$model->ModelName}}" required>{{$model->DeviceName}} {{$model->SeriesName}} {{$model->ModelName}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="ModelDescription">Issue Description<span class="text-danger">*</span></label>
                                     <textarea class="summernote" name="IssueDescription"></textarea>
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