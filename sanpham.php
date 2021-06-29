<!DOCTYPE html>
<html lang="vi">
<head>
<?php include('head.php'); ?>
<?php include('title.php'); ?>
</head>
<body class="drawer drawer--left inner-page layout-switch">

<?php include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1>Phòng nghỉ</h1>
  <ol class="breadcrumb">
    <li> <a href="index.php">Trang Chủ</a> </li>
    <li class="active">Phòng nghỉ</li>
  </ol>
</section>
<section id="about-page" class="container">
  <h3> <span><b>Phòng nghỉ</b><br>
    Lotus Hotel</span> </h3>
  <div class="about-desc" id="Info_aboutDes">
   Với thiết kế thanh lịch và rộng rãi theo tiêu chuẩn 4 sao, Lotus Saigon được xây dựng với quy mô đầy đủ tiện nghi phục vụ nhu cầu giải trí và kinh doanh cần thiết của bạn. Nằm ở vị trí lý tưởng chỉ cách sân bay 15 phút lái xe, gần khu thương mại trung tâm và khu mua sắm của thành phố. Với vị trí thuận lợi, khách lưu trú sẽ có những cơ hội tuyệt vời nhất để trải nghiệm những nét đặc trưng và thú vị trong nhịp sống sinh họat của người dân Sài Gòn
  </div>
	<section id="rooms">
		      <ul class="property-container prp-ajax-loader clearfix" id="listRoom">

<?php include ('ketnoi.php');	
	$sql = mysqli_query($con,"select * from table_sanpham where publish = 1 order by id ");
	$row = mysqli_num_rows($sql);
		if($row>0){	
		$res = mysqli_fetch_object($sql);
			do{
 ?>        
		<li class="property-boxes col-xs-6 col-md-4" data-animation="fadeInLeft" data-animation-delay=".0">
          <div class="prp-img"> <img src="media/upload/sanpham/<?php echo $res->anh; ?>" alt="<?php echo $res->tensp;?>">
            <div class="price"> <span><?php if($res->gia >0){ ?><?php echo number_format($res->gia); ?>&nbsp;<?php echo $menhgia_sanpham; ?><?php } ?></span> </div>
          </div>
          <div class="prp-detail">
            <div class="title"><?php echo $res->tensp;?></div>
            <div class="title title_des">Diện tích: <?php echo $res->masp;?></div>
            <div class="description"><?php echo $res->tomtat;?></div>
			<a href="javascript:booking(<?php echo $res->id;?>)" class="more-detail booking btn colored">Đặt Phòng        </a>
			<a href="room/<?php echo $res->url ;?>.html" class="more-detail btn colored">Chi Tiết </a> </div>
        </li>
<?php		
			}while($res = mysqli_fetch_object($sql));
		}
?>		
      </ul>
	</section>
</section>
<?php include('footer.php'); ?>
</body>
</html>
