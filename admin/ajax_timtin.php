<?php 
		include('../ketnoi.php');
		@session_start();
		$_SESSION['url_td'] = 'http://'.$_SERVER['HTTP_HOST'];
		if(isset($_GET['key'])&& $_GET['key']!=''){
?>

<table class="blue_table">

    <tr>
        <th style="width:6%;">Stt</th>
        <th style="width:9%;">Tên</th>
        <th style="width:12%;">Thuộc nhóm</th>
        <th style="width: 12%">Ảnh minh họa</th>
        <th style="width:6%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>
		
		<?php 
		$sql = mysqli_query($con,"select * from table_news where ten like N'%".$_GET['key']."%' order by id DESC ");
		if(mysqli_num_rows($sql)>0){
		$res = mysqli_fetch_object($sql);
		$dem=0;
		do{
			$dem++;
		?>
		<tr>
            <td style="width:2%;" align="center"><?= $dem; ?></td>
            <td style="width:9%;" align="center"><a href="index.php?com=tintuc&act=edit&id=<?= $res->id; ?>" style="text-decoration:none;"><?= $res->ten; ?></a></td>
            <td style="width:15%;" align="center">
			
			<?php
				$sql1 = mysqli_query($con,'select * from table_nhomtin');
				if(mysqli_num_rows($sql1)>0){
					$res1 = mysqli_fetch_object($sql1);
					do{
						if($res1->id == $res->id_cat){echo $res1->loaitin;}
					}while($res1 = mysqli_fetch_object($sql1));
				}
			 ?>
			
			
			</td>
            <td style="width:10%;" align="center"><img width="160px" height="150px" src="../media/upload/news/<?= $res->photo; ?>" /></td>
			
            <td style="width:2%;" align="center"><a href="index.php?com=tintuc&act=edit&id=<?= $res->id; ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:2%;"><a href="index.php?com=tintuc&act=delete&id=<?= $res->id; ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
		
	<?php }while($res = mysqli_fetch_object($sql));
	 }//row ?>
	</table>
	
	</table>

</div>
<?php		}
	?>