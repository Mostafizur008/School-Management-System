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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Student-edit</a></li>
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
                </div>
                <div class="card-box">
            <form action="{{route('reg.update',$editData->student_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$editData->id}}" class="form-control">
                    <div class="row">
                        <div class="col-sm-12 col-md-12" align="center">
                            <img id="showImage" src="{{ (!empty($editData['st_name']['image'])) ? url('backend/all-images/default/student/'.$editData['st_name']['image']): url('backend/all-images/database/default/mps.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                            <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="image" id="image"> </span>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>First Name</label>
                               <input type="first_name" name="first_name" value="{{$editData['st_name']['first_name']}}" class="form-control" id="first_name" placeholder="Enter first name">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Last Name</label>
                               <input type="last_name" name="last_name" value="{{$editData['st_name']['last_name']}}" class="form-control" id="last_name" placeholder="Enter last name">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group mb-3">
                               <label>Full Name</label>
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text">@</span>
                                   </div>
                                   <input type="name" name="name" value="{{$editData['st_name']['name']}}" class="form-control" id="name" placeholder="Full Name">
                               </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Sex</label>
                                <select name="gender" name="gender" id="gender" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option  value="Male" {{ ($editData['st_name']['gender'] == 'Male')? "selected": ""}} >Male</option>
                                    <option value="Female" {{ ($editData['st_name']['gender'] == 'Female')? "selected": ""}}>Female</option>
                                    <option value="Others" {{ ($editData['st_name']['gender'] == 'Others')? "selected": ""}}>Others</option>
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
                                <input type="dob" name="dob" id="dob" value="{{$editData['st_name']['dob']}}" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                            </div>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Religion</label>
                                <select id="religion" name="religion" name="religion" class="form-control" data-toggle="select2">
                                    <option  value="Muslim" {{ ($editData['st_name']['religion'] == 'Muslim')? "selected": ""}} >Muslim</option>
                                    <option value="Hindhu" {{ ($editData['st_name']['religion'] == 'Hindhu')? "selected": ""}}>Hindhu</option>
                                    <option value="Chistan" {{ ($editData['st_name']['religion'] == 'Chistan')? "selected": ""}}>Chistan</option>
                                    <option value="Boudho" {{ ($editData['st_name']['religion'] == 'Boudho')? "selected": ""}}>Boudho</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Id No</label>
                                <input type="number" name="nid" value="{{$editData['st_name']['nid']}}" class="form-control" id="nid" placeholder="Enter National Id No">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select id="marital" name="marital" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="Singal" {{ ($editData['st_name']['marital']  == 'Singal')? "selected": ""}}>Singal</option>
                                    <option value="Marrid" {{ ($editData['st_name']['marital']  == 'Marrid')? "selected": ""}}>Marrid</option>
                                    <option value="Separate" {{ ($editData['st_name']['marital']   == 'Separate')? "selected": ""}}>Separate</option>
                                    <option value="Devorce" {{ ($editData['st_name']['marital']   == 'Devorce')? "selected": ""}}>Devorce</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text" name="nationality" value="{{$editData['st_name']['nationality']}}" class="form-control" id="nationality" placeholder="Enter Nationality">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Blood</label>
                                <select name="blood" id="blood" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option value="A+" {{ ($editData['st_name']['blood'] == "A+" )? "selected": ""}}>A+</option>
                                    <option value="A-" {{ ($editData['st_name']['blood'] == "A-" )? "selected": ""}}>A-</option>
                                    <option value="B+" {{ ($editData['st_name']['blood'] == "B+" )? "selected": ""}}>B+</option>
                                    <option value="B-" {{ ($editData['st_name']['blood'] == "B-" )? "selected": ""}}>B-</option>
                                    <option value="O+" {{ ($editData['st_name']['blood'] == "O+" )? "selected": ""}}>O+</option>
                                    <option value="O-" {{ ($editData['st_name']['blood'] == "O-" )? "selected": ""}}>O-</option>
                                    <option value="AB+" {{ ($editData['st_name']['blood'] == "AB+" )? "selected": ""}}>AB+</option>
                                    <option value="AB-" {{ ($editData['st_name']['blood'] == "AB-" )? "selected": ""}}>AB-</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" value="{{$editData['st_name']['mobile']}}" class="form-control" id="mobile" placeholder="Enter Mobile">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                </div>
                                <input type="email" name="email" id="email" value="{{$editData['st_name']['email']}}" class="form-control" placeholder="Enter Valid Email">
                            </div>
                            </div>
                         </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Father's Name</label>
                                <input type="text" name="fathers_name" value="{{$editData['st_name']['fathers_name']}}" class="form-control" id="fathers_name" placeholder="Enter Father's Name">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Father's Profession</label>
                                <select name="profession_1" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    <option  value="Govt. Job Holder" {{ ($editData['st_name']['profession_1'] == 'Govt. Job Holder')? "selected": ""}} >Govt. Job Holder</option>
                                    <option value="Farmer" {{ ($editData['st_name']['profession_1'] == 'Farmer')? "selected": ""}}>Farmer</option>
                                    <option value="Teacher" {{ ($editData['st_name']['profession_1'] == 'Teacher')? "selected": ""}}>Teacher</option>
                                    <option  value="Business" {{ ($editData['st_name']['profession_1'] == 'Business')? "selected": ""}} >Business</option>
                                    <option value="Imam" {{ ($editData['st_name']['profession_1'] == 'Imam')? "selected": ""}}>Imam</option>
                                    <option value="Probashi" {{ ($editData['st_name']['profession_1'] == 'Probashi')? "selected": ""}}>Probashi</option>
                                 </select>
                            </div>
                         </div>
                        <div class="col-sm-6 col-md-3">
                         <div class="form-group">
                            <label>Mother's Name</label>
                            <input type="text" name="mothers_name" value="{{$editData['st_name']['mothers_name']}}" class="form-control" id="mothers_name" placeholder="Enter Mother's Name">
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Mother's Profession</label>
                            <select name="profession_2" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                <option disable="">Choose one</option>
                                <option  value="Govt. Job Holder" {{ ($editData['st_name']['profession_2'] == 'Govt. Job Holder')? "selected": ""}} >Govt. Job Holder</option>
                                <option value="Farmer" {{ ($editData['st_name']['profession_2'] == 'Farmer')? "selected": ""}}>Farmer</option>
                                <option value="Teacher" {{ ($editData['st_name']['profession_2'] == 'Teacher')? "selected": ""}}>Teacher</option>
                                <option  value="Business" {{ ($editData['st_name']['profession_2'] == 'Business')? "selected": ""}} >Business</option>
                                <option value="Probashi" {{ ($editData['st_name']['profession_2'] == 'Probashi')? "selected": ""}}>Probashi</option>
                                <option value="House Wife" {{ ($editData['st_name']['profession_2'] == 'House Wife')? "selected": ""}}>House Wife</option>

                            </select>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile_1" value="{{$editData['st_name']['mobile_1']}}" class="form-control" id="mobile_1" placeholder="Enter Mobile">
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-12"><hr></div>

                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Address</label>
                               <textarea type="address" name="address" value="{{$editData['st_name']['address']}}" class="form-control" id="address"  placeholder="Enter Address"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Country</label>
                                <select id="country-dd" name="country" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($country as $dt)
                                    <option value="{{$dt->id}}" {{ ($editData['st_name']['country'] == $dt->id)?"selected": ""}}>
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
                               <input type="city" name="city" value="{{$editData['st_name']['city']}}" class="form-control" id="city" placeholder="Enter City">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                           <div class="form-group">
                               <label>Postal Code</label>
                               <input type="number" name="zip_code" value="{{$editData['st_name']['zip_code']}}" class="form-control" id="zip_code" placeholder="Enter Postal Code">
                           </div>
                        </div>

                        <div class="col-sm-6 col-md-12"><hr></div>

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Class <span class="text-red">*</span></label>
                                <select name="class_id" value="" selected="" disable="" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($class as $cl)
                                    <option value="{{$cl->id}}" {{ ($editData->class_id == $cl->id )? "selected":""}}>{{$cl->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Session <span class="text-red">*</span></label>
                                <select name="session_id" value="" selected="" disable="" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disable="">Choose one</option>
                                    @foreach ($session as $ss)
                                    <option value="{{$ss->id}}" {{ ($editData->session_id == $ss->id )? "selected":""}}>{{$ss->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Group <span class="text-red"></span></label>
                                <select name="group_id" value="" selected="" disable="" class="form-control" data-toggle="select2">
                                    <option value="" selected="" disabled="">Chose One</option>
                                    @foreach ($group as $gp)
                                    <option value="{{$gp->id}}" {{ ($editData->group_id == $gp->id )? "selected":""}}>{{$gp->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Shift <span class="text-red"></span></label>
                                <select name="shift_id" value="" selected="" disable="" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($shift as $sf)
                                    <option value="{{$sf->id}}" {{ ($editData->shift_id == $sf->id )? "selected":""}}>{{$sf->name}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Discount (%) <span class="text-red"></span></label>
                                <input type="number" name="discount" value="{{$editData['ds_name']['discount']}}" class="form-control" placeholder="Discount">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="text-right">
                             <input type="submit" class="btn btn-success waves-effect waves-light" value="Update">
                            </div>
                    </div>
                </form>
                </div>
             </div>      
         </div>
    </div> <!-- end card-box -->
</div>

        @include('backend.code-section.jquery.scripts.dependence')
        <script type="text/javascript">

            @include('backend.main-section.page.employee.ajax.imageshow')
                
        </script>

@endsection
