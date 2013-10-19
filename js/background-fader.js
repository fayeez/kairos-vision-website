function fader(fadeVal)
{
var $j=jQuery.noConflict()
$j(".fader .img-bg").css('opacity', fadeVal);
$j(".fader #1").show("fade", 2000);
$j(".fader #1").delay(4000).hide("fade", 2000);

var src=$j(".fader .img-bg").size();
var count = 2;

setInterval(function(){
    
    $j(".fader #"+count).show("fade", 2000);
    $j(".fader #"+count).delay(4000).hide("fade", 2000);
    
    if(count==src){
        count=1;
    }
    else{
        count=count+1;
    }
    
    }, 7600)
}
