<script type="text/javascript">
    $(document).on('click','#search',function(){
      var session_id = $('#session_id').val();
      var class_id = $('#class_id').val();
      var month = $('#month').val();
       $.ajax({
        url: "{{ route('student.monthly.fee.classwise.get')}}",
        type: "get",
        data: {'session_id':session_id,'class_id':class_id,'month':month},
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