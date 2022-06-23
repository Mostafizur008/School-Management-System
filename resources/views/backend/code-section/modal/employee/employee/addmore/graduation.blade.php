<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">



                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label class="form-label">Graduation<span class="text-red"> *</span></label>
                        <select name="type_3" class="form-control" data-placeholder="Choose one">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($type as $tp)
                            <option value="{{$tp->id}}">{{$tp->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                  
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Institution<span class="text-red"> *</span></label>
                        <select name="institution_3" class="form-control" data-placeholder="Choose one">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($institution as $it)
                            <option value="{{$it->id}}">{{$it->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                
                 <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="roll_3" class="form-control" id="roll_3" placeholder="Enter Role">
                    </div>
                 </div>
                
                 <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>Grade Point</label>
                        <input type="text" name="point_3" class="form-control" id="point_3" placeholder="Enter Grade Point">
                    </div>
                 </div>
                
                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label class="form-label">Passing Yaer<span class="text-red"> *</span></label>
                        <select name="passing_3" class="form-control" data-placeholder="Choose one">
                            <option value="" selected="" disabled="">Chose One</option>
                            @foreach ($passing as $ps)
                            <option value="{{$ps->id}}">{{$ps->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-1" style="padding-top: 34px;"> 
                    <div class="form-group">
                        <span class="btn btn-xs btn-success addeventmore1"><i class="fa fa-plus"></i></span>
                        <span class="btn btn-xs btn-danger removeeventmore"><i class="fa fa-minus"></i></span>
                    </div>
                  </div>


</div>    

</div>
</div>
</div>