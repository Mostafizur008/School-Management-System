<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered text-center modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Group</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
           <div class="modal-body p-4">
            <input type="hidden" id="edit_group_id"/>
                <div class="col-md-12">
                   <div class="form-group">
                       <input type="name" name="name" class="form-control" id="edit_name" placeholder="Enter Group">
                   </div>
                </div><br/>
                <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light edit_group">Update</button>
                    </div>
                 </div>
           </div>
        </div>
    </div>
</div>