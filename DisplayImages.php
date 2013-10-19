<?php error_reporting(E_ALL ^ E_NOTICE);
$imgpath=get_bloginfo("template_directory")."/images/";
$imgdir=scandir("/Users/fayeez/sites/test/wp-content/themes/sleek/images");
shuffle($imgdir);
$imgformats=array('.jpg', '.jpeg', '.png', '.tiff', '.tif', '.bmp', '.gif');
$id=1;
$currentFile = $_SERVER["PHP_SELF"];

if (($key = array_search('semi-transparent.png', $imgdir)) !== false)
{
    unset($imgdir[$key]);
}
foreach($imgdir as $img)
{
    foreach($imgformats as $imgformat)
    {
        if (strpos($img, $imgformat))
        {
            $alt = basename($img, $imgformat);
            if (strpos($currentFile, 'index'))
            {
                $img_tag="<img style='background: repeat;' class='img-bg' id='$id' src='$imgpath$img' alt='$alt'/>";
                print $img_tag;
            }
            $id+=1;
        }
    }  
} ?>