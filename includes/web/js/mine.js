
/*
 * This is my tweaks and edits in jquery
 */

$(function(){
    
    //show/hide login placehoders when focus/blur
    $('#username').focus(function(){
        $(this).attr('placeholder', '');
    });
    
    $('#username').blur(function(){
        $(this).attr('placeholder', 'اسم مستخدم');
    });    

    $('#password').focus(function(){
        $(this).attr('placeholder', '');
    });
    
    $('#password').blur(function(){
        $(this).attr('placeholder', 'كلمة المرور');
    });        
    //--
})