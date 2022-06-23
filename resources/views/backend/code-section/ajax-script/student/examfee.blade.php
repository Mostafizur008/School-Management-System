<script type="text/javascript">
    $(document).on('click','#search',function(){
      var session_id = $('#session_id').val();
      var class_id = $('#class_id').val();
      var exam_id = $('#exam_id').val();
       $.ajax({
        url: "{{ route('student.exam.fee.classwise.get')}}",
        type: "get",
        data: {'session_id':session_id,'class_id':class_id,'exam_id':exam_id},
        beforeSend: function() {       
        },
        success: function (data) {
          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var html = template(data);
          $('#DocumentResults').html(html);
          $('[data-toggle="tooltip"]').tooltip();
        }
      });
    });
  
  </script>