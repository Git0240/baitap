<h3><a href="index.php?com=nlk&act=add">Thêm mới</a></h3>

<table class="blue_table">
    <tr>
       
        <th style="width:6%;">Liên kết website</th>
        <th style="width:6%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
            <td style="width:6%;"><?= $items[$i]['tennlk'] ?></td>
            <td style="width:6%;"><a href="index.php?com=nlk&act=edit&id=<?= $items[$i]['id_nlk'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:6%;"><a href="index.php?com=nlk&act=delete&id=<?= $items[$i]['id_nlk'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>