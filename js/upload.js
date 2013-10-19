var $l=jQuery.noConflict();
$l(document).ready(function() {
 
$l('#upload_image_button').click(function() {
 formfield = $l('#upload_image').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = $l('img',html).attr('src');
 $l('#upload_image').val(imgurl);
 tb_remove();
}
 
});