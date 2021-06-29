<!DOCTYPE html>
<html lang="vi">
<head>
<?php $chitiet_baiviet='chitiet_baiviet'; include('head.php');  ?>
<title>
<?php include('ketnoi.php');
		if(isset($_GET['id']) && $_GET['id']!=''){
			$id = $_GET['id'];
			$id = str_replace('"','',$id);
			$id = str_replace("'",'',$id);
			
			$sql = mysqli_query($con,"select * from table_news where url= '".$id."' ");
			$row = mysqli_num_rows($sql);
			if($row>0){
				$res = mysqli_fetch_object($sql);
				echo $ten = $res->ten; $chitiet = $res->chitiet;$id =$res->id;$id_cat1 =$res->id_cat1; $id_cat =$res->id_cat; $anh=$res->photo;$ngay=$res->ngay; 
				$tomtat=$res->tomtat; $tukhoa=$res->tukhoa; $id_cat2 =$res->id_cat2; $url =$res->url;
			}else{
				$sql = mysqli_query($con,"select * from table_news order by id desc");
				if(mysqli_num_rows($sql)>0){$res= mysqli_fetch_object($sql); echo $ten = $res->ten; $id =$res->id; $chitiet = $res->chitiet;$id_cat1 =$res->id_cat1;
				$id_cat =$res->id_cat; $anh=$res->photo; $ngay=$res->ngay; $tomtat=$res->tomtat; $tukhoa=$res->tukhoa; $id_cat2 =$res->id_cat2; $url =$res->url;  }
			}
		}else{
			$sql = mysqli_query($con,"select * from table_news order by id desc");
			if(mysqli_num_rows($sql)>0){$res= mysqli_fetch_object($sql); echo $ten = $res->ten; $id =$res->id; $chitiet = $res->chitiet; $id_cat1 =$res->id_cat1;
				$id_cat =$res->id_cat; $anh=$res->photo;$ngay=$res->ngay; $tomtat=$res->tomtat; $tukhoa=$res->tukhoa; $id_cat2 =$res->id_cat2; $url =$res->url; }
		}	
?>
</title>
<meta property="og:image" content="media/upload/news/<?php echo $anh;?>"/>
<meta property="og:title" content="<?php echo $ten; ?>">
<meta name="description" content="<?php echo $tomtat; ?>">
<meta name="keywords" content="<?php echo $tukhoa; ?>"/>
<meta property="og:description" content="<?php echo $tomtat; ?>" />
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1><?php echo $ten; ?> </h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <?php 	$sql = mysql_query('select * from table_nhomtin where id='.$id_cat);	if(mysql_num_rows($sql)>0){	$res=mysql_fetch_object($sql);	?>
    <li class="active"><a class="bread-crumb-item " href="<?php echo $res->url; ?>/" title="<?php echo $res->loaitin; ?>"><?php echo $res->loaitin; ?></a> </li>
    <?php 	 }	?>
  </ol>
</section>
<div id="post-pages" class="container padding-bottom">
  <!-- Left Section -->
  <section id="single-post" class="col-md-9">
    <div class="post-boxes"> <a href="#"> <img src="media/upload/news/<?php echo $anh;?>" id="Content_p_img" class="post-img" alt="<?php echo $ten; ?>"></a>
      <div class="post-details">
        <div id="Content_p_date" class="post-date"><?php echo $ngay; ?></div>
      </div>
      <h4 class="post-title"> <a id="Content_p_title"><?php echo $ten; ?></a> </h4>
      <div id="Content_p_detail" class="post-short-desc">
		<?php echo $chitiet; ?>
      </div>
    </div>
    <div class="comments-container">
      <div class="comment-list">
        <?php include('share.php'); ?>
        <div class="fb-comments" data-href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" data-numposts="5" data-colorscheme="light" data-width="800"> </div>
      </div>
    </div>
  </section>
  <?php include('content_right.php'); ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>
