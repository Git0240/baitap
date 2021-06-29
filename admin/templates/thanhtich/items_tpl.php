<h3><a href="index.php?com=thanhtich&act=add">Thêm thành tích</a></h3>

<table class="blue_table">
    <tr>
        
        <th style="width:6%;">Tên</th>
		 <th width="9%" style="width:12%;">Ảnh</th>
        <th style="width:6%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
            <td style="width:6%;"><?= $items[$i]['tenthanhtich'] ?></td>
 <td style="width:12%;" align="center"><img src="<?= _upload_hang . $items[$i]['hinh'] ?>" style="width:100px;" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
            <td style="width:6%;"><a href="index.php?com=thanhtich&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:6%;"><a href="index.php?com=thanhtich&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>