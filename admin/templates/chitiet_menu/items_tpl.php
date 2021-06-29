<?php include('../ketnoi.php'); ?>
<h3><a href="index.php?com=chitiet_menu&act=add">Thêm Chi tiết loại sản phẩm</a></h3>

<div id='ajax_loading' class='hidden'></div>
<div id="ajax_timkiem">
	<table class="blue_table">
	
		<tr>
		  
			<th style="width:10%;">Tên loại sản phẩm</th>
			<th style="width:10%;">Sửa</th>
			<th style="width:10%;">Xóa</th>
		</tr>
	
		<?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
			<tr>
				
			<td style="width:10%;" align="center">
				<a href="index.php?com=chitiet_menu&act=edit&id=<?= $items[$i]['id'] ?>" style="text-decoration:none;">
					<?php 
						$sql = mysql_query('select * from table_nhommuc where id ='.$items[$i]['id_cap_mot']);
						if(mysql_num_rows($sql)>0){
							$res = mysql_fetch_object($sql);
							echo $res->loaitin;
						}
					?>
				</a>
				
			</td>
				<td style="width:6%;" align="center"><a href="index.php?com=chitiet_menu&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
				<td style="width:6%;"><a href="index.php?com=chitiet_menu&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
							return false;"><img src="media/images/delete.png" border="0" /></a></td>
			</tr>
	<?php } ?>
	</table>
</div>
<a href="index.php?com=chitiet_menu&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?= $paging['paging'] ?></div>