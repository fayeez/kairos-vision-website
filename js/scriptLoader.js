var jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js';
var jqueryUI = 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js';
var backgroundFader = templateDir + '/js/kairosJavascripts.js';
//var dynamicFlow = templateDir + '/js/dynamic-flow.js';
//var checkSS = templateDir + '/js/check-screen-size.js';

var scriptUrls = [jquery, jqueryUI, backgroundFader, dynamicFlow, checkSS];

scriptUrls.forEach(function(url,index,scriptUrls){
  var script = document.createElement('script');
  document.getElementsByTagName('head')[0].appendChild(script);
  script.src = url;
});