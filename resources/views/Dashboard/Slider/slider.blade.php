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
                                <h4 class="header-title mb-4">All Home Slider</h4>

                            </div>
                            <div class="col-4">
                                <button class="btn btn-sm  btn-primary float-right" data-toggle="modal" data-target="#home_slider">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    NEW Slider
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover  m-0" width="918px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($sliders)
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($sliders as $slider)
                                    
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td><img src="{{asset('frontend/image/Slider')}}/{{$slider->image}}" width="120" /></td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->subtitle}}</td>
                                        <td>{{$slider->link}}</td>
                                        <td>
                                            <i class="fas fa-edit edit"  data-toggle="modal" data-target="#home_slider_edit_{{$slider->id}}"></i> 
                                            <a href="{{url('deleteslider',$slider->id)}}">
                                                <i class="fas fa-trash delete" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal" id="home_slider_edit_{{$slider->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Home Slider</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="p-1">
                                                                <form action="{{route('editslider',$slider->id)}}" method="post" enctype="multipart/form-data">
                                                                    @csrf

                                                                    
                                                                    <div class="form-group">
                                                                        <label for="SliderTitle">Slider Title<span class="text-danger">*</span></label>
                                                                        <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="SliderSubtitle">Slider Subtitle<span class="text-danger">*</span></label>
                                                                        <input type="text" name="subtitle" value="{{$slider->subtitle}}" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="link">Link<span class="text-danger">*</span></label>
                                                                        <input type="text" name="link" value="{{$slider->link}}" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="SliderImage">Slider Image<span class="text-danger">*</span></label>
                                                                        <input type="file" name="image" parsley-trigger="change" required class="form-control" />
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
<div class="modal" id="home_slider">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Home Slider</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="p-1">
                            <form action="{{route('saveslider')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="SliderTitle">Slider Title<span class="text-danger">*</span></label>
                                    <input type="text" name="title" placeholder="Enter Slider Title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="SliderSubtitle">Slider Subtitle<span class="text-danger">*</span></label>
                                    <input type="text" name="subtitle" placeholder="Enter Slider Subtitle" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="SliderImage">Slider Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" parsley-trigger="change" required class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="link">Link<span class="text-danger">*</span></label>
                                    <input type="text" name="link" placeholder="Link" class="form-control">
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
