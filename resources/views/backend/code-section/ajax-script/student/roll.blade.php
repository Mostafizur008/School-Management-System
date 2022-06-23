<script type="text/javascript">
    $(document).on('click','#search',function(){
      var session_id = $('#session_id').val();
      var class_id = $('#class_id').val();
       $.ajax({
        url: "{{ route('student.registration.getstudents')}}",
        type: "GET",
        data: {'session_id':session_id,'class_id':class_id},
        success: function (data) {
          $('#roll-generate').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.st_name.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
            '<td>'+v.st_name.name+'</td>'+
            '<td>'+v.st_name.fathers_name+'</td>'+
            '<td>'+v.st_name.gender+'</td>'+
            '<td>'+v.st_name.dob+'</td>'+
            '<td>'+v.st_name.mobile+'</td>'+
            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
            '</tr>';
          });
          html = $('#roll-generate-tr').html(html);
        }
      });
    });
  
  </script>