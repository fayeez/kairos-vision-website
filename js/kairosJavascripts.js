//************************************************************************************//
//************************************************************************************//
//Check device
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

//************************************************************************************//
//************************************************************************************//
//Check screen size
function checkScreenSize() {
		var $j=jQuery.noConflict()
		var w = $j(window).width();
		return w;
	}

//************************************************************************************//
//************************************************************************************//
//Background fader
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
    else {
        //width = checkScreenSize();
    //if(width > 580) {
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

//************************************************************************************//
//************************************************************************************//
//************************************************************************************//
//DYNAMIC FLOW Function
var $l=jQuery.noConflict();
//Dynamically change flow text depending on what page is currently being viewed

$l(function() {
    var pathname = window.location.pathname;
    if (pathname.search("about") == 1) {
        //About page
        var currentPageName = 'about';
        var nextPageName = 'personal-work';
        $l('#flow-size .call-to-action').text(''); //Clear whatever is there already
        $l('#flow-size .call-to-action').wrap(function() {
            var url = document.URL;
            var a = document.createElement('a');
            a.setAttribute('href', url.replace(currentPageName, nextPageName));
            a.appendChild(document.createTextNode('Work'));
            a.className = 'call-to-action';
            return a;
        });
    }
    else if (pathname.search("portfolio") == 1) {
        //Portfolio page/pages
        var currentPageName = 'portfolio-3';
        var nextPageName = 'contact-us';
        $l('#flow-size .call-to-action').text(''); //Clear whatever is there already
        $l('#flow-size .call-to-action').wrap(function() {
            var url = document.URL;
            var a = document.createElement('a');
            a.setAttribute('href', url.replace(currentPageName, nextPageName));
            a.appendChild(document.createTextNode('Get In Touch'));
            a.className = 'call-to-action';
            return a;
        });
    }
    else if (pathname.search("blog") == 1) {
        //Blog page
        var currentPageName = 'blog';
        var nextPageName = 'contact-me';
        $l('#flow-size .call-to-action').text(''); //Clear whatever is there already
        $l('#flow-size .call-to-action').wrap(function() {
            var url = document.URL;
            var a = document.createElement('a');
            a.setAttribute('href', url.replace(currentPageName, nextPageName));
            a.appendChild(document.createTextNode('Get In Touch'));
            a.className = 'call-to-action';
            return a;
        });
    }
    else if (pathname.search("contact-me") == 1) {
        //Contact us page
        var currentPageName = 'contact-me'
        var nextPageName = 'blog'
        $l('#flow-size .call-to-action').text(''); //Clear whatever is there already
        $l('#flow-size .call-to-action').wrap(function() {
            var url = document.URL;
            var a = document.createElement('a');
            a.setAttribute('href', url.replace(currentPageName, nextPageName));
            a.appendChild(document.createTextNode(nextPageName));
            a.className = 'call-to-action';
            return a;
        });
    }
    else {
        //Home page
        var nextPageName = 'blog';
        $l('#flow-size .call-to-action').text(''); //Clear whatever is there already
        $l('#flow-size .call-to-action').wrap(function() {
            var url = document.URL;
            var a = document.createElement('a');
            a.setAttribute('href', url + '/blog/');
            a.appendChild(document.createTextNode(nextPageName));
            a.className = 'call-to-action';
            return a;
        });
        
    };
});
