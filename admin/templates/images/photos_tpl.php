<h3><a href="index.php?com=images&act=add_photo&idc=<?=$_REQUEST['idc'];?>">Thêm hình ảnh</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:12%;">Hình ảnh</th>
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>
		<td style="width:12%;">
        <a href="index.php?com=images&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_photo']?>">
        <img src="<?=_upload_hinhspkhac.$items[$i]['photo']?>" width="100" height="100" />
        </a>
        </td>
		<td style="width:6%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><? }?></td>
		<td style="width:6%;"><a href="index.php?com=images&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_photo']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=images&act=delete_photo&idc=<?=$_REQUEST['idc']?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=images&act=add_photo&idc=<?=$_REQUEST['idc'];?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>