$(document).ready(function() {
    $('.cart-suc').hide();
    $('.SignUpDiv').hide();
    $('#signInShow').click(function(){
        $('.SignInDiv').show('slow');
        $('.SignUpDiv').hide('slow');
    });
    $('#signUpShow').click(function(){
        $('.SignInDiv').hide('slow');
        $('.SignUpDiv').show('slow');
    });

    $('.addToCart').click(function(){
        var product_id = $(this).data('id');
        $.ajax({
            type:'POST',
            data:'product_id='+product_id,
            url:'/lancius-task/controllers/saveProduct.php',
            success:function(res){
                $('.cart-suc').show('slow');
                setTimeout(function(){$('.cart-suc').hide('slow');},3000);
                $('#cartCount').html( parseInt($('#cartCount').html())+1)
            }
        });
    });
}); 