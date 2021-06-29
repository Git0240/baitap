<!DOCTYPE html>
<html lang="vi">
<head>
<?php $chitiet_baiviet='chitiet_baiviet'; include('head.php'); $chitietsanpham='chitietsanpham'; $url_trang1='sanpham';  ?>
<title>
<?php include('ketnoi.php');
	if(isset($_GET['idSP'])&& $_GET['idSP']!=''){
		
		$id=$_GET['idSP'];
		$id = str_replace('"','',$id);
		$id = str_replace("'",'',$id);
		
		$getidSP = mysqli_query($con,'select * from table_sanpham where url = "'.$id.'" ');
		$rowgetidsp = mysqli_num_rows($getidSP);
		if($rowgetidsp>0){$residsp = mysqli_fetch_object($getidSP); $idsp = $residsp->id;}
		else{
			$sp1 = mysqil_query('select * from table_sanpham order by id desc');
			$ressp1 = mysqli_fetch_object($sp1);
			$idsp = $ressp1->id;
		}
	}
	else{
		$sp = mysqli_query($con,'select * from table_sanpham order by id desc');
		$ressp = mysqli_fetch_object($sp);
		$idsp = $ressp->id;
	}
	
	$tensp = mysqli_query($con,'select * from table_sanpham where id = '.$idsp);
	$rowten = mysqli_num_rows($tensp);
	
	$cap_hai = '';
	
	if($rowten>0){
		$restensp = mysqli_fetch_object($tensp);
		$cap_mot = $restensp->id_cap_mot;
		$cap_hai = $restensp->id_cap_hai;
		$cap_ba = $restensp->id_cap_ba;
		
		echo $tensp= $restensp->tensp;
		$masp= $restensp->masp;
		$chitiet = $restensp->chitiet;
		$thongso = $restensp->thongso;
		$anh = $restensp->anh;
		$tomtat = $restensp->tomtat;
		$tukhoa = $restensp->tukhoa;
		$mota = $restensp->mota;
		$image1 = $restensp->image1;
		$image2 = $restensp->image2;
		$image3 = $restensp->image3;
		$image4 = $restensp->image4;
		$image5 = $restensp->image5;
		$banner = $restensp->banner;
		
		$giasp = $restensp->gia;
		$giacu = $restensp->giacu;
		$photo = $restensp->photo;
		$tinhtrang = $restensp->conhang;
		$giamgia = $restensp->giamgia;
	}else{
		$sp1 = mysqli_query($con,'select * from table_sanpham order by id desc');
		$ressp1 = mysqli_fetch_object($sp1);
		$idsp = $ressp1->id;
		$cap_mot = $ressp1->id_cap_mot;
		$cap_hai = $ressp1->id_cap_hai;
		$cap_ba = $ressp1->id_cap_ba;
		
		echo $tensp= $ressp1->tensp;
		$masp= $ressp1->masp;
		$chitiet = $ressp1->chitiet;
		$thongso = $ressp1->thongso;
		$anh = $ressp1->anh;
		$tomtat = $ressp1->tomtat;
		$tukhoa = $ressp1->tukhoa;
		$mota = $ressp1->mota;
		$image1 = $ressp1->image1;
		$image2 = $ressp1->image2;
		$image3 = $ressp1->image3;
		$image4 = $ressp1->image4;
		$image5 = $ressp1->image5;
		$banner = $ressp1->banner;
		
		$giasp = $ressp1->gia;
		$giacu = $ressp1->giacu;
		$photo = $ressp1->photo;
		$tinhtrang = $ressp1->conhang;
		$giamgia = $restensp->giamgia;
	}
		?>
</title>
<meta property="og:image" content="media/upload/sanpham/<?php echo $anh;?>"/>
<meta property="og:title" content="<?php echo $tensp; ?>">
<meta name="description" content="<?php echo $tomtat; ?>">
<meta name="keywords" content="<?php echo $tukhoa; ?>"/>
<meta property="og:description" content="<?php echo $tomtat; ?>" />
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax">
  <h1>Phòng Nghỉ</h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <li class="active">Phòng Nghỉ</li>
  </ol>
</section>
<section id="room-details" class="container">
  <!-- Main Box of Room Detail Pages -->
  <div class="room-details-box clearfix">
    <!-- Top Row -->
    <div class="top-row">
      <h3> <span><b id="Content_title"><?php echo $tensp; ?></b></span> </h3>
      <div id="Content_des" class="subtitle"><?php echo $tomtat; ?></div>
      <!-- Gallery container -->
      <div class="gallery">
        <!-- Main image box -->
        <ul id="Content_listimg" class="bxslider-internal">
    <?php if($image1!=''){?>        
	<li><img src="media/upload/sanpham/<?php echo $image1;?>" alt="<?php echo $tensp; ?>"></li>
	 <?php } ?><?php if($image2!=''){?> 
	 <li><img src="media/upload/sanpham/<?php echo $image2;?>" alt="<?php echo $tensp; ?>"></li>
	 <?php } ?><?php if($image2!=''){?> 
	 <li><img src="media/upload/sanpham/<?php echo $image3;?>" alt="<?php echo $tensp; ?>"></li>
	 <?php } ?><?php if($image2!=''){?> 
	 <li><img src="media/upload/sanpham/<?php echo $image4;?>" alt="<?php echo $tensp; ?>"></li>
	 <?php } ?><?php if($image2!=''){?> 
	 <li><img src="media/upload/sanpham/<?php echo $image5;?>" alt="<?php echo $tensp; ?>"></li>
	 <?php } ?>
        </ul>
        <!-- Main image box -->
        <!-- Pager Section -->
        <div id="Content_ltrimg" class="">
          <div id="bx-pager-internal"><a data-slide-index="0" href></a><a data-slide-index="1" href></a><a data-slide-index="2" href></a><a data-slide-index="3" href></a><a data-slide-index="4" href></a></div>
        </div>
        <!-- End of Pager Section -->
      </div>
      <!-- End of Gallery container -->
    </div>
    <!-- Bottom Row -->
    <div class="bottom-row">
      <!-- Room Details -->
      <div class="prp-details">
        <div class="top">
          <h4> <span><b>Mô tả</b></span> </h4>
          <!-- Room Description -->
          <div class="room-detals-container clearfix">
            <div class="desc-reservation clearfix">
              <div class="prp-description col-md-12">
                <div id="Content_detail">
                  <?php echo $chitiet; ?>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Room Description -->
        </div>
        <div class="bottom clearfix">
          <h4> <span><b>Bình luận</b></span> </h4>
          <!-- Comment's section -->
          <div class="comments-container col-md-12">
            <div class="comments-container">
              <!-- Comment Box -->
              <?php include('share.php'); ?>
							<div class="fb-comments" data-href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" data-numposts="5" data-colorscheme="light" data-width="100%"> </div>
            </div>
            <!-- End of Comment's section -->
            <!-- Reply form -->
          </div>
          ' </div>
        <!-- End of Room Details -->
      </div>
    </div>
  </div>
</section>
<?php include('footer.php'); ?>
</body>
</html>
