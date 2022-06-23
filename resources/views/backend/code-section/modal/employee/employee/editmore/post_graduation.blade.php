
                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label class="form-label">Post Graduation<span class="text-red"> *</span></label>
                        <select name="type_4" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($type as $tp)
                            <option value="{{$tp->id}}" {{ ($editData->type_4 == $tp->id)?"selected": ""}}>{{$tp->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                  
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Institution<span class="text-red"> *</span></label>
                        <select name="institution_4" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($institution as $it)
                            <option value="{{$it->id}}" {{ ($editData->institution_4 == $it->id)?"selected": ""}}>{{$it->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                
                 <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="roll_4" value="{{$editData->roll_4}}" class="form-control" id="roll_4" placeholder="Enter Role">
                    </div>
                 </div>
                
                 <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>Grade Point</label>
                        <input type="text" name="point_4" value="{{$editData->point_4}}" class="form-control" id="point_4" placeholder="Enter Grade Point">
                    </div>
                 </div>
                
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Passing Yaer<span class="text-red"> *</span></label>
                        <select name="passing_4" class="form-control" data-placeholder="Choose one" data-toggle="select2">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($passing as $ps)
                            <option value="{{$ps->id}}" {{ ($editData->passing_4 == $ps->id)?"selected": ""}}>{{$ps->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>


