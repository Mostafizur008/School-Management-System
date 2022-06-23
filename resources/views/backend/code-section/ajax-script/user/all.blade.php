

<script>

    $(document).ready(function (){
    
    fetchuser();
    
    function fetchuser() {
    $.ajax({
    type: "GET",                             
    url: "/fetch-user",                     
    dataType: "json",
    });
    }
    
    
    $(document).on('click', '.add_user', function (e) {       
        e.preventDefault();
        var data = {
            'first_name': $('.first_name').val(),
            'last_name': $('.last_name').val(),
            'name': $('.name').val(),
            'gender': $('.gender').val(),
            'dob': $('.dob').val(),
            'mobile': $('.mobile').val(),
            'nid': $('.nid').val(),
            'religion': $('.religion').val(),
            'marital': $('.marital').val(),
            'address': $('.address').val(),
            'upazila': $('.upazila').val(),
            'district': $('.district').val(),
            'country': $('.country').val(),
            'city': $('.city').val(),
            'zip_code': $('.zip_code').val(),
            'email': $('.email').val(),
        }
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $.ajax({
            type: "POST",          
            url: "/user",      
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
                    fetchuser();                            
                   
                }
            }
        });
       });
    
    
    
    //---------------------------------------edit-------------------------------------------
    
    
    
    $(document).on('click', '.editbtn', function (e) {      
        e.preventDefault();
        var usr_id = $(this).val();                       
        // alert(stud_id);
        $('#editmodal').modal('show');                     
        $.ajax({
            type: "GET",                                
            url: "/edit-user/" + usr_id,                 
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editmodal').modal('hide');         
                } else {
                    // console.log(response.student.name);
                    $('#edit_first_name').val(response.user.first_name);  
                    $('#edit_last_name').val(response.user.last_name);
                    $('#edit_name').val(response.user.name);
                    $('#edit_gender').val(response.user.gender);
                    $('#edit_dob').val(response.user.dob);
                    $('#edit_mobile').val(response.user.mobile);
                    $('#edit_religion').val(response.user.religion); 
                    $('#edit_nid').val(response.user.nid);    
                    $('#edit_marital').val(response.user.marital); 
                    $('#edit_address').val(response.user.address);
                    $('#edit_upazila').val(response.user.upazila); 
                    $('#edit_district').val(response.user.district); 
                    $('#edit_country').val(response.user.country);
                    $('#edit_city').val(response.user.city);
                    $('#edit_zip_code').val(response.user.zip_code);
                    $('#edit_email').val(response.user.email);
                    $('#edit_roles').val(response.user.roles);
                    $('#edit_usr_id').val(usr_id);                   
                }
            }
        });
    });
    
    $(document).on('click', '.edit_user', function (e) { 
        e.preventDefault();
        var id = $('#edit_usr_id').val();             
        
        var data = {
            'first_name': $('#edit_first_name').val(),        
            'last_name': $('#edit_last_name').val(),
            'name': $('#edit_name').val(),
            'gender': $('#edit_gender').val(),
            'dob': $('#edit_dob').val(),
            'mobile': $('#edit_mobile').val(),
            'nid': $('#edit_nid').val(),
            'religion': $('#edit_religion').val(),
            'marital': $('#edit_marital').val(),
            'address': $('#edit_address').val(),
            'upazila': $('#edit_upazila').val(),
            'district': $('#edit_district').val(),
            'country': $('#edit_country').val(),
            'city': $('#edit_city').val(),
            'zip_code': $('#edit_zip_code').val(),
            'email': $('#edit_email').val(),
            'roles': $('#edit_roles').val(),
        }
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: "PUT",                             
            url: "/update-user/" + id,                 
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
                    fetchuser();
                }
            }
        });
    
    
    });
    
    //-------------------------------------------delete----------------------------
    
    $(document).on('click', '.deletebtn', function () {
    var usr_id = $(this).val();
    $('#deletemodal').modal('show');
    $('#deleteing_id').val(usr_id);
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
            url: "/delete-user/" + id,
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
                    fetchuser();
                }
            }
        });
    });
    
    
    
    });
    
    </script>
 