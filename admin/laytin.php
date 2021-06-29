<?php
include "simplehtmldom/simple_html_dom.php";
function LuuTinVaoDB($tin, $url, $source){
    $tieude = trim(mysql_real_escape_string(strip_tags($tin['tieude'])));
    $tomtat = trim(mysql_real_escape_string(strip_tags($tin['tomtat'])));
    $content = trim(mysql_real_escape_string($tin['content']));
	$urlhinh = trim(mysql_real_escape_string($tin['hinh']));

$sql = "SELECT idTin from table_tinmoi where urlGoc='{$url}'";
    $rs = mysql_query($sql) or die (mysql_error());
    if (mysql_num_rows($rs) >0 ) return false;
	$ngaydang=time();
    $sql="INSERT INTO table_tinmoi (TieuDe,TomTat, Content, urlGoc, Source,urlHinh, Ngay)
        VALUES ('$tieude','$tomtat', '$content', '$url', '$source','$urlhinh', '$ngaydang')";
    mysql_query($sql) or die (mysql_error());
    return true;
}

function Dantri_TrangChu($url) {
    $linkarray=array();
    $html = file_get_html($url);
    foreach ($html->find(".AINews_HotNewsContent a") as $link){            
        if ($link->href==NULL)  continue;
        if ($link->plaintext==NULL) continue;
        $text=str_replace("&nbsp;"," ",$link->plaintext);
        $text=trim($text);        
        if ($text=="") continue;
        if (substr($link->href,0,1)=="/") $link->href=$url. $link->href;
        if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href;
    }
    $html->clear();
    unset($html);
    return $linkarray;
}

function Dantri_Lay1Tin($urlwebsite,$url) {
    $html = file_get_html($url);
    $tin = array();
    $td = $html->find('.marginT10',0);
    $tin['tieude']=$td->innertext;
    $td->outertext='';
    $tt = $html->find('#dnn_ctr1445_NewsDetail_lblSummary',0);
    $tin['tomtat']=$tt->innertext;
    $tt->outertext = '';
    $content = $html->find('.marginT10 tr td div',0);                	
    $tin['content'] = $content->innertext;
    $tin['hinh']=get_first_image($tin['content'] );
	$html->clear();
    unset($html);
    return $tin;
}
function get_first_image($content) {
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
	$first_img = "";
}else{
	$first_img=uploadUrl($first_img,_upload_tintuc,"jpg,bmp,jpeg,png,gif","20000000");
	}
return $first_img;
}

function uploadUrl($url,$savePath,$imageRestrict,$imageSizeRestrcit)
{
$type_upload = explode(',',$imageRestrict);
$ext = substr(basename($url),strrpos(basename($url),".")+1);
$name = basename($url);
$result = "";
if(!in_array($ext,$type_upload)){
	return '';
}
else{
for($i=0;$i<5;$i++){
	$rd.=rand(0,9);
}
$fn = $savePath.$rd.$name;
$fp = fopen($fn,"w");
$noidung = file_get_contents($url);
fwrite($fp,$noidung,strlen($noidung));
fclose($fp);
$result = $rd.$name;
}
return $result;
}
?> 