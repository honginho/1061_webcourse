/* main */

$(document).ready(function(){
    $('#but').click(function(){
        $('#test').show(400).css("display","flex");
    });
    $('#content').click(function(){
        $('#test').hide(350);
    });
});
