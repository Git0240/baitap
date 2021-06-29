<!--<h3><a href="index.php?com=an&act=add">Thêm sản phẩm</a></h3>-->

<table class="blue_table">

    <tr>
      
       
        <th width="9%" style="width:12%;">Banner bên trái</th>
        <th width="9%" style="width:12%;">Banner bên phải</th>
        
        
        <th width="9%" style="width:6%;">Sửa</th>
       
    </tr>

    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
           
            <td style="width:12%;" align="center"><img src="<?= _upload_sanpham . $items[$i]['trai'] ?>" id="img_size" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
            <td style="width:12%;" align="center"><img src="<?= _upload_sanpham . $items[$i]['phai'] ?>" id="img_size" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
           
       
            <td style="width:6%;" align="center"><a href="index.php?com=an&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
           
        </tr>
<?php } ?>
</table>
<!--<a href="index.php?com=sp&act=add"><img src="media/images/add.jpg" border="0"  /></a>-->

<div class="paging"><?= $paging['paging'] ?></div>