 <footer id="top-footer">
 <div id="top-footer-content" class="container">
<div class="widget col-md-3">
        <h4>Bài viết mới</h4>
        <div class="content-box row">
          <div class="widget-content">
            <?php include('ketnoi.php');
	$sql = mysqli_query($con,'select * from table_news order by id DESC limit 0,6 ');
	if(mysqli_num_rows($sql)>0){ $res=mysqli_fetch_object($sql);do{
?>           
		  <li><a href="<?php echo $res->url ;?>.html" title="<?php echo $res->ten; ?>"><?php echo $res->ten; ?></a></li>
<?php }while($res=mysqli_fetch_object($sql)); } ?> 
		  </div>
        </div>
      </div>
	  </div>
	  </footer>
