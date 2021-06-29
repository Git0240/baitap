<h3><a href="index.php?com=sl&act=add">Thêm tin slide</a></h3>

<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Thông tin</h3><br />				  
				           	
				</div><!-- /.box-header -->
                <div class="box-body">

<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        
        <th width="9%" style="width:12%;">Ảnh slide</th>
		
        <th width="9%" style="width:1%;">Sửa</th>
        <th width="9%" style="width:1%;">Xóa</th>
    </tr>
	</thead>
    
	<tbody>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
           <td style="width:12%;" align="center"><img src="<?= _upload_sl . $items[$i]['photo'] ?>" height="90px" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
		   
            <td style="width:1%;" align="center"><a href="index.php?com=sl&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:1%;"><a href="index.php?com=sl&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
<?php } ?>
	</tbody>
</table>
<a href="index.php?com=sl&act=add"><img src="media/images/add.jpg" border="0"  /></a>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
</div>