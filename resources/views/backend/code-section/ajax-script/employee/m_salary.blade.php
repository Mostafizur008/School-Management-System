<script type="text/javascript">
    $(document).on('click','#search',function(){
      var date = $('#date').val();
       $.ajax({
        url: "{{ route('teacher.monthly.slary.get')}}",
        type: "get",
        data: {'date':date},
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