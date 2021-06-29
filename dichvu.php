<!DOCTYPE html>
<html lang="vi">
<head>
<?php include('head.php'); ?>
<?php include('title.php'); ?>
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1>Dịch vụ</h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <li class="active">Dịch vụ</li>
  </ol>
</section>
<section id="events-page">
  <div class="event-page-container container">
    <div class="events-boxes-container clearfix" id="services-list">
 <?php 
		$sql_1 = mysqli_query($con,'select * from table_gioithieu order by id');
		if(mysqli_num_rows($sql_1)>0){
			$res_1=mysqli_fetch_object($sql_1);
			do{	
?>      
	  <div class="event-row col-xs-6 col-md-6">
        <div class="event-row-container clearfix">
          <div class="event-pic col-md-6"><img src="media/upload/news/<?php echo $res_1->hinhanh; ?>" alt="<?php echo $res_1->tieude; ?>">
            <div class="details">
              <div class="date"></div>
            </div>
          </div>
          <div class="event-detail col-md-6">
            <h4 class="name"><b><?php echo $res_1->tieude; ?></b></h4>
            <div class="description">
              <?php echo $res_1->noidung; ?>
            </div>
          </div>
        </div>
      </div>
<?php	
			}while($res_1=mysqli_fetch_object($sql_1));
		}
?>	
    </div>
  </div>
</section>
<?php include('footer.php'); ?>
</body>
</html>
