<!DOCTYPE html>
<html lang="vi">
<head>
<?php include('head.php'); ?>
<?php include('title.php'); ?>
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1>HÌNH ẢNH</h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <li class="active">HÌNH ẢNH</li>
  </ol>
</section>
<section id="gallery-page" class="container">
  <ul class="gallery-img-container clearfix">
<?php 
	$sql_1 = mysqli_query($con,'select * from table_albumkh order by id DESC');
	if(mysqli_num_rows($sql_1)>0){
		$res_1=mysqli_fetch_object($sql_1); $dem=0;
		do{ $dem++;
?>    
	<li class="col-xs-6 col-md-3 spa"><a href="media/upload/albumkh/<?php echo $res_1->hinh; ?>" title="Hình ảnh <?php echo $tieude_lienhe; ?>"><img src="media/upload/albumkh/<?php echo $res_1->hinh; ?>" alt="hình ảnh <?php echo $tieude_lienhe; ?>">
      <div class="caption" style="display: block; left: 0px; top: 100%; transition: all 300ms ease 0s;"><span></span></div>
      </a></li>
<?php if($dem%4==0){ echo '<div style="clear:both;"></div>'; }
		}while($res_1=mysqli_fetch_object($sql_1));
	}
 ?>	  
  </ul>
</section>
<?php include('footer.php'); ?>
<script type="text/javascript" src="Assets/js/jquery.hovedir.min.js"></script>
<script>

        $(document).ready(function () {
                jQuery('.gallery-img-container').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    removalDelay: 600,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                    },
                    image: {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                    }
                });
                jQuery(' .gallery-img-container > li ').each(function () { jQuery(this).hoverdir(); });

        });
        
    </script>
</body>
</html>
