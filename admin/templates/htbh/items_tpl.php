<h3><a href="index.php?com=htbh&act=add">Thêm mới</a></h3>
<style type="text/css">
.chudo{color:#FF0000; font-size:14px;}
.chuxanh{color:#0000FF; font-size:12px;}
.chuvang{color:#FF00FF; font-size:12px;}
</style>
<table class="blue_table">
    <tr>
       
        <th style="width:6%;">Tên</th>
        <th style="width:6%;">Thuộc loại</th>
        <th style="width:1%;">Sửa</th>
        <th style="width:1%;">Xóa</th>
    </tr>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            
            <td style="width:6%;"><?= $items[$i]['ten'] ?></td>
            <td style="width:15%;" align="center">			
			<?php 
				$sql = mysql_query('select * from table_nhomtin where id='.$items[$i]['id_menu']);
				if(mysql_num_rows($sql)>0){
					$res=mysql_fetch_object($sql);echo '<span class="chudo">'.$res->loaitin.'</span>';
				}
			 ?>
			</td>
            <td style="width:1%;"><a href="index.php?com=htbh&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:1%;"><a href="index.php?com=htbh&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
<?php } ?>
</table>
<div class="paging"><?= $paging['paging'] ?></div>