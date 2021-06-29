
<h3><a href="index.php?com=tailieu&act=add">Thêm mới Tài liệu</a></h3>

<table class="blue_table">

    <tr>  
        <th width="9%" style="width:30%;">Tên Tài liệu</th>
		
        <th width="9%" style="width:1%;">Sửa</th>
       	<th width="9%" style="width:1%;">Xóa</th>
	   
    </tr>

    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
           
            <td style="width:12%;" align="center"><?= $items[$i]['ten'] ?></td>
			
            <td style="width:1%;" align="center"><a href="index.php?com=tailieu&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
           	<td style="width:1%;"><a href="index.php?com=tailieu&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
			
        </tr>
<?php } ?>
</table>
<a href="index.php?com=tailieu&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?= $paging['paging'] ?></div>