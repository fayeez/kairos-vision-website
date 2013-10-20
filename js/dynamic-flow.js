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