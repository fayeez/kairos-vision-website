function setResponsive()
{
    if ($(window).width() < 1000){
        $('.flow-style').css('font-size', '50%');
    }
    else{
        $('.flow-style').css('font-size', '100%');
    }
}

function dynamicFontSize(incrmt)
{
    var para=document.getElementsByTagName('h1');
    for (element=0; element<para.length;element++)
    {
        if (para[element].style.fontSize){
            var size=parseInt(para[element].style.fontSize.replace("px", ""));
        }
        else{
            var size=12;
        }
        para[element].style.fontSize=size+incrmt+'px';
    }
}