
<table class="blue_table">
	<tr>
		<th style="width:10%;">Tiêu đề Giới thiệu trang chủ</th>
        <th style="width:6%;">Sửa</th>
		
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:10%;"><?=$items[$i]['tieude']?></td>
		<td style="width:6%;"><a href="index.php?com=tuyendung&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>