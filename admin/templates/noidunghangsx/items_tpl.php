<!--<h3><a href="index.php?com=noidunghangsx&act=add">Thêm mới</a></h3>-->
<h3><a href="index.php?com=noidunghangsx&act=add">Thêm Chi tiết hãng sản xuất</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:10%;">Tiêu đề bài giới thiệu</th>
        <th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:10%;"><?=$items[$i]['tieude']?></td>
		<td style="width:6%;"><a href="index.php?com=noidunghangsx&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:6%;"><a href="index.php?com=noidunghangsx&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>