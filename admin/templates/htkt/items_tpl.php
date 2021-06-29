
<table class="blue_table">
    <tr>
       
        <th style="width:6%;">Tên</th>
        <th style="width:6%;">Tóm tắt</th>
        <th style="width:6%;">Sửa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
            <td style="width:6%;"><?= $items[$i]['ten'] ?></td>
            <td style="width:6%;"><?= $items[$i]['sdt'] ?></td>
            <td style="width:6%;"><a href="index.php?com=htkt&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>