@extends('Dashboard.layouts.app')
@section('styles')

    <link href="{{asset('admin/assets/libs/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css"
          id="app-stylesheet"/>
    <link href="{{asset('admin/assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"
          id="app-stylesheet"/>


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
                                    <h4 class="header-title mb-4">All Issues Images</h4>

                                </div>
                                <div class="col-2">
                                    <button class="btn btn-sm  btn-primary float-right" data-toggle="modal"
                                            data-target="#device_issue">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        New Issues
                                    </button>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-sm  btn-primary float-right" data-toggle="modal"
                                            data-target="#issue_import">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Issues Import
                                    </button>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-hover  m-0" width="918px">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Issue Name</th>
                                        <th>Issue Price</th>
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
                                                <td>{{$issue->issue_name}}</td>
                                                <td>$ {{$issue->issue_price}}</td>
                                                <td>
                                                    <i class="fas fa-edit edit" data-toggle="modal"
                                                       data-target="#issue_edit_modal_{{$issue->id}}"></i>
                                                    <a href="{{url('deleteissueallimage',$issue->id)}}">
                                                        <i class="fas fa-trash delete" style="color:red;"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <div class="modal" id="issue_edit_modal_{{$issue->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Modal Issue</h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="p-1">
                                                                        <form
                                                                            action="{{route('editissueallimage',$issue->id)}}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf

                                                                            <div class="form-group">
                                                                                <label for="DeviceName">Issue Name<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="issue_name"
                                                                                       placeholder="Enter Issue Name"
                                                                                       class="form-control" value="{{$issue->issue_name}}">

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="DeviceName">Issue Price<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="issue_price"
                                                                                       placeholder="Enter Issue Name"
                                                                                       class="form-control"
                                                                                value="{{$issue->issue_price}}">

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="DeviceName">Issue
                                                                                    Description<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text"
                                                                                       name="issue_description"
                                                                                       placeholder="Enter Issue Name"
                                                                                       class="form-control" value="{{$issue->issue_description}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="model_id">Select
                                                                                    Manufacturer Model <span
                                                                                        class="text-danger">*</span></label><br>
                                                                                <select id="model_id" required
                                                                                        name="model_id"
                                                                                        class="form-control ">
                                                                                    <option value="" selected disabled>
                                                                                        Select
                                                                                    </option>
                                                                                    @foreach(\App\Models\Modal::all() as $modal)
                                                                                        <option
                                                                                            value="{{ $modal->id }}">{{ $modal->ModelName }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary waves-effect waves-light"
                                                                    type="submit">
                                                                Update
                                                            </button>
                                                            <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                {{$issues->links()}}
                            </div>

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
                <form action="{{route('saveissueallimage')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-1">
                                    <div class="form-group">
                                        <label for="DeviceName">Issue Name<span class="text-danger">*</span></label>
                                        <input type="text" name="issue_name" placeholder="Enter Issue Name"
                                               class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="DeviceName">Issue Price<span class="text-danger">*</span></label>
                                        <input type="text" name="issue_price" placeholder="Enter Issue Name"
                                               class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="DeviceName">Issue Description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="issue_description" placeholder="Enter Issue Name"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="model_id">Select Manufacturer Model <span
                                                class="text-danger">*</span></label><br>
                                        <select id="model_id" required name="model_id" class="form-control ">
                                            <option value="" selected disabled>Select</option>
                                            @foreach(\App\Models\Modal::all() as $modal)
                                                <option value="{{ $modal->id }}">{{ $modal->ModelName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Submit
                            </button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="issue_import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Issues</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('issue_import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-1">
                                    <div class="form-group">
                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Import
                            </button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
