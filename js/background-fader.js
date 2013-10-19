function fader(fadeVal)
{
    width = checkScreenSize();
    if(width > 580) {
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
    
    else {   
        images = new Array();
        images = ["images/CreatingSwirls.jpg", "images/NasMatic-Final.jpg", "images/WorldWonders.jpg", "images/water_monk.jpg", "images/Kairos_Street.jpg", "images/UltimateGohanFinal.jpg"];
        num = Math.floor(Math.random() * images.length) + 0;
        width = checkScreenSize();
        //$j(".fader").removeClass();
        document.getElementById("static-bg").style.backgroundColor="red";
        document.getElementById("static-bg").style.background="url('images/water_monk.jpg')";
        document.getElementById("static-bg").style.backgroundRepeat="repeat-y";
          //$j('body').removeClass('fader');
          //$j('.img-bg').remove();
          //$j('body').addClass('static-bg');
          //$j('#dampen-bg').removeAttr('id');
          //$j('.static-bg').css({'background-image' : 'images/water_monk.jpg'}); 
          //$j('#flow-wrapper').removeAttr('id');
        
    }
}
