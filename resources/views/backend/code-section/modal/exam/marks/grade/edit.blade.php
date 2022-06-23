<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered text-center modal-sm-5 " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Edit Garde</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
           <div class="modal-body p-4">
            <input type="hidden" id="edit_grade_id"/>
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                       <input type="grade_name" class="form-control" id="edit_grade_name" placeholder="Enter Grade Name">
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="grade_point" class="form-control" id="edit_grade_point" placeholder="Enter Grade point">
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <input type="start_marks" class="form-control" id="edit_start_marks" placeholder="Enter Start Marks">
                    </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <input type="end_marks" class="form-control" id="edit_end_marks" placeholder="Enter End Marks">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="start_point" class="form-control" id="edit_start_point" placeholder="Enter Start Point">
                    </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <input type="end_point" class="form-control" id="edit_end_point" placeholder="Enter End point">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="remarks" class="form-control" id="edit_remarks" placeholder="Enter Remarks">
                    </div>
                 </div>
               </div><br/>
                <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light edit_grade">Update</button>
                    </div>
                 </div>
           </div>
        </div>
    </div>
</div>