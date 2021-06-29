<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Menu nhóm tin</h3><br />				  
				  <h3><a href="index.php?com=nhomtin&act=add"><img src="media/images/add.jpg" border="0"  /></a></h3>               	
				</div><!-- /.box-header -->
                <div class="box-body">
<style type="text/css">
.chudo{color:#FF0000; font-size:14px;}
.chuxanh{color:#0000FF; font-size:12px;}
.chuvang{color:#FF00FF; font-size:12px;}
</style>
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
		<th style="width:1%;">Id</th>
       	<th style="width:1%;">Ưu tiên</th>
        <th style="width:6%;">Loai tin</th>

		
        <th style="width:1%;">Sửa</th>
        <th style="width:1%;">Xóa</th>
    </tr>
	</thead>
    
	<tbody>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
             <td style="width:1%;"><?= $items[$i]['id'] ?></td>
			 <td style="width:1%;"><?= $items[$i]['uutien'] ?></td>
            <td style="width:6%;"><?= $items[$i]['loaitin'] ?></td>
			
			
            <td style="width:1%;"><a href="index.php?com=nhomtin&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:1%;"><a href="index.php?com=nhomtin&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
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