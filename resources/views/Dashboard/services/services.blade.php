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
                                <h4 class="header-title mb-4">All Services</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#myServicModal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    ADD Service
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover  m-0" width="918px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service Title</th>
                                        <th>Service Image</th>
                                        <th>Service Description</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($services)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($services as $service)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td>{{$service->ServiceTitle}}</td>
                                        <td>{{$service->image}}</td>
                                        <td>{{$service->ServiceDescription}}</td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#service_edit_modal_{{$service->id}}"></i> 
                                            <a href="{{url('deleteservice',$service->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal" id="service_edit_modal_{{$service->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Services</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editservice',$service->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Service Title<span class="text-danger">*</span></label>
                                                                        <input type="text" name="ServiceTitle" value="{{$service->ServiceTitle}}" parsley-trigger="change" required placeholder="Enter Service Title" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ServiceImage">Service Image<span class="text-danger">*</span></label>
                                                                        <input type="file" name="image" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ServiceDescription">Service Description<span class="text-danger">*</span></label>
                                                                        <textarea  name="ServiceDescription" value="{!!$service->ServiceDescription!!}" parsley-trigger="change" required class="form-control"></textarea>
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
    <div class="modal" id="myServicModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Services</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('saveservice')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="ServiceTitle">Service Title<span class="text-danger">*</span></label>
                                    <input type="text" name="ServiceTitle" parsley-trigger="change" required placeholder="Enter Service Name" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <label for="ServiceImage">Service Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" parsley-trigger="change" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ServiceDescription">Service Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="ServiceDescription"></textarea>
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
</div>

@endsection
@section('scripts')
<script src="{{asset('admin/assets/libs/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/form-summernote.init.js')}}"></script>
@endsection