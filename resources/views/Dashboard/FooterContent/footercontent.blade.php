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
                                <h4 class="header-title mb-4">Footer Content</h4>

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
                                        <th>Logo Image</th>
                                        <th>Logo Description</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($footers)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($footers as $footer)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td><img src="{{asset('frontend/image/FooterImage')}}/{{$footer->image}}" height="80" width="80"></td>
                                        <td>{!!$footer->LogoDescription!!}</td>
                                        <td>{{$footer->email}}</td>
                                        <td>{{$footer->PhoneNumber}}</td>
                                        <td>{{$footer->Address}}</td>
                                        <td>{!! $footer->Description !!}</td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#device_edit_modal_{{$footer->id}}"></i> 
                                            <a href="{{route('deletefooter',$footer->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal" id="device_edit_modal_{{$footer->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Footer Content</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editfooter',$footer->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="ServiceDescription">Footer Logo Image<span class="text-danger">*</span></label>
                                                                        <input type="file" name="image" parsley-trigger="change" required class="form-control" value="{{$footer->image}}" />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="Description">Logo Description<span class="text-danger">*</span></label>
                                                                        <textarea class="summernote" name="LogoDescription" value="{{$footer->LogoDescription}}">{{$footer->LogoDescription}}</textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Email<span class="text-danger">*</span></label>
                                                                        <input type="text" name="email" value="{{$footer->email}}" parsley-trigger="change" required placeholder="Enter Email" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Phone Number<span class="text-danger">*</span></label>
                                                                        <input type="text" name="PhoneNumber" value="{{$footer->PhoneNumber}}" parsley-trigger="change" required placeholder="Enter Phone Number" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ServiceTitle">Address<span class="text-danger">*</span></label>
                                                                        <input type="text" name="Address" value="{{$footer->Address}}" parsley-trigger="change" required placeholder="Enter Address" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="Description">Description<span class="text-danger">*</span></label>
                                                                        <textarea class="summernote" name="Description" value="{{$footer->Description}}">{{$footer->Description}}</textarea>
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
                            <form action="{{route('savefooter')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="image">Footer Logo Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" parsley-trigger="change" required class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="Description">Logo Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="LogoDescription"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="ServiceTitle">Email<span class="text-danger">*</span></label>
                                    <input type="text" name="email" parsley-trigger="change" required placeholder="Enter Email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="ServiceTitle">Phone Number<span class="text-danger">*</span></label>
                                    <input type="text" name="PhoneNumber"  parsley-trigger="change" required placeholder="Enter Phone Number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="ServiceTitle">Address<span class="text-danger">*</span></label>
                                    <input type="text" name="Address" parsley-trigger="change" required placeholder="Enter Address" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="Description">Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="Description" ></textarea>
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