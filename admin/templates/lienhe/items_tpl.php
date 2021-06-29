<!--<h3><a href="index.php?com=lienhe&act=add">Thêm thành viên mới</a></h3>-->

<table class="blue_table">
    <tr>
        <th style="width:6%;">Họ tên</th>
        <th style="width:10%;">Email </th>
        <th style="width:10%;">Tiêu đề</th>
        <th style="width:40%;">Nội Dung</th>
		
		<th style="width:10%">Xuất trang chủ</th>
		
		<th style="width:3%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            <td style="width:6%;"><?= $items[$i]['ho_ten'] ?></td>
            <td style="width:10%;"><?= $items[$i]['email'] ?></td>
            <td style="width:10%;"><?= $items[$i]['tieude'] ?></td>
            <td style="width:40%;"><?= $items[$i]['noidung'] ?></td>
			
			<td style="width:10%">
						<?php
						if($items[$i]['thanhtoan']==1)
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
			
			 <td style="width:3%;"><a href="index.php?com=lienhe&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:6%;"><a href="index.php?com=lienhe&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                                return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
    <?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>