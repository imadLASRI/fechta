$(function(){
    $('.app-footer').css('display', 'none');

    console.log('ok--')

    // Landing page label styling (background changing)
    $('.Label span').each(function(i, val){
        if(i % 2 != 0){
            $(val).css('background', 'black');
            $(val).css('-webkit-box-shadow', '12px 0 0 #070a0a, -12px 0 0 #070a0a');
            $(val).css('box-shadow', '12px 0 0 #070a0a, -12px 0 0 #070a0a');
        }
    });

});
