<div class="modal fade" id="addmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered text-center modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Create Syllabus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
         <form action="{{route('syllabus.store')}}" method="post" enctype="multipart/form-data">
             @csrf
           <div class="modal-body p-4">
                <div class="col-md-12">
                   <div class="form-group">
                       <input type="title" name="title" class="title form-control" placeholder="Enter Title">
                   </div>
                </div>
                <div class="col-sm-6 col-md-12">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="file_path" class="custom-file-input" id="inputGroupFile04">
                            <label class="custom-file-label" for="inputGroupFile04"></label>
                        </div>
                    </div>
                </div><br/>
                <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                 </div>
           </div>
         </form>
        </div>
    </div>
</div>