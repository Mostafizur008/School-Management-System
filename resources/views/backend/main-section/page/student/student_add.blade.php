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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Student-add</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Student Portal</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="modal-header bg-success">
                    <h4 class="modal-title" id="myCenterModalLabel">Create Student</h4>
                </div>
                <div class="card-box">
            <form action="{{route('reg.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mrs">
                    <div class="row">
                        <div class="col-sm-12 col-md-12" align="center">
                            <img id="showImage" src="{{ (!empty($user->image)) ? url('backend/all-images/database/student/'.$user->image): url('backend/all-images/database/default/mps.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                            <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="image" id="image"> </span>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>First Name</label>
                               <input type="first_name" name="first_name" class="form-control" id="first_name" placeholder="Enter first name">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Last Name</label>
                               <input type="last_name" name="last_name" class="form-control" id="last_name" placeholder="Enter last name">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group mb-3">
                               <label>Full Name</label>
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text">@</span>
                                   </div>
                                   <input type="name" name="name" class="form-control" id="name" placeholder="Full Name">
                               </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Sex</label>
                                <select name="gender" name="gender" id="gender" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                     <option value="Others">Others</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Birth Of Date</label>
                                <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="dob" name="dob" id="dob" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                            </div>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Religion</label>
                                <select id="religion" name="religion" name="religion" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Hindhu">Hindhu</option>
                                    <option value="Christan">Christan</option>
                                    <option value="Brudho">Brudho</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Id No</label>
                                <input type="number" name="nid" class="form-control" id="nid" placeholder="Enter National Id No">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select id="marital" name="marital" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="Singal">Singal</option>
                                    <option value="Marrid">Marrid</option>
                                    <option value="Separate">Separate</option>
                                    <option value="Devorce">Devorce</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text" name="nationality" class="form-control" id="nationality" placeholder="Enter Nationality">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Blood</label>
                                <select name="blood" id="blood" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Valid Email">
                            </div>
                            </div>
                         </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Father's Name</label>
                                <input type="text" name="fathers_name" class="form-control" id="fathers_name" placeholder="Enter Father's Name">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Father's Profession</label>
                                <select name="profession_1" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="Govt. Job Holder">Govt. Job Holder</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Business">Business</option>
                                    <option value="Imam">Imam</option>
                                    <option value="Probashi">Probashi</option>
                                 </select>
                            </div>
                         </div>
                        <div class="col-sm-6 col-md-3">
                         <div class="form-group">
                            <label>Mothers's Name</label>
                            <input type="text" name="mothers_name" class="form-control" id="mothers_name" placeholder="Enter Mother's Name">
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Mother's Profession</label>
                            <select name="profession_2" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                <option disable="">Choose one</option>
                                <option value="Govt. Job Holder">Govt. Job Holder</option>
                                <option value="Farmer">Farmer</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Business">Business</option>
                                <option value="House wife">House Wife</option>
                                <option value="Probashi">Probashi</option>
                            </select>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile_1" class="form-control" id="mobile_1" placeholder="Enter Mobile">
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-12"><hr></div>

                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Address</label>
                               <textarea type="address" name="address" class="form-control" id="address"  placeholder="Enter Address"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Country</label>
                                <select id="country-dd" name="country" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($country as $dt)
                                    <option value="{{$dt->id}}">
                                        {{$dt->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>District</label>
                               <select id="district-dd" name="district" class="form-control" data-toggle="select2">
                               </select>
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Upazila</label>
                               <select id="upazila-dd" name="upazila" class="form-control" data-toggle="select2">
                               </select>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>City</label>
                               <input type="city" name="city" class="form-control" id="city" placeholder="Enter City">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Postal Code</label>
                               <input type="number" name="zip_code" class="form-control" id="zip_code" placeholder="Enter Postal Code">
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-12"><hr></div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Class <span class="text-red">*</span></label>
                                <select name="class_id" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($class as $cl)
                                    <option value="{{$cl->id}}">{{$cl->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Session <span class="text-red">*</span></label>
                                <select name="session_id" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disable="">Choose one</option>
                                    @foreach ($session as $ss)
                                    <option value="{{$ss->id}}">{{$ss->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Group <span class="text-red"></span></label>
                                <select name="group_id" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($group as $gp)
                                    <option value="{{$gp->id}}">{{$gp->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Shift <span class="text-red"></span></label>
                                <select name="shift_id" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($shift as $sf)
                                    <option value="{{$sf->id}}">{{$sf->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Discount (%) <span class="text-red"></span></label>
                                <input type="number" name="discount" class="form-control" placeholder="Discount">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Application Of Student</label>
                                <select name="roles[]" id="selectize-maximum" class="form-control" data-toggle="select2">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name}}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>


                    </div>
                </div>


                



                        <div class="col-sm-12 col-md-12">
                           <div class="text-right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="Save">
                           </div>
                        </div>
                    </form>
                       </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>

        @include('backend.code-section.jquery.scripts.dependence')
        <script type="text/javascript">

            @include('backend.main-section.page.employee.ajax.imageshow')
                
        </script>

@endsection
