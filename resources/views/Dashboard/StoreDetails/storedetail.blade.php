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
                                    <h4 class="header-title mb-4">All Stores</h4>

                                </div>
                                <div class="col-4">
                                    <button class="btn btn-sm  btn-primary float-right" data-toggle="modal"
                                            data-target="#myModal">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        New Store
                                    </button>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-hover  m-0" width="918px">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Store Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($stores)
                                        @php
                                            $count=1;
                                        @endphp
                                        @foreach($stores as $store)
                                            <tr>
                                                <th scope="row">{{$count++}}</th>
                                                <td>{{$store->name}}</td>
                                                <td>
                                                    <i class="fas fa-edit edit" data-toggle="modal"
                                                       data-target="#device_edit_modal_{{$store->id}}"></i>
                                                    <a href="{{route('deletestore',$store->id)}}">
                                                        <i class="fas fa-trash delete" style="color:red;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal" id="device_edit_modal_{{$store->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Stores</h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <form action="{{route('editstore',$store->id)}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="p-1">

                                                                            <div class="form-group">
                                                                                <label for="store_name">Store Name<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="name"
                                                                                       parsley-trigger="change" required
                                                                                       id="store_name"
                                                                                       placeholder="Enter Store Name"
                                                                                       class="form-control"
                                                                                       value="{{$store->name}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="DeviceDescription">Store
                                                                                    Email<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="email" name="email"
                                                                                       parsley-trigger="change" required
                                                                                       id="email"
                                                                                       placeholder="Enter Store Email"
                                                                                       class="form-control"
                                                                                       value="{{$store->email}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="store_hours">Store Working
                                                                                    hours<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="hours"
                                                                                       parsley-trigger="change" required
                                                                                       id="store_hours"
                                                                                       placeholder="Enter Store Name"
                                                                                       class="form-control"
                                                                                       value="{{$store->hours}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="store_description">Store
                                                                                    Address<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="description"
                                                                                       parsley-trigger="change" required
                                                                                       id="store_description"
                                                                                       placeholder="Enter Store Name"
                                                                                       class="form-control"
                                                                                       value="{{$store->description}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="store_phone">Store
                                                                                    Phone<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="phone"
                                                                                       parsley-trigger="change" required
                                                                                       id="store_phone"
                                                                                       placeholder="Enter Store Name"
                                                                                       class="form-control"
                                                                                       value="{{$store->phone}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="store_latitude">Store
                                                                                    Latitude<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="latitude"
                                                                                       parsley-trigger="change" required
                                                                                       id="store_latitude"
                                                                                       placeholder="Enter Store Name"
                                                                                       class="form-control"
                                                                                       value="{{$store->latitude}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="store_longitude">Store
                                                                                    Longitude<span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="longitude"
                                                                                       parsley-trigger="change" required
                                                                                       id="store_longitude"
                                                                                       placeholder="Enter Store Name"
                                                                                       class="form-control"
                                                                                       value="{{$store->longitude}}">
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
                    <h4 class="modal-title">Stores</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('savestore')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-1">
                                    <div class="form-group">
                                        <label for="store_name">Store Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" parsley-trigger="change" required id="store_name"
                                               placeholder="Enter Store Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="DeviceDescription">Store Email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" parsley-trigger="change" required id="email"
                                               placeholder="Enter Store Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="store_hours">Store Working hours<span class="text-danger">*</span></label>
                                        <input type="text" name="hours" parsley-trigger="change" required
                                               id="store_hours"
                                               placeholder="Enter Store Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="store_description">Store Address<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="description" parsley-trigger="change" required
                                               id="store_description"
                                               placeholder="Enter Store Name" class="form-control">
                                    </div>
                                    <input value="0" name="store_id" type="hidden">
                                    <div class="form-group">
                                        <label for="store_phone">Store Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" parsley-trigger="change" required
                                               id="store_phone"
                                               placeholder="Enter Store Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="store_latitude">Store Latitude<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="latitude" parsley-trigger="change" required
                                               id="store_latitude"
                                               placeholder="Enter Store Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="store_longitude">Store Longitude<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="longitude" parsley-trigger="change" required
                                               id="store_longitude"
                                               placeholder="Enter Store Name" class="form-control">
                                    </div>
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
                </form>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script src="{{asset('admin/assets/libs/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/form-summernote.init.js')}}"></script>
@endsection
