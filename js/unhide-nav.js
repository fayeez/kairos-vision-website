var $k=jQuery.noConflict();

$k(function() {

    var pull 		= $k('#pull');
    menu 		= $k('nav ul');
    menuHeight	= menu.height();
 

    $k(pull).on('click', function(e)
    {
        e.preventDefault();
        menu.slideToggle();
    });

    $k(window).resize(function(){
     
        var w = $k(window).width();
        if(w > 320 && menu.is(':hidden'))
        {
            menu.removeAttr('style');
        }
    });
});