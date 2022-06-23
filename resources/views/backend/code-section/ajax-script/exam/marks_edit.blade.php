<script type="text/javascript">
    $(document).on('click','#search',function(){
      var session_id = $('#session_id').val();
      var class_id = $('#class_id').val();
      var assign_subject_id = $('#assign_subject_id').val();
      var exam_id = $('#exam_id').val();
       $.ajax({
        url: "{{ route('edit.marks.getstudents')}}",
        type: "GET",
        data: {'session_id':session_id,'class_id':class_id,'assign_subject_id':assign_subject_id,'exam_id':exam_id},
        success: function (data) {
          $('#marks-entry').removeClass('d-none');
          var html = '';
          $.each( data, function(key, v){
            html +=
            '<tr>'+
            '<td>'+v.st_name.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.st_name.id_no+'"></td>'+
            '<td>'+v.st_name.name+'</td>'+
            '<td>'+v.st_name.mobile+'</td>'+
            '<td>'+v.st_name.dob+'</td>'+
            '<td><input type="text" class="form-control form-control-sm" name="marks[]" value=" '+ v.marks +' "></td>'+
            '</tr>';
          });
          html = $('#marks-entry-tr').html(html);
        }
      });
    });
  
  </script>


<script type="text/javascript">
    $(function(){
      $(document).on('change','#class_id',function(){
        var class_id = $('#class_id').val();
        $.ajax({
          url:"{{ route('marks.getsubject') }}",
          type:"GET",
          data:{class_id:class_id,},
          success:function(data){
            var html = '<option value="">Select Subject</option>';
            $.each( data, function(key, v) {
              html += '<option value="'+v.id+'">'+v.subject.name+'</option>';
            });
            $('#assign_subject_id').html(html);
          }
        });
      });
    });
  </script>