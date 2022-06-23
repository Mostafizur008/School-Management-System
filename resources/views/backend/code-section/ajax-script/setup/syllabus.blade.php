

<script>

    $(document).ready(function (){
    
    function fetchsyllabus() {
    $.ajax({
    type: "GET",                             
    url: "/fetch-syllabus",                     
    dataType: "json",
    });
    }
    
    
    $(document).on('click', '.deletebtn', function () {
    var syl_id = $(this).val();
    $('#deletemodal').modal('show');
    $('#deleteing_id').val(syl_id);
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
            url: "/delete-syllabus/" + id,
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
                    fetchsyllabus();
                }
            }
        });
    });
    
    });
    
    </script>
 