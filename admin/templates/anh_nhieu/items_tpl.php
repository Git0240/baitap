<!--<h3><a href="index.php?com=an&act=add">Thêm mới</a></h3>-->

<table class="blue_table">
    <tr>
        
        <th style="width:10%;">Banner bên trái</th>
        <th style="width:10%;">Banner bên phải</th>
        
        
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
            
            <td style="width:6%"><img src="<?= _upload_hang . $items[$i]['trai'] ?>" alt="NO PHOTO"  width="118px" height="254px" /></td>
             <td style="width:6%"><img src="<?= _upload_hang . $items[$i]['phai'] ?>" alt="NO PHOTO"  width="118px" height="254px"/></td>
            
           
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>