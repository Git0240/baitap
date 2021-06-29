
<link rel="stylesheet" type="text/css" href="_Preload/normalize.css" />
<link rel="stylesheet" type="text/css" href="_Preload/effect2.css" />
<script src="_Preload/modernizr.custom.js"></script>

<div id="ip-container" class="ip-container">
  <header class="ip-header"> 
    <div class="ip-loader">
      <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
        <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
        <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
      </svg>
    </div>
  </header>
</div>

<script src="_Preload/classie.js"></script>
<script src="_Preload/pathLoader.js"></script>
<script src="_Preload/main.js"></script>

<div class="main-wrapper">
	<div id="main-header-top">
    <div class="main-header-top-container container">
      <div id="top-logo"> <a href="index.php"> <img src="media/upload/slide/logoLotus.png" alt="alt="<?php echo $title_s; ?>"" /> <img src="media/upload/slide/<?php echo $hinh_logo_1; ?>" alt="alt="<?php echo $title_s; ?>"" /> </a> </div>
      
	  <ul id="login-box" class="list-inline">
        <li><i class="fa fa-phone-square"></i><span class="header_phone">0382 397 969</span></li>
        <li onClick="chanlanguage('vi-VN');"> <img src="Assets/img/instagram.png" alt="VietNam" /> </li>
        <li onClick="chanlanguage('en-US');"> <img src="Assets/img/facebook.png" alt="English" /> </li>
      </ul>
	  
    </div>
  </div>
  <header id="main-header">
    <div class="header-content container">
      <div class="menu-container">
        <nav id="main-menu">
          <ul class="main-menu">
            <li> <a href="index.php" data-id="index">Trang Chủ</a> </li>
            <li> <a href="gioithieu.php" data-id="about">Giới Thiệu</a> </li>
            <li> <a href="sanpham.php" data-id="room">Phòng nghỉ</a> </li>
            <li> <a href="dichvu.php" data-id="service">Dịch Vụ</a> </li>
<?php 
		$sql_1 = mysqli_query($con,"select * from table_nhomtin where parentid=0 order by uutien");
		if(mysqli_num_rows($sql_1)>0){
			$res_1 = mysqli_fetch_object($sql_1);
			do{
?>			
            <!--<li> <a href="<?php echo $res_1->url; ?>/" data-id="<?php echo $res_1->url; ?>"><?php echo $res_1->loaitin; ?></a> </li>-->
<?php 
		}while($res_1 = mysqli_fetch_object($sql_1));
	}
?>			
            <li> <a href="hinhanh.php" data-id="gallery">Hình Ảnh</a> </li>
			
            <li> <a href="vitri.php" data-id="position">Vị Trí</a> </li>
			
            <li> <a href="lienhe.php" data-id="contact">Liên Hệ</a> </li>
          </ul>
        </nav>
        <div id="main-menu-handle"> <span></span> </div>
      </div>
    </div>
    <div class="book_your_stay drawer-toggle"> <span>Đặt phòng với chúng tôi</span> </div>
  </header>