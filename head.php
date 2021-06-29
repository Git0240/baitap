<base href="http://localhost:81/baitap%20(1)/baitap%20(1)/baitap/baitap/">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no" />
<link rel="stylesheet" id="main_style_file" type="text/css" href="Assets/css/styles.css">
<link href="Assets/Plugins/HeroSilder/drawer.min.css" rel="stylesheet" />
<link href="Assets/css/animate.min.css" rel="stylesheet" />
<link href="Assets/css/plugin.min.css" rel="stylesheet" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

<script>
        var Swidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var Sheight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    </script>
<script type="text/javascript" src="Assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="Assets/js/custom.js"></script>

<?php include('ketnoi.php');
	
	function get_sp_cap_mot($id_menu){
		$sql_sanpham = mysqli_query($con,"select * from table_sanpham where publish = 1 and id_cap_mot=".$id_menu);
					 return mysqlii_num_rows($sql_sanpham);
	}
	function get_sp_cap_hai($id_menu){
		$sql_sanpham = mysqli_query($con,"select * from table_sanpham where publish = 1 and id_cap_hai=".$id_menu);
					 return mysqli_num_rows($sql_sanpham);
	}
	function get_sp_cap_ba($id_menu){
		$sql_sanpham = mysqli_query($con,"select * from table_sanpham where publish = 1 and id_cap_ba=".$id_menu);
					 return mysqli_num_rows($sql_sanpham);
	}
	function get_sp_thuong_hieu($id_menu){
		$sql_sanpham = mysqli_query($con,"select * from table_sanpham where publish = 1 and id_hang=".$id_menu);
					 return mysqli_num_rows($sql_sanpham);
	}
	
	function gioihankitu($str,$limit)
	{
    if(strlen($str)> $limit)
    {
        $re =  substr($str,0,$limit);
        $re =  substr($re, 0, strrpos($re, " "));
        $re .="...";
        return $re;
    }
    else
    {
        return $str;
    }
	}
	
	$url_seo='nuoc-hoa';
	$menhgia_sanpham='đ';
	
	$description_s='';
	$keyword_s='';
	$title_s='';
	$ten_loaitin='';
	
	$sql=mysqli_query($con,'select * from table_gamenet');
		if(mysqli_num_rows($sql)>0){
			$res=mysqli_fetch_object($sql);
			
			$ten_loaitin= $res->tentrang;
			$keyword_s= $res->keyword;
			$title_s= $res->title;
			$description_s= $res->description;
	}		

 ?>
<?php 
	$tieude_lienhe='';
	$tomtat_lienhe='';
	$noidung_lienhe='';
	$timkiem_lienhe='';
	$dienthoai_lienhe='';
	$email_lienhe='';
	$diachi_lienhe='';
	$sanpham_lienhe='';
	
	$face_lienhe='';
	$google_lienhe='';
	$you_lienhe='';
	$twitter_lienhe='';
	$hotline_lienhe='';
	$instagram_lienhe='';
	$gioithieu_lienhe='';
		
	$ten1_lienhe='';
	$ten2_lienhe='';
	
	$danhgia_lienhe='';
	$sozalo_lienhe='';
	$thanhvien_lienhe='';
	
	$sqlkhach = mysqli_query($con,'select * from table_baivietlienhe');
	if(mysqli_num_rows($sqlkhach)>0){
		$res = mysqli_fetch_object($sqlkhach);
		
		$tieude_lienhe=$res->tieude;
		$tomtat_lienhe=$res->tomtat;
		$noidung_lienhe=$res->noidung;
		$timkiem_lienhe=$res->timkiem;
		
		$dienthoai_lienhe=$res->dienthoai;
		$email_lienhe=$res->email;
		$diachi_lienhe=$res->diachi;
		$sanpham_lienhe=$res->sanpham;
		
		$face_lienhe=$res->face;
		$google_lienhe=$res->google;
		$you_lienhe=$res->you;
		$twitter_lienhe=$res->twitter;		
		$hotline_lienhe=$res->hotline;
		$instagram_lienhe=$res->instagram;
		$gioithieu_lienhe=$res->gioithieu;
		
		$ten1_lienhe=$res->ten1;
		$ten2_lienhe=$res->ten2;
		
		$danhgia_lienhe=$res->danhgia;
		$sozalo_lienhe=$res->sozalo;
		$thanhvien_lienhe=$res->thanhvien;
		
	}
?>
<?php $hinh_logo_1='';$hinh_logo_2='';$hinh_logo_3='';$hinh_logo_4='';
$sql = mysqli_query($con,'select * from table_bannertren order by id');
if(mysqli_num_rows($sql)>0){
$res=mysqli_fetch_object($sql); $dem=0;
do{ $dem++;
	switch ($dem) {
		case 1: $hinh_logo_1 = $res->photo; break;
		case 2: $hinh_logo_2 = $res->photo; break;
		case 3: $hinh_logo_3 = $res->photo; break;
		case 4: $hinh_logo_4 = $res->photo; break;
	}
}while($res=mysqli_fetch_object($sql));
}
?>
<!-- This site is optimized with the Yoast SEO plugin v2.3.2 - https://yoast.com/wordpress/plugins/seo/ -->
<?php if(isset($chitiet_baiviet) && $chitiet_baiviet=='chitiet_baiviet'){}else{?>
<meta name="description" content="<?php echo $description_s; ?>"/>
<meta name="keywords" content="<?php echo $keyword_s; ?>"/>
<meta property="og:title" content="<?php echo $title_s; ?>" />
<meta property="og:description" content="<?php echo $description_s; ?>" />
<meta property="og:image" content="../media/upload/slide/logoLotus.png">
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="<?php echo $title_s; ?>" />
<meta name="twitter:description" content="<?php echo $description_s; ?>" />
<meta property="og:image:alt" content="<?php echo $title_s; ?>" />
<?php } ?>
<meta name="robots" content="index, follow">
<link rel="canonical" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
<meta property="og:site_name" content="<?php echo $title_s; ?>" />
<meta property="article:publisher" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
<!-- / Yoast SEO plugin. -->
<link href="media/upload/slide/<?php echo $hinh_logo_2; ?>" rel="icon" />

<style>
	#internal-title{background:url('media/upload/slide/<?php echo $hinh_logo_4; ?>');}
</style>