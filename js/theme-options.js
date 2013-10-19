$l = jQuery.noConflict;
jQuery(document).ready(function($l) {
    $l('#colorpicker').hide();
    $l('#colorpicker').farbtastic('#color');

    $l('#color').click(function() {
        $l('#colorpicker').fadeIn();
    });

    $l(document).mousedown(function() {
        $l('#colorpicker').each(function() {
            var display = $l(this).css('display');
            if ( display == 'block' )
                $l(this).fadeOut();
        });
    });
    
});


//
//$l('input[name="group1"]').change(
//    function(){
//        $l('div[class^="layergruppe"]').hide();
//        $l('div.layer' + this.id).show();
//    });
