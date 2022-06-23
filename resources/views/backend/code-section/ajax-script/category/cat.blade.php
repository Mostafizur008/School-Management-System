

<script>

    $(document).ready(function (){
    
    fetchfeecategory();
    
    function fetchfeecategory() {
        $.ajax({
        type: "GET",                          
        url: "/fetch-fee-category",                     
        dataType: "json",
    });
     }
    
    
    
    
    $(document).on('click', '.add_feecategory', function (e) {       
        e.preventDefault();
        var data = {
            'name': $('.name').val(),
        }
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $.ajax({
            type: "POST",          
            url: "/fee-category/",      
            data: data,
            dataType: "json",
            success: function (response) {
                // console.log(response);
                if (response.status == 400) {
                    $('#save_msgList').html("");
                    $('#save_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList').append('<li>' + err_value + '</li>');
                    });
                   
                } else {
                    $('#addmodal').find('input').val('');   
                    $('#addmodal').modal('hide');              
                    fetchfeecategory();                            
                   
                }
            }
        });
       });
    
    
    
    //---------------------------------------edit-------------------------------------------
    
    
    
    $(document).on('click', '.editbtn', function (e) {      
        e.preventDefault();
        var ct_id = $(this).val();                       
        // alert(stud_id);
        $('#editmodal').modal('show');                     
        $.ajax({
            type: "GET",                                
            url: "/edit-fee-category/" + ct_id,                 
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editmodal').modal('hide');         
                } else {
                    // console.log(response.student.name);
                    $('#edit_name').val(response.feecategory.name);
                    $('#edit_ct_id').val(ct_id);                   
                }
            }
        });
    });
    
    $(document).on('click', '.edit_feecategory', function (e) { 
        e.preventDefault();
        var id = $('#edit_ct_id').val();             
        
        var data = {
            'name': $('#edit_name').val(),
        }
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: "PUT",                             
            url: "/update-fee-category/" + id,                 
            data: data,                                 
            dataType: "json",                        
            success: function (response) {
                // console.log(response);
                if (response.status == 400) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value +
                            '</li>');
                    });
                  
                } else {
                    $('#update_msgList').html("");              
                    $('#success_message').addClass('alert alert-success'); 
                    $('#success_message').text(response.message);
                    $('#editmodal').modal('hide');   
                    fetchfeecategory();
                }
            }
        });
    
    
    });
    
    //-------------------------------------------delete----------------------------
    
    $(document).on('click', '.deletebtn', function () {
    var ct_id = $(this).val();
    $('#deletemodal').modal('show');
    $('#deleteing_id').val(ct_id);
    });
    
    $(document).on('click', '.deleteb', function (e) {
    e.preventDefault();
    var id = $('#deleteing_id').val();
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    
    $.ajax({
            type: "DELETE",
            url: "/delete-fee-category/" + id,
            dataType: "json",
            success: function (response) {
                // console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                } else {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#deletemodal').modal('hide');
                    fetchfeecategory();
                }
            }
        });
    });
    
    
    
    });
    
    </script>
 