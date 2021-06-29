<!DOCTYPE html>
<html lang="vi">
<head>
<?php include('head.php'); ?>
<title>
<?php include ('ketnoi.php');	
		if(isset($_GET['id']) && $_GET['id']!=''){
			$id = $_GET['id'];
			$id = str_replace('"','',$id);
			$id = str_replace("'",'',$id);
			
			$sql = mysqli_query($con,"select * from table_nhomtin where url= '". $id ."' ");
			$row = mysqli_num_rows($sql);
			if($row>0){
				$res = mysqli_fetch_object($sql);
				echo $ten = $res->loaitin;$id =$res->id; $parent = $res->parentid; $url_trang = $res->url; $topmenu = $res->topmenu; $mota = $res->tomtat; $photo = $res->photo; $tintuc = $res->tintuc;
			}else{
				$sql = mysqli_query($con,"select * from table_nhomtin order by id desc");
					if(mysqli_num_rows($sql)>0){$res= mysql_fetch_object($sql); echo $ten = $res->loaitin; $id =$res->id; $parent = $res->parentid;  $url_trang = $res->url;  $topmenu = $res->topmenu; $mota = $res->tomtat;  $photo = $res->photo; $tintuc = $res->tintuc;
					}
			}			
		}else{
			$sql = mysqli_query($con,"select * from table_nhomtin order by id desc");
				if(mysqli_num_rows($sql)>0){$res= mysqli_fetch_object($sql); echo $ten = $res->loaitin; $id =$res->id; $parent = $res->parentid;  $url_trang = $res->url; $topmenu = $res->topmenu; $mota = $res->tomtat;  $photo = $res->photo; $tintuc = $res->tintuc;
				 }
		}
	?>
</title>
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1><?php echo $ten; ?> </h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <li class="active"><?php echo $ten; ?> </li>
  </ol>
</section>
<div id="post-pages" class="container padding-bottom">
  <!-- Left Section -->
  <section id="posts-list" class="col-md-9">
<?php include ('ketnoi.php');	
		if(isset($_GET['page']) && $_GET['page']!=''){$page=$_GET['page'];}
		else {$page =0;}
		$baitren_mottrang = 1;
		$limit = $page * $baitren_mottrang;
		$limitbai = "LIMIT {$limit},{$baitren_mottrang}";
	 
		$sql = mysqli_query($con,'select * from table_news where id_cat='.$id.' or id_cat1='.$id.'  order by id desc '.$limitbai.' ');
		$sqlpt = mysqli_query('select * from table_news where id_cat='.$id.' or id_cat1='.$id);
			
		$rowpt = mysqli_num_rows($sqlpt);

		$row = mysqli_num_rows($sql); 
		if($row>0){
?>   
   <div id="ListsPost">
 <?php
	$res = mysqli_fetch_object($sql); $dem=0;
			do{ $dem++;
 ?>      
	  <div class="post-boxes"><a href="<?php echo $res->url ;?>.html"> <img src="media/upload/news/<?php echo $res->photo;?>" alt="<?php echo $res->ten;?>" class="post-img"></a>
        <div class="post-details">
          <div class="post-date"><?php echo $res->ngay;?></div>
        </div>
        <h4 class="post-title"><a href="<?php echo $res->url ;?>.html"><?php echo $res->ten;?></a></h4>
        <div class="post-short-desc"><?php echo $res->tomtat;?></div>
      </div>
<?php
			}while($res = mysqli_fetch_object($sql));	
?>	
    </div>
<?php 
		$sotrang = $rowpt/$baitren_mottrang;
		if($sotrang>1){
?>	
    <div class="pagination-box" style="">
     <ul class="page-numbers nav-pagination links text-center">
            <?php if($page>0){ $pre = $page-1;?>
            <li><a class="prev page-node" rel="prev" href="<?php echo $url_trang;?>/&page=<?php echo $pre;?>">«</a></li>
            <?php } ?>
            <?php for($p=1; $p<$sotrang; $p++){ ?>
            <li><span class="page-numbers <?php if($page==$p){echo 'current';} ?>"><a class="" href="<?php echo $url_trang;?>/&page=<?php echo $p;?>"><?php echo $p;?></a></span></li>
            <?php } ?>
            <?php if($page<$sotrang-1){ $nex = $page+1;?>
            <li><a class="next page-node" rel="next" href="<?php echo $url_trang;?>/&page=<?php echo $nex;?>">»</a></li>
            <?php } ?>
          </ul>
    </div>
		<?php } } ?>	
  </section>
  <?php include('content_right.php'); ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>
