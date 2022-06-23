<div class="col-sm-6 col-md-2">
    <div class="form-group">
        <label class="form-label">SSC<span class="text-red"> *</span></label>
        <select name="type_1" class="form-control" data-placeholder="Choose one" data-toggle="select2">
            <option value="" selected="" disabled="">Chose One</option>
            @foreach ($type as $tp)
            <option value="{{$tp->id}}" {{ ($editData->type_1 == $tp->id)?"selected": ""}}>{{$tp->name}}</option>
            @endforeach 
        </select>
    </div>
</div>
  
<div class="col-sm-6 col-md-3">
    <div class="form-group">
        <label>Institution</label>
        <input type="text" name="institution_1" value="{{$editData->institution_1}}" class="form-control" id="institution_1" placeholder="Enter Institution">
    </div>
 </div>

 <div class="col-sm-6 col-md-2">
    <div class="form-group">
        <label>Role</label>
        <input type="text" name="roll_1" value="{{$editData->roll_1}}" class="form-control" id="roll_1" placeholder="Enter Role">
    </div>
 </div>

 <div class="col-sm-6 col-md-2">
    <div class="form-group">
        <label>Grade Point</label>
        <input type="text" name="point_1" value="{{$editData->point_1}}" class="form-control" id="point_1" placeholder="Enter Grade Point">
    </div>
 </div>

<div class="col-sm-6 col-md-3">
    <div class="form-group">
        <label class="form-label">Passing Yaer<span class="text-red"> *</span></label>
        <select name="passing_1" class="form-control" data-placeholder="Choose one" data-toggle="select2">
            <option value="" selected="" disabled="">Chose One</option>
            @foreach ($passing as $ps)
            <option value="{{$ps->id}}" {{ ($editData->passing_1 == $ps->id)?"selected": ""}}>{{$ps->name}}</option>
            @endforeach 
        </select>
    </div>
</div>
