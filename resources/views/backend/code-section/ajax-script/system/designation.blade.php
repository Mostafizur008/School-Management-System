

<script>

    $(document).ready(function (){
    
        fetchdesignation();

    function fetchdesignation() {
        $.ajax({
        type: "GET",                          
        url: "/fetch-designation",                     
        dataType: "json",
    });
    }
    
    
    
    $(document).on('click', '.add_designation', function (e) {       
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
            url: "/designation",      
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
                    $('#save_msgList').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#addmodal').find('input').val('');   
                    $('#addmodal').modal('hide');              
                    fetchdesignation();                            
                   
                }
            }
        });
       });
    
    
    
    //---------------------------------------edit-------------------------------------------
    
    
    
    $(document).on('click', '.editbtn', function (e) {      
        e.preventDefault();
        var dg_id = $(this).val();                       
        // alert(stud_id);
        $('#editmodal').modal('show');                     
        $.ajax({
            type: "GET",                                
            url: "/edit-designation/" + dg_id,                 
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editmodal').modal('hide');         
                } else {
                    // console.log(response.student.name);
                    $('#edit_name').val(response.designation.name);
                    $('#edit_dg_id').val(dg_id);                   
                }
            }
        });
    });
    
    $(document).on('click', '.edit_designation', function (e) { 
        e.preventDefault();
        var id = $('#edit_dg_id').val();             
        
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
            url: "/update-designation/" + id,                 
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
                    fetchdesignation();
                }
            }
        });
    
    
    });
    
    //-------------------------------------------delete----------------------------
    
    $(document).on('click', '.deletebtn', function () {
    var dg_id = $(this).val();
    $('#deletemodal').modal('show');
    $('#deleteing_id').val(dg_id);
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
            url: "/delete-designation/" + id,
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
                    fetchdesignation();
                }
            }
        });
    });
    
    
    
    });
    
    </script>
 