			
<h3><a href="index.php?com=congtrinhhoanthien&act=add">Thêm công trình hoàn thiện</a></h3>
<div id='ajax_loading' class='hidden'></div>
<div id="ajax_timkiem">
	<table class="blue_table">
	
		<tr>
		  
			<th style="width:10%;">Tên</th>
			<th width="9%" style="width:12%;">Ảnh minh họa</th>
			<th width="9%" style="width:10%;">Tiêu đề</th>
			<th width="6%" style="width: 5%">Xuất ra ngoài</th>
			<th width="9%" style="width:6%;">Sửa</th>
			<th width="9%" style="width:6%;">Xóa</th>
		</tr>
	
		<?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
			<tr>
				
				<td style="width:10%;" align="center"><a href="index.php?com=congtrinhhoanthien&act=edit&id=<?= $items[$i]['id'] ?>" style="text-decoration:none;"><?= $items[$i]['ten'] ?></a></td>
				<td style="width:12%;" align="center"><img src="<?= _upload_sanpham . $items[$i]['anh'] ?>" id="img_size" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
				<td style="width:6%;" align="center"><?= $items[$i]['tieude'] ?></td>
			   
				<td style="width:5%;">
	
				<?php
				if(@$items[$i]['publish']==1)
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
				<td style="width:6%;" align="center"><a href="index.php?com=congtrinhhoanthien&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
				<td style="width:6%;"><a href="index.php?com=congtrinhhoanthien&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
							return false;"><img src="media/images/delete.png" border="0" /></a></td>
			</tr>
	<?php } ?>
	</table>
</div>
<a href="index.php?com=congtrinhhoanthien&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?= $paging['paging'] ?></div>