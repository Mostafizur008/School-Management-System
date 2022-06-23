<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Create User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                     <div class="modal-body p-4">
                        <ul id="save_msgList"></ul>
                        <div class="row">
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="first_name" class="first_name form-control" id="first_name" placeholder="Enter first name">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="last_name" class="last_name form-control" id="last_name" placeholder="Enter last name">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="name" class="name form-control" id="name" placeholder="Username">
                                </div>
                            </div>
                         </div>

                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Sex</label>
                                <select name="gender" id="gender" class="gender form-control" data-toggle="select2">
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
                                <div class="input-group clockpicker">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                                <input type="dob" id="dob" class="dob form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                            </div>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Religion</label>
                                <select id="religion" name="religion" class="religion form-control" data-toggle="select2">
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
                                <input type="number" class="nid form-control" id="nid" placeholder="Enter National Id No">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select id="marital" name="marital" class="marital form-control" data-toggle="select2">
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
                                <label>Mobile</label>
                                <input type="mobile" class="mobile form-control" id="mobile" data-a-sign="880 " placeholder="Enter Mobile">
                            </div>
                         </div>

                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea type="address" class="address form-control" id="address"  placeholder="Enter Address"></textarea>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Country</label>
                                <select id="country-dd" name="country" class="form-control" data-toggle="select2">
                                    <option disable="">Choose one</option>
                                    @foreach ($data as $dt)
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
                                <input type="city" class="city form-control" id="city" placeholder="Enter City">
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="number" class="zip_code form-control" id="zip_code" placeholder="Enter Postal Code">
                            </div>
                         </div>

                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                </div>
                                <input type="email" id="email" class="email form-control" placeholder="Enter Valid Email">
                            </div>
                            </div>
                         </div>
                         <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label>Assign Roles</label>
                                <select name="roles[]" id="selectize-maximum" class="form-control" data-toggle="select2">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>

                         <div class="col-sm-12 col-md-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light add_user">Save</button>
                            </div>
                         </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>