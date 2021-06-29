<h3><a href="index.php?com=htdl&act=add">Thêm mới</a></h3>

<table class="blue_table">
    <tr>
       
        <th style="width:6%;">Dòng 1</th>
        <th style="width:6%;">Dòng 2</th>
        <th style="width:6%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
            <td style="width:6%;"><?= $items[$i]['ten'] ?></td>
            <td style="width:6%;"><?= $items[$i]['sdt'] ?></td>
            <td style="width:6%;"><a href="index.php?com=htdl&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:6%;"><a href="index.php?com=htdl&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>