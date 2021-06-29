

<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Thêm sản phẩm</h3><br />				  
				  <h3><a href="index.php?com=sp&act=add"><img src="media/images/add.jpg" border="0"  /></a></h3>               	
				</div><!-- /.box-header -->
                <div class="box-body">
				
<table id="example1" class="table table-bordered table-striped">
    <thead>
		<tr>
		  	<th style="width:1%;">STT</th>
			<th style="width:10%;">Tên sản phẩm</th>
			<th  style="width:5%;">Ảnh minh họa</th>
			<th  style="width:1%">Xuất ra ngoài</th>
			<th  style="width:1%;">Sửa</th>
			<th  style="width:1%;">Xóa</th>
		</tr>
	</thead>
    
	<tbody>
		<?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
			<tr>
				
				<td style="width:1%;"><?= $items[$i]['id'] ?></td>
				
				<td style="width:10%;" align="center"><a href="index.php?com=sp&act=edit&id=<?= $items[$i]['id'] ?>" style="text-decoration:none;"><?= $items[$i]['tensp'] ?></a></td>
				<td style="width:5%;" align="center"><img src="<?= _upload_sanpham . $items[$i]['anh'] ?>" style="width:150px;" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
				
				
				<td style="width:1%;">
	
				<?php
				if(@$items[$i]['publish']==1)
				{
					?>
					<img src="media/images/active_1.png"  border="0"/>
				<?php
				}
				else
				{
					?>
				   <img src="media/images/active_0.png" border="0" />
				<?php
				}?>        
				</td>
				<td style="width:1%;" align="center"><a href="index.php?com=sp&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
				<td style="width:1%;"><a href="index.php?com=sp&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
							return false;"><img src="media/images/delete.png" border="0" /></a></td>
			</tr>
	<?php } ?>
	
	</tbody>
	
	</table>


	<script>
      $('#example1').DataTable( {
        	"order": [[ 0, "desc" ]]
   		 } );
    </script>


                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
</div>


