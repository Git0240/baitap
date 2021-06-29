<h3><a href="index.php?com=lk&act=add">Thêm linh kiện</a></h3>

<table class="blue_table">

    <tr>
        <th style="width:6%;">Stt</th>
        <th style="width:9%;">Tên</th>
        <th style="width:12%;">Tóm tắt</th>
        <th style="width: 12%">Ảnh minh họa</th>
        <th style="width:9%;">Giá</th>
        <th style="width:6%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>

    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            <td style="width:2%;" align="center"><?= $i ?></td>
            <td style="width:9%;" align="center"><a href="index.php?com=lk&act=edit&id=<?= $items[$i]['id'] ?>" style="text-decoration:none;"><?= $items[$i]['ten'] ?></a></td>
            <td style="width:15%;" align="center"><?= $items[$i]['tomtat'] ?></td>
            <td style="width:10%;" align="center"><img width="160px" height="150px" src="<?= _upload_linhkien . $items[$i]['anh'] ?>"</td>
            <td style="width:9%;" align="center"><?= $items[$i]['gia'] ?></td>
            <td style="width:2%;" align="center"><a href="index.php?com=lk&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:2%;"><a href="index.php?com=lk&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
    <?php } ?>
</table>
<a href="index.php?com=lk&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?= $paging['paging'] ?></div>