$(function(){
    console.log('ok-- CONFIG JS loaded')

    $('.app-footer').css('display', 'none');

    // Landing page label styling (background changing)
    $('.Label span').each(function(i, val){
        if(i % 2 != 0){
            $(val).css('background', 'black');
            $(val).css('-webkit-box-shadow', '12px 0 0 #070a0a, -12px 0 0 #070a0a');
            $(val).css('box-shadow', '12px 0 0 #070a0a, -12px 0 0 #070a0a');
        }
    });


});

// $(document).bind('DOMSubtreeModified',function(){

//     // on dom change...

//     // LOAD MORE
//     $('.next-icon').click(function(e){
//         e.preventDefault();
//         var nextbtn = $(this);

//         console.log('clicked next BUTTON')

//         $.each($('.contentContainer .dbContent'), function(i, val){
//             // if( $(val).hasClass('next-btn') == false ){
//                 $(nextbtn).closest('.contentContainer').animate({
//                     opacity: 0,
//                     // left: "+=1000",
//                     // height: "toggle"
//                 }, 400, function() {
//                     // Animation complete.
//                 });
//             // }
//         });

//         setTimeout( function(){
//             console.log('deleting')
//             $(nextbtn).closest('.contentContainer').remove();
//             console.log('deleted')
//         }, 400);

//     });



// });
