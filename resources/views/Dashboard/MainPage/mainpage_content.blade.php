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
                                <h4 class="header-title mb-4">Home Page Content</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    ADD Content
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover  m-0" width="918px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($mainpages)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($mainpages as $mainpage)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{!!$mainpage->Description!!}</td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#device_edit_modal_{{$mainpage->id}}"></i> 
                                            <a href="{{route('deletecontent',$mainpage->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal" id="device_edit_modal_{{$mainpage->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Main Page Content</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editcontent',$mainpage->id)}}" method="post" enctype="multipart/form-data"> 
                                                                    @csrf


                                                                    <div class="form-group">
                                                                        <label for="Description">Description<span class="text-danger">*</span></label>
                                                                        <textarea class="summernote" name="Description" value="{{$mainpage->DeviceDescription}}">{{$mainpage->Description}}</textarea>
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
                <h4 class="modal-title">Main Page Content</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('savecontent')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="Description">Device Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="Description"></textarea>
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