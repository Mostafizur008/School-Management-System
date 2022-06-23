<div class="modal fade" id="edit" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered text-center modal-sm-5 " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Create Cost</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" action="{{ route('update.other.cost',$editData->id ) }}" enctype="multipart/form-data">
            @csrf
           <div class="modal-body p-4">
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                       <input type="text" name="amount" value="{{$editData->amount}}" class="form-control" placeholder="Enter Amount">
                   </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                        </div>
                        <input type="date" name="date" id="date" value="{{$editData->date}}" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
                    </div>
                    </div>
                 </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="description" id="description" value="{{$editData->description}}" class="form-control" required="" placeholder="Please Description Here.."></textarea>
                    </div>
                 </div>
                 <div class="col-sm-6 col-md-6" align="center">
                    <img id="showImage" src="{{ (!empty($editData->image)) ? url('backend/backend/all-images/others/cost/'.$editData->image): url('backend/all-images/others/default/cost.png') }}" alt="image" class="img-fluid avatar-lg rounded"/><br/>
                    <span class="badge rounded-pill"> <input class="avatar-ms" type="file" name="image" id="image"> </span>
                </div>
               </div>
                <br/>
                <div class="col-sm-12 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                 </div>
           </div>
         </form>
        </div>
    </div>
</div>

</div> 