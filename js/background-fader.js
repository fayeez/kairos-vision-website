var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

function fader(fadeVal)
{
    
    if( isMobile.any() ) {
        var url= window.location.href;
        var spliturl = url.split("/");
        // Check to see if we are on the home page and only perform the background image styling
        // on those since we won't see it on the other pages
        if (spliturl.length < 5) {
            images = new Array();
            images = ["images/CreatingSwirls.jpg", "images/NasMatic-Final.jpg", "images/WorldWonders.jpg", "images/water_monk.jpg", "images/Kairos_Street.jpg", "images/UltimateGohanFinal.jpg"];
            num = Math.floor(Math.random() * images.length) + 0;
            imagepath = "http://www.kairos-vision.com/wp-content/themes/kairos-vision-website/";
            width = checkScreenSize();
            document.getElementById("static-bg").style.backgroundColor="black";
            document.getElementById("static-bg").style.background="url('" + imagepath + images[num] + "')";
            document.getElementById("static-bg").style.backgroundSize="100%";
            document.getElementById("static-bg").style.backgroundRepeat="repeat";
            document.getElementById("static-bg").style.backgroundAttachment="fixed";
            document.getElementById("static-bg").style.backgroundPosition="center";
            //document.getElementById("static-bg").style.marginTop="-250px";
            //document.getElementById("static-bg").style.marginleft="-250px";
        }
    }
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
    
    
}
