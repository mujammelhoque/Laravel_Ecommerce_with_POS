$(document).ready(function(){
    $(".prod-plus").click(function (event){
        event.preventDefault()
       var id = $('#qty').val();
        var z=  parseInt(id);
        var d = $('#qty').val( z+1);

    });
    $(".prod-minus").click(function (event){
        event.preventDefault()
        var id = $('#qty').val();
        var z=  parseInt(id);
        if (z == 1){
            $('#qty').val(1);
        }else {
            $('#qty').val( z-1);
        }

    });
    $(".cart-plus").click(function (event){
        event.preventDefault()
       var id = $('#qty').val();
        var z=  parseInt(id);
        var d = $('#qty').val( z+1);

    });
    $(".cart-minus").click(function (event){
        event.preventDefault()
        var id = $('#qty').val();
        var z=  parseInt(id);
        if (z == 1){
            $('#qty').val(1);
        }else {
            $('#qty').val( z-1);
        }

    });
});