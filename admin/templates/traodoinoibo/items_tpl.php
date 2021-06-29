<!--<h3><a href="index.php?com=traodoinoibo&act=add">Thêm thành viên mới</a></h3>-->

<table class="blue_table">
    <tr>
        <th style="width:6%;">Họ tên</th>
        <th style="width:10%;">Email </th>
        <th style="width:10%;">Địa chỉ</th>
        <th style="width:40%;">Nội Dung</th>


        <th style="width:6%;">Xóa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            <td style="width:6%;"><?= $items[$i]['ho_ten'] ?></td>
            <td style="width:10%;"><?= $items[$i]['email'] ?></td>
            <td style="width:10%;"><?= $items[$i]['diachi'] ?></td>
            <td style="width:40%;"><?= $items[$i]['ykien'] ?></td>


            <td style="width:6%;"><a href="index.php?com=traodoinoibo&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                                return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
    <?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>