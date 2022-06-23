
                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label class="form-label">Graduation<span class="text-red"> *</span></label>
                        <select name="type_3" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($type as $tp)
                            <option value="{{$tp->id}}" {{ ($editData->type_3 == $tp->id)?"selected": ""}}>{{$tp->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                  
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Institution<span class="text-red"> *</span></label>
                        <select name="institution_3" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($institution as $it)
                            <option value="{{$it->id}}" {{ ($editData->institution_3 == $it->id)?"selected": ""}}>{{$it->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                
                 <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="roll_3" value="{{$editData->roll_3}}" class="form-control" id="roll_3" placeholder="Enter Role">
                    </div>
                 </div>
                
                 <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>Grade Point</label>
                        <input type="text" name="point_3" value="{{$editData->point_3}}" class="form-control" id="point_3" placeholder="Enter Grade Point">
                    </div>
                 </div>
                
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Passing Yaer<span class="text-red"> *</span></label>
                        <select name="passing_3" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($passing as $ps)
                            <option value="{{$ps->id}}" {{ ($editData->passing_3 == $ps->id)?"selected": ""}}>{{$ps->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>


