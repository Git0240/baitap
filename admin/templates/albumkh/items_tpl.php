<h3><a href="index.php?com=albumkh&act=add">Thêm hình ảnh</a></h3>
<style type="text/css">
.chudo{color:#FF0000; font-size:14px;}
.chuxanh{color:#0000FF; font-size:12px;}
.chuvang{color:#FF00FF; font-size:12px;}
</style>

<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Thông tin</h3><br />				  
				           	
				</div><!-- /.box-header -->
                <div class="box-body">
				
<table id="example1" class="table table-bordered table-striped">
	<thead>
    <tr>
        <th style="width:1%;">ID</th>
		 <th width="9%" style="width:12%;">Ảnh</th>

        <th style="width:6%;">Xóa</th>
    </tr>
	</thead>
	<tbody>		
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
		
		<td style="width:1%;" align="center"><?= $items[$i]['id'] ?></td>
            
 <td style="width:12%;" align="center"><img src="../media/upload/albumkh/<?=$items[$i]['hinh'] ?>" style="width:100px;" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>

			
            <td style="width:6%;"><a href="index.php?com=albumkh&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
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