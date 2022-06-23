

<script>

    $(document).ready(function (){
    
    fetchgrade();
    
    function fetchgrade() {
    $.ajax({
        type: "GET",                          
        url: "/fetch-grade",                     
        dataType: "json",
    });
   }
    
    
    $(document).on('click', '.add_grade', function (e) {       
        e.preventDefault();
        var data = {
            'grade_name': $('.grade_name').val(),
            'grade_point': $('.grade_point').val(),
            'start_marks': $('.start_marks').val(),
            'end_marks': $('.end_marks').val(),
            'start_point': $('.start_point').val(),
            'end_point': $('.end_point').val(),
            'remarks': $('.remarks').val(),
        }
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $.ajax({
            type: "POST",          
            url: "/grade",      
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
                    fetchgrade();                            
                   
                }
            }
        });
       });
    
    
    
    //---------------------------------------edit-------------------------------------------
    
    
    
    $(document).on('click', '.editbtn', function (e) {      
        e.preventDefault();
        var grade_id = $(this).val();                       
        // alert(stud_id);
        $('#editmodal').modal('show');                     
        $.ajax({
            type: "GET",                                
            url: "/edit-grade/" + grade_id,                 
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editmodal').modal('hide');         
                } else {
                    // console.log(response.student.name);
                    $('#edit_grade_name').val(response.grade.grade_name);
                    $('#edit_grade_point').val(response.grade.grade_point);
                    $('#edit_start_marks').val(response.grade.start_marks);
                    $('#edit_end_marks').val(response.grade.end_marks);
                    $('#edit_start_point').val(response.grade.start_point);
                    $('#edit_end_point').val(response.grade.end_point);
                    $('#edit_remarks').val(response.grade.remarks);
                    $('#edit_grade_id').val(grade_id);                   
                }
            }
        });
    });
    
    $(document).on('click', '.edit_grade', function (e) { 
        e.preventDefault();
        var id = $('#edit_grade_id').val();             
        
        var data = {
            'grade_name': $('#edit_grade_name').val(),
            'grade_point': $('#edit_grade_point').val(),
            'start_marks': $('#edit_start_marks').val(),
            'end_marks': $('#edit_end_marks').val(),
            'start_point': $('#edit_start_point').val(),
            'end_point': $('#edit_end_point').val(),
            'remarks': $('#edit_remarks').val(),
        }
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: "PUT",                             
            url: "/update-grade/" + id,                 
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
                    fetchgrade();
                }
            }
        });
    
    
    });
    
    //-------------------------------------------delete----------------------------
    
    $(document).on('click', '.deletebtn', function () {
    var grade_id = $(this).val();
    $('#deletemodal').modal('show');
    $('#deleteing_id').val(grade_id);
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
            url: "/delete-grade/" + id,
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
                    fetchgrade();
                }
            }
        });
    });
    
    
    
    });
    
    </script>
 