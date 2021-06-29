<!--
<h3><a href="index.php?com=tuvan&act=add">Thêm mới</a></h3>
-->

<table class="blue_table">
	<tr>
		<th style="width:10%;">Tên</th>
		<th style="width:10%;">Email</th>
		<th style="width:10%;">Câu hỏi</th>
		<th style="width:10%;">Câu Trả lời</th>
		<th style="width:10%;">Xuất ra ngoài</th>
		
        <th style="width:6%;">TRả lời</th>
		 <th style="width:6%;">Xóa</th>
		
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:10%;"><?=$items[$i]['hoten']?></td>
		<td style="width:10%;"><?=$items[$i]['email']?></td>
		<td style="width:10%;"><?=$items[$i]['cauhoi']?></td>
		<td style="width:10%;"><?=$items[$i]['traloi']?></td>
		
		
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
				
		
		<td style="width:6%;"><a href="index.php?com=tuvan&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:3%;"><a href="index.php?com=tuvan&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>