<?php 
		include('../ketnoi.php');
		@session_start();
		$_SESSION['url_td'] = 'http://'.$_SERVER['HTTP_HOST'];
		if(isset($_GET['key'])&& $_GET['key']!=''){
?>

<table class="blue_table">
		<tr>
			<th style="width:10%;">Tên dự án</th>
			<th width="9%" style="width:12%;">Ảnh minh họa</th>
			<th width="9%" style="width:10%;">Giá</th>
			<th width="6%" style="width: 5%">Xuất ra ngoài</th>
			<th width="9%" style="width:6%;">Sửa</th>
			<th width="9%" style="width:6%;">Xóa</th>
		</tr>
		
		<?php 
		$sql = mysqli_query($con,"select * from table_sanpham where tensp like N'%".$_GET['key']."%' ");
		if(mysqli_num_rows($sql)>0){
		$res = mysqli_fetch_object($sql);
		do{
		?>
		<tr>
			<td style="width:10%;" align="center"><a href="index.php?com=sp&act=edit&id=<?php echo $res->id; ?>" style="text-decoration:none;"><?php echo $res->tensp; ?></a></td>
				<td style="width:12%;" align="center"><img src="../media/upload/sanpham/<?php echo $res->anh; ?>" id="img_size" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
				<td style="width:6%;" align="center"><?=number_format($res->gia,0,'.','.')?></td>
			   
				<td style="width:5%;">
	
				<?php
				if($res->publish==1)
				{
					?>
					<img src="media/images/active_1.png"  border="0"/>
				<?php
				}
				else
				{
					?>
				   <img src="media/images/active_0.png" border="0" />
				<?php
				}?>        
				</td>
				<td style="width:6%;" align="center"><a href="index.php?com=sp&act=edit&id=<?= $res->id; ?>"><img src="media/images/edit.png"  border="0"/></a></td>
				<td style="width:6%;"><a href="index.php?com=sp&act=delete&id=<?= $res->id; ?>" onClick="if (!confirm('Xác nhận xóa'))
							return false;"><img src="media/images/delete.png" border="0" /></a></td>
			</tr>
	
	<?php }while($res = mysqli_fetch_object($sql));
	 }//row ?>
	</table>
<?php		}
	?>