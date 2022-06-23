<script type="text/javascript">

$(document).ready(function(){
    
    $(document).on('change','#leave',function(){
    
    var leave = $(this).val();
    
    if (leave == '0') {
    
     $('#add_another').show();
    
     }else{
    
     $('#add_another').hide();
    
     }
    
    });
    
    });

</script>

    