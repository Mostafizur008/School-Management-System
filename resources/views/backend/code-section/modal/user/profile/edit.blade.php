<div class="modal fade" id="profilemodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Profile Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <div class="modal-body p-4">
                <form action="{{route('user.profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-12" align="center">
                        <img id="showImage" src="{{ (!empty($user->image)) ? url('backend/all-images/database/user/'.$user->image): url('backend/all-images/database/default/mps.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                        <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="image" id="image"> </span>
                    </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="first_name" name="first_name" class="form-control" id="first_name" value="{{$user->first_name}}" placeholder="Enter first name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="last_name" name="last_name" class="form-control" id="last_name" value="{{$user->last_name}}" placeholder="Enter last name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="name" name="name" class="form-control" id="name" value="{{$user->name}}" placeholder="Username">
                        </div>
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Father's Name</label>
                        <input type="fathers_name" name="fathers_name" class="form-control" id="fathers_name" value="{{$user->fathers_name}}" placeholder="Enter father's name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Mother's Name</label>
                        <input type="mothers_name" name="mothers_name" class="form-control" id="mothers_name" value="{{$user->mothers_name}}" placeholder="Enter mother's name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Sex</label>
                        <select name="gender" id="gender" class="form-control" data-toggle="select2">
                            <option disable="">Choose one</option>
                            <option value="Male" {{ ($user->gender == "Male" )? "selected": ""}}>Male</option>
                            <option value="Female" {{ ($user->gender == "Female" )? "selected": ""}}>Female</option>
                            <option value="Others" {{ ($user->gender == "Others" )? "selected": ""}}>Others</option>
                        </select>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Birth Of Date</label>
                        <div class="input-group clockpicker">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                        </div>
                        <input type="dob" id="dob" name="dob" class="form-control" value="{{$user->dob}}" data-toggle="flatpicker" placeholder="March 9, 2020">
                    </div>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Religion</label>
                        <select id="religion" name="religion" class="form-control" data-toggle="select2">
                            <option disable="">Choose one</option>
                            <option value="Muslim" {{ ($user->religion == "Muslim" )? "selected": ""}}>Muslim</option>
                            <option value="Hindhu" {{ ($user->religion == "Hindhu" )? "selected": ""}}>Hindhu</option>
                            <option value="Christan" {{ ($user->religion == "Christan" )? "selected": ""}}>Christan</option>
                            <option value="Brudho" {{ ($user->religion == "Brudho" )? "selected": ""}}>Brudho</option>
                        </select>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Blood</label>
                        <select name="blood" id="blood" class="form-control" data-toggle="select2">
                            <option disable="">Choose one</option>
                            <option value="A+" {{ ($user->blood == "A+" )? "selected": ""}}>A+</option>
                            <option value="A-" {{ ($user->blood == "A-" )? "selected": ""}}>A-</option>
                            <option value="B+" {{ ($user->blood == "B+" )? "selected": ""}}>B+</option>
                            <option value="B-" {{ ($user->blood == "B-" )? "selected": ""}}>B-</option>
                            <option value="O+" {{ ($user->blood == "O+" )? "selected": ""}}>O+</option>
                            <option value="O-" {{ ($user->blood == "O-" )? "selected": ""}}>O-</option>
                            <option value="AB+" {{ ($user->blood == "AB+" )? "selected": ""}}>AB+</option>
                            <option value="AB-" {{ ($user->blood == "AB-" )? "selected": ""}}>AB-</option>
                        </select>
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Id No</label>
                        <input type="number" class="form-control" id="nid" name="nid" value="{{$user->nid}}" placeholder="Enter National Id No">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Marital Status</label>
                        <select id="marital" name="marital" class="marital form-control" data-toggle="select2">
                            <option disable="">Choose one</option>
                            <option value="Singal" {{ ($user->marital == "Singal" )? "selected": ""}}>Singal</option>
                            <option value="Marrid" {{ ($user->marital == "Marrid" )? "selected": ""}}>Marrid</option>
                            <option value="Separate" {{ ($user->marital == "Separate" )? "selected": ""}}>Separate</option>
                            <option value="Devorce" {{ ($user->marital == "Devorce" )? "selected": ""}}>Devorce</option>
                        </select>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="mobile" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" data-a-sign="880 " placeholder="Enter Mobile">
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="address" class="form-control" value="{{$user->address}}" id="address" name="address" placeholder="Enter Address">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Upazila</label>
                        <input type="upazila" class="form-control" value="{{$user->upazila}}" id="upazila" name="upazila" placeholder="Enter Upazila">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>District</label>
                        <input type="district" class="form-control" id="district" name="district" value="{{$user->district}}" placeholder="Enter District">
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="country" class="form-control" id="country" name="country" value="{{$user->country}}" placeholder="Enter Country">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>City</label>
                        <input type="city" class="form-control" id="city" name="city" value="{{$user->city}}" placeholder="Enter City">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" id="zip_code" name="zip_code" value="{{$user->zip_code}}" placeholder="Enter Postal Code">
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                        </div>
                        <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter Valid Email">
                    </div>
                    </div>
                 </div>

                 <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                 </div>
                </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>