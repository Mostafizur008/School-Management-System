<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <div class="modal-body p-4">
                <ul id="update_msgList"></ul>
                <input type="hidden" id="edit_usr_id"/> 
                <div class="row">
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="first_name" class="form-control" id="edit_first_name" placeholder="Enter first name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="last_name" class="form-control" id="edit_last_name" placeholder="Enter last name">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="name" class="form-control" id="edit_name" placeholder="Username">
                        </div>
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Sex</label>
                        <select name="gender" id="edit_gender" class="form-control">
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
                        <input type="dob" id="edit_dob" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                    </div>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Religion</label>
                        <select id="edit_religion" name="religion" class="form-control">
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
                        <input type="number" name="nid" class="form-control" id="edit_nid" placeholder="Enter National Id No">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Marital Status</label>
                        <select id="edit_marital" name="marital" class="form-control">
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
                        <input type="mobile" class="form-control" id="edit_mobile" data-a-sign="880 " placeholder="Enter Mobile">
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Address</label>
                        <textarea type="address" class="form-control" id="edit_address"  placeholder="Enter Address"></textarea>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Upazila</label>
                        <input type="upazila" class="form-control" id="edit_upazila" placeholder="Enter Upazila">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>District</label>
                        <input type="district" class="form-control" id="edit_district" placeholder="Enter District">
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="country" class="form-control" id="edit_country" placeholder="Enter Country">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>City</label>
                        <input type="city" class="form-control" id="edit_city" placeholder="Enter City">
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" id="edit_zip_code" placeholder="Enter Postal Code">
                    </div>
                 </div>

                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                        </div>
                        <input type="email" id="edit_email" class="form-control" placeholder="Enter Valid Email">
                    </div>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Assign Roles</label>
                        <select name="roles[]" id="edit_roles" class="form-control">
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>

                 <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-blue waves-effect waves-light edit_user">Update</button>
                    </div>
                 </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>