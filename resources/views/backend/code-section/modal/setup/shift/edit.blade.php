<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered text-center modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Shift</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
           <div class="modal-body p-4">
            <input type="hidden" id="edit_shift_id"/>
                <div class="col-md-12">
                   <div class="form-group">
                       <input type="name" name="name" class="form-control" id="edit_name" placeholder="Enter Shift">
                   </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                            <input type="text" name="start" id="edit_start" class="form-control" value="Start Time">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                            <input type="text" name="end" id="edit_end" class="form-control" value="End Time">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                        </div>
                    </div>
                 </div><br/>
                <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light edit_shift">Update</button>
                    </div>
                 </div>
           </div>
        </div>
    </div>
</div>