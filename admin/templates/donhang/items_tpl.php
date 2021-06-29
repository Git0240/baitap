

<table class="blue_table">
    <tr>
        <th style="width:1%">Stt</th>
        <th style="width:6%;">Họ tên</th>
		<th style="width:4%;">SĐT</th>
        <th style="width:6%;">email</th>
		<th style="width:4%;">Ngày đặt hàng</th>
		<th style="width:6%;">Tên SP</th>
		<th style="width:1%;">Số lượng</th>
        <th style="width:3%;">Xóa</th>
		
    </tr>
	
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            <td style="width:1%"><?=$i?></td>
            <td style="width:6%;"><?= $items[$i]['hoten'] ?></td>
			<td style="width:4%;"><?= $items[$i]['sdt'] ?></td>
			<td style="width:6%;"><?= $items[$i]['email'] ?></td>
			<td style="width:4%;"><?= $items[$i]['ngaydh'] ?></td>
			<td style="width:6%;"><?= $items[$i]['tensp'] ?></td>
			<td style="width:1%;"><?= $items[$i]['soluong'] ?></td>
			
            <td style="width:3%;"><a href="index.php?com=donhang&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>