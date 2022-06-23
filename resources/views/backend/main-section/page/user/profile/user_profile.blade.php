@extends('backend.main-section.body.main')
@section('main')


<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <div class="col-sm-12 col-md-12" align="center">
                        <img class="d-flex rounded-circle avatar-lg" align="center" src="{{ (!empty($user->image)) ? url('backend/all-images/database/user/'.$user->image): url('backend/all-images/database/default/mps.png') }}" alt="Generic placeholder image">
                         <span class="avatar-icons bg-green" data-toggle="modal" data-target="#profilemodal"><i class="mdi mdi-camera"></i></span>
                        <h4>{{$user->name}}</h4>
                        <p class="text-muted">{{$user->role}}</p>
                    </div>
                    <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i class="mdi mdi-cellphone-android mr-1"></i> Contact Information</h5>
                    <div class="">
                        <h4 class="font-13 text-muted text-uppercase">About Me :</h4>
                        <p class="mb-3">
                            Hi I'm {{$user->name}},has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type.
                        </p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">National Nid :</h4>
                        <p class="mb-3"> {{$user->nid}}</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Address :</h4>
                        <p class="mb-3"> {{$user->address}},{{$user->upazila}},{{$user->district}} - {{$user->zip_code}}</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Mobile :</h4>
                        <p class="mb-3">{{$user->mobile}}</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Email :</h4>
                        <p class="mb-3"> {{$user->email}}</p>

                        <h4 class="font-13 text-muted text-uppercase mb-1">Sign in :</h4>
                        <p class="mb-0"> {{$user->created_at}}</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card-box">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Personal Details
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            Change Password
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="home">
                                        <h5 class="text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Information</h5>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="fw-bold"  style="width: 30%;">First Name</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->first_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Last Name</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Name</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Father's Name</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->fathers_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Mother's Name</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->mothers_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Gender</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Birth Date</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->dob}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Religion</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->religion}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Marital Status</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->marital}}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="width: 30%;">Blood</td>
                                                <td style="width: 3%;">:</td>
                                                <td>{{$user->blood}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="profile">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="">
                                                    <h5 class="text-uppercase bg-light p-2"><i class="mdi mdi-key-variant mr-1"></i> Password Change</h5>
                                                </div>
                                               <div class="card-box">
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
                                    </form>
                                        </div>
                                </div>
                            </div> <!-- end card-box-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.code-section.modal.user.profile.edit')

@endsection
