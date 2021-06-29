
<h3><a href="index.php?com=gioithieu&act=add">Thêm mới</a></h3>
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
		<th style="width:10%;">Tiêu đề</th>
        <th style="width:1%;">Sửa</th>
		<th style="width:1%;">Xóa</th>
	</tr>
		</thead>
    
	<tbody>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:1%;"><?=$items[$i]['id']?></td>
		<td style="width:10%;"><?=$items[$i]['tieude']?></td>
		
		<td style="width:1%;"><a href="index.php?com=gioithieu&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:1%;"><a href="index.php?com=gioithieu&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
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