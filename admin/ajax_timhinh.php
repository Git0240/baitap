<?php 
		include('../ketnoi.php');
		@session_start();
		$_SESSION['url_td'] = 'http://'.$_SERVER['HTTP_HOST'];
		if(isset($_GET['key'])&& $_GET['key']!=''){
		 
		
?>

<table class="blue_table">
    <tr>
        
		 <th width="9%" style="width:12%;">Ảnh</th>
		 <th width="9%" style="width:12%;">Thuộc tên bài viết</th>
        <th style="width:6%;">Xóa</th>
    </tr>
		
		<?php 
		
		$sql = mysqli_query($con,"select * from table_doitac where ten like N'%".$_GET['key']."%' order by id DESC ");
		
		if(mysqli_num_rows($sql)>0){
		
		
			$res = mysqli_fetch_object($sql);
			$id= $res->id; 
			$sql_hinh = mysqli_query($con,'select * from table_albumkh where id_tintuc ='.$id);
			
			if(mysqli_num_rows($sql_hinh)>0){
				$res_hinh = mysqli_fetch_object($sql_hinh);
				do{
					
		?>
		        <tr>
            
 <td style="width:12%;" align="center"><img src="../media/upload/albumkh/<?php echo $res_hinh->hinh; ?>" style="width:100px;" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>

   			<td style="width:12%;" align="center">
				<?php
					$sql_ten = mysqli_query($con,'select * from table_doitac where id='.$res_hinh->id_tintuc);
					if(mysqli_num_rows($sql_ten)>0){
						$res_ten=mysqli_fetch_object($sql_ten);
						echo $res_ten->ten;
					}
				 ?>
			</td>
			
            <td style="width:6%;"><a href="index.php?com=albumkh&act=delete&id=<?php echo $res_hinh->id; ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
		
	<?php 		}while($res_hinh = mysqli_fetch_object($sql_hinh));
			}	
	 }//row ?>
	
</table>

</div>
<?php		}
	?>