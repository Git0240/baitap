<!DOCTYPE html>
<html lang="vi">
<head>
<?php include('head.php'); ?>
<?php include('title.php'); ?>
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1>Giới Thiệu</h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <li class="active">Giới Thiệu</li>
  </ol>
</section>
<section id="about-page" class="container">
  <h3> <span><b>Giới Thiệu</b><br>
    Lotus Hotel</span> </h3>
  <div class="about-desc" id="Info_aboutDes">
   Với thiết kế thanh lịch và rộng rãi theo tiêu chuẩn 4 sao, Lotus Saigon được xây dựng với quy mô đầy đủ tiện nghi phục vụ nhu cầu giải trí và kinh doanh cần thiết của bạn. Nằm ở vị trí lý tưởng chỉ cách sân bay 15 phút lái xe, gần khu thương mại trung tâm và khu mua sắm của thành phố. Với vị trí thuận lợi, khách lưu trú sẽ có những cơ hội tuyệt vời nhất để trải nghiệm những nét đặc trưng và thú vị trong nhịp sống sinh họat của người dân Sài Gòn
  </div>
  <div class="services-container">
    <h3> <span>Dịch vụ</span> </h3>
    <div id="services-box" class="owl-carousel owl-theme">
 <?php 
		$sql_1 = mysqli_query($con,'select * from table_gioithieu order by id');
		if(mysqli_num_rows($sql_1)>0){
			$res_1=mysqli_fetch_object($sql_1); $dem=0;
			do{	
?>	
	  <div class="item"><img src="media/upload/news/<?php echo $res_1->hinhanh; ?>" alt="<?php echo $res_1->tieude; ?>" ><div class="title"><?php echo $res_1->tieude; ?></div>
                  <div class="short-desc"><?php echo $res_1->noidung; ?></div></div >
<?php	
		$dem = $dem+2;	}while($res_1=mysqli_fetch_object($sql_1));
		}
?>				  
    </div>
  </div>
</section>
<?php include('footer.php'); ?>
<script>

        $(document).ready(function () {
            jQuery('#services-box').owlCarousel({
                items: 3,
                itemsTablet: [980, 2], itemsMobile: [480, 1], navigation: !0, pagination: !1
            });

        });
        
    </script>

</body>
</html>
