<!-- 
<h3><a href="index.php?com=popup&act=add">Thêm đối tác</a></h3>
-->
<table class="blue_table">
    <tr>
        
        <th style="width:6%;">Ẩn hiện</th>
		 <th width="9%" style="width:12%;">Ảnh</th>
        <th style="width:6%;">Sửa</th>
        
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
            <td style="width:6%;"><?php if($items[$i]['anhien']==1){echo 'Hiện';}else {echo 'Ẩn';} ?></td>
 <td style="width:12%;" align="center"><img src="<?= _upload_hang . $items[$i]['hinh'] ?>" style="width:100px;" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
            <td style="width:6%;"><a href="index.php?com=popup&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
           
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>