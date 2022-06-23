$(document).ready(function(){
    var counter = 0;
    $(document).on("click",'.addeventmore',function(){
        var whole_extra_item_add = $('#whole_extra_item_add').html();
    $(this).closest(".mrs").append(whole_extra_item_add);
    counter ++;
    });

    $(document).on("click",'.removeeventmore',function(event){
    $(this).closest(".delete_whole_extra_item_add").remove();
    counter -=1

});

});

$(document).ready(function(){
    var counter = 0;
    $(document).on("click",'.addeventmore1',function(){
        var whole_extra_item_add1 = $('#whole_extra_item_add1').html();
    $(this).closest(".mrs").append(whole_extra_item_add1);
    counter ++;
    });

    $(document).on("click",'.removeeventmore1',function(event){
    $(this).closest(".delete_whole_extra_item_add1").remove();
    counter -=1

});

});