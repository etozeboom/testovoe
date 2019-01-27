
window.onload = function()
{

    $('.doors .door').click(function(){
        $(this).find(".modal").addClass('open');
        $(".overlay").addClass('open');

    });
    $('.overlay').click(function(){
        $(".modal").removeClass('open');
        $(".overlay").removeClass('open');
        
    });
}


