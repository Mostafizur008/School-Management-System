@extends('backend.main-section.body.main')
@section('main')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Change-password</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Password</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
            <div class="col-12">
                <div class="card-header">
                    <h5 class=""><i class="mdi mdi-key-variant mr-1"></i> Password Change</h5>
                </div>
                <div class="card-box">
                        <div class="col-12">
                           <div class="card">
                            <form action="{{route('user.change.password.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf  
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Old Password<span class="text-red">*</span></label>
                                            <input  type="password" id="current_password" class="form-control" name="oldpassword">
                                        </div>
                                        @error ('oldpassword')
                                        <span class = "text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">New Password <span class="text-red">*</span></label>
                                            <input  type="password" id="password" class="form-control" name="password">
                                        </div>
                                        @error ('password')
                                            <span class = "text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">New Password <span class="text-red">*</span></label>
                                            <input  type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                                        </div>
                                        @error ('password_confirmation')
                                            <span class = "text-danger">{{$message}}</span>
                                            @enderror
                                    </div>                                         
                                </div>
                            </div>                          
                        <div class="modal-footer">
                        <button class="btn btn-primary add_user">UPDATE</button>
                    </div>
                </form> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
    </div>

@endsection