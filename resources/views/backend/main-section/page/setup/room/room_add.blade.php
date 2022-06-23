@extends('backend.admin.main')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
             
            </div>
            <!-- PAGE-HEADER END -->

            <!--Row -->
            <div class="row">

                <div class="col-md-12 col-xl-3">
                    <div class="card">
                       
                    </div>
                 
                    </div>


                <div class="col-md-12 col-xl-6">
                    <div class="card">

                    <form action="{{route('room.store')}}" method="post" >
                            @csrf 

                        <div class="card-body">

                        <div class="mrs">
                            <div class="form-group col-md-12 mb-0" align="right">
                                <span class="btn btn-sm  btn-primary addeventmore"><i class="fa fa-plus"></i></span>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Building <span class="text-red">*</span></label>
                                        <select name="building_id" id="building_id" class="form-control form select2">

                                            <option value="" selected="" disabled="">Chose One</option>

                                            @foreach ($building as $bl)
     
                                            <option value="{{$bl->id}}">{{$bl->name}}</option>
                                                
                                            @endforeach 

                                            </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Floor <span class="text-red">*</span></label>
                                        <select name="floor" id="floor" class="form-control form select2">

                                         

                                       

                                            </select>
                                    </div>
                                </div>

                            </div>
                        

                          
                            <div class="form-row">

                                <div class="form-group col-md-12 mb-0">
                                    <div class="form-group">
                                        <label class="form-label">Room No <span class="text-red">*</span></label>
                                        <input type="text" name="room_name[]" id="room_name[]" class="form-control"  placeholder="Room No">
                                    </div>
                                </div>

                               

                            </div>

                        </div>
                        
                            <div class="form-footer mt-4" align="right">
                                <input class="btn btn-primary submit-btn" type="SUBMIT"/>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-xl-3">
                    <div class="card">
                       
                    </div>
                 
                    </div>




                </div>
            </div>
            <!--End Row-->

       
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>

<!---------------------------------------------------Load---------------------------------------->

<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script>
         $(document).ready(function() {
        $('#building_id').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/floor/getroom/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#floor').empty();
                        $('#floor').focus;
                        $('#floor').append('<option value="">-- Select City --</option>'); 
                        $.each(data, function(key, value){
                        $('select[name="floor"]').append('<option value="'+ key +'">' + value.floor_name+ '</option>');
                    });
                  }else{
                    $('#floor').empty();
                  }
                  }
                });
            }else{
              $('#floor').empty();
            }
        });
    });
    </script>


<script type="text/javascript">
    
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",'.addeventmore',function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest(".mrs").append(whole_extra_item_add);
        counter ++;
        });
    
        $(document).on("click",'.removeeventmore',function(event){
        $(this).closest(".delete_whole_extra_item_add").remove();
        counter -=1
    
    });
    
    });
    
    
</script>


@endsection
