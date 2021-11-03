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
                                <h4 class="header-title mb-4">Issues Page Images</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#device_issue">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    New Image
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover  m-0" width="918px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Issue Image</th>
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
                                        <td><img src="{{asset('frontend/image/IssuePage')}}/{{$issue->image}}" height="100" width="100"></td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#issue_edit_modal_{{$issue->id}}"></i> 
                                            <a href="{{url('deleteissueimage',$issue->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal" id="issue_edit_modal_{{$issue->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Issue Page Images</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editissueimage',$issue->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="ServiceDescription">Issue Page Image<span class="text-danger">*</span></label>
                                                                        <input type="file" name="image" parsley-trigger="change" required class="form-control" value="{{$issue->image}}" />
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
                <h4 class="modal-title">Issue Page Images</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('saveissueimage')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="ModelImage">Issue Page Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" parsley-trigger="change" required class="form-control" />
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
