
<div class="carousel kbrns_zoomInOut ps_control_gray ps_easeOutQuart ps_indicators_gray slide swipe_x thumb_scroll_x" data-duration="2000" data-interval="5000" data-pause="hover" data-ride="carousel" id="kenburns_061">
    <ol class="carousel-indicators">
<?php 
		   		$sqlslide=mysqli_query($con,'select * from table_slide order by id desc');
				$resurt = mysqli_fetch_object($sqlslide);
				$row = mysqli_num_rows($sqlslide);
				if($row>0):{  $dem=0;
				do{ 
?>
	  <li data-slide-to="<?php echo $dem; ?>" data-target="#kenburns_061" <?php if($dem==0){echo 'class="active"';} ?>>
<?php
				$dem++; }while($resurt = mysqli_fetch_object($sqlslide));
			}endif;
?>
    </ol>
    <div class="carousel-inner" role="listbox" id="mainBanner">
<?php 
		   		$sqlslide=mysqli_query($con,'select * from table_slide order by id desc');
				$resurt = mysqli_fetch_object($sqlslide);
				$row = mysqli_num_rows($sqlslide);
				if($row>0):{  $dem=0;
				do{ $dem++;
?>       
	  <div class="item <?php if($dem==1){echo 'active';} ?>"><img alt="over view" src="media/upload/slide/<?php echo $resurt->photo;?>" alt="<?php echo $resurt->ten;?>">
        <div class="kenburns_061_slide kenburns_061_slide_center" data-="" animation="animated fadeInDown"></div>
      </div>
<?php
				 }while($resurt = mysqli_fetch_object($sqlslide));
			}endif;
?>	  
    </div>
    <a href="#kenburns_061" class="carousel-control left" data-slide="prev" role="button"><span class="fa fa-long-arrow-left"></span><span class="sr-only">Previous</span></a> <a href="#kenburns_061" class="carousel-control right" data-slide="next" role="button"><span class="fa fa-long-arrow-right"></span><span class="sr-only">Next</span></a> </div>
  <section id="hello" class="luxury testimonials" data-background="parallax">
    <div class="testimonials-container">
      <h3> <span id="Info_slogan">Trải nghiệm mới mẻ</span> </h3>
    </div>
  </section>
  <section id="welcome">
    <h3> <span id="Content_maintitle">Lotus Hotel</span> </h3>
    <div class="container">
      <div class="service-boxes welcome-gallery col-md-7 col-xs-12" data-animation="fadeInUp">
        <ul class="bxslider-welcome">
 <?php 
		$sql = mysqli_query($con,'select * from table_hinhdaidien order by id');
		if(mysqli_num_rows($sql)>0){
			$res=mysqli_fetch_object($sql);
			do{				
?>          
		  <li>
            <div class="items" ><img src="media/upload/hangsx/<?php echo $res->img; ?>" alt="<?php echo $res->ten; ?>"></div>
          </li >
<?php	
			}while($res=mysqli_fetch_object($sql));
		}
?>
        </ul>
      </div>
      <div class="service-boxes welcome-text col-md-6 col-xs-12" data-animation="fadeInUp" id="Info_about"> Với thiết kế thanh lịch và rộng rãi theo tiêu chuẩn 4 sao, Lotus Saigon được xây dựng với quy mô đầy đủ tiện nghi phục vụ nhu cầu giải trí và kinh doanh cần thiết của bạn. Nằm ở vị trí lý tưởng chỉ cách sân bay 15 phút lái xe, gần khu thương mại trung tâm và khu mua sắm của thành phố. Với vị trí thuận lợi, khách lưu trú sẽ có những cơ hội tuyệt vời nhất để trải nghiệm những nét đặc trưng và thú vị trong nhịp sống sinh họat của người dân Sài Gòn</div>
    </div>
  </section>
  <section id="rooms" class="luxury testimonials" data-background="parallax">
    <div class="testimonials-container">
      <h3> <span><b>Dịch Vụ Phòng Nghỉ</b></span> </h3>
      <div id="roomLoader" class="container">
        <div class="loader"></div>
        <div class="close-icon"></div>
        <div id="roomLoader-container"></div>
      </div>
      <ul class="property-container container" id="listRooms">
<?php
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
			<a href="chitietsanpham.php" class="more-detail btn colored">Chi Tiết </a> </div>
        </li>
<?php		
			}while($res = mysqli_fetch_object($sql));
		}
?>		
      </ul>
    </div>
  </section>
  <section id="events" class="container">
    <h3> <span>Các Dịch Vụ<b></b></span> </h3>
    <ul class="nav nav-tabs nav-justified" id="tab-type-1">
 <?php 
		$sql_1 = mysqli_query($con,'select * from table_gioithieu order by id');
		if(mysqli_num_rows($sql_1)>0){
			$res_1=mysqli_fetch_object($sql_1); $dem=0;
			do{	
?>      
	  <li data-animation="flipInY" data-animation-delay=".<?php echo $dem; ?>" <?php if($dem==0){echo 'class="active"';} ?>> <a href="#event-<?php echo $res_1->url; ?>" data-toggle="tab"> <span class="number"> <img src="media/upload/news/<?php echo $res_1->hinhanh; ?>" alt="<?php echo $res_1->tieude; ?>"></span> <span class="title"><?php echo $res_1->tieude; ?></span> </a> </li>
<?php	
		$dem = $dem+2;	}while($res_1=mysqli_fetch_object($sql_1));
		}
?>      
	</ul>
    <div id="event-tab-contents" class="tab-content appear-animation fadeInUp appear-animation-visible" data-animation="fadeInUp">
<?php 
		$sql_1 = mysqli_query($con,'select * from table_gioithieu order by id');
		if(mysqli_num_rows($sql_1)>0){
			$res_1=mysqli_fetch_object($sql_1); $dem=0;
			do{	
?>      
	  <div class="tab-pane fade in <?php if($dem==0){echo 'active';} ?>" id="event-<?php echo $res_1->url; ?>">
        <div class="event-boxes">
          <div class="event-box clearfix">
            <div class="event-pic col-xs-4 col-md-3"> <img src="media/upload/news/<?php echo $res_1->hinhanh; ?>" alt="<?php echo $res_1->tieude; ?>"> </div>
            <div class="event-right col-xs-8 col-md-9">
              <div class="name"><?php echo $res_1->tieude; ?></div>
              <div class="date">---</div>
              <div class="description"><?php echo $res_1->noidung; ?></div>
               </div>
          </div>
        </div>
      </div>
<?php	
		$dem = $dem+2;	}while($res_1=mysqli_fetch_object($sql_1));
		}
?>	
    </div>
  </section>
  <section id="testimonials" class="testimonials" data-background="parallax">
    <div id="testimonials-container" class="testimonials-container">
      <h3> <span><b>Đánh Giá Của Khách Hàng</b></span> </h3>
      <div id="testimonials-content" class="container" data-animation="fadeInUp">
        <div id="testimonials-slider" class="owl-carousel owl-theme">
<?php 
		$sql_1 = mysqli_query($con,'select * from table_hangsx');
		if(mysqli_num_rows($sql_1)>0){
			$res_1=mysqli_fetch_object($sql_1); $dem=0;
			do{	$dem++;
?>            
		  <div class="item">
            <div class="client-pic"> <img src="media/upload/hangsx/<?php echo $res_1->img; ?>" alt="<?php echo $res_1->tenhang; ?>"> </div>
            <cite><?php echo $res_1->tenhang; ?></cite>
            <blockquote><?php echo $res_1->tomtat; ?></blockquote>
          </div>
<?php	
			}while($res_1=mysqli_fetch_object($sql_1));
		}
?>		
        </div>
      </div>
    </div>
  </section>