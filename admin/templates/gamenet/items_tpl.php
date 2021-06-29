
<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Thông tin</h3><br />				  
				           	
				</div><!-- /.box-header -->
                <div class="box-body">
<table id="example1" class="table table-bordered table-striped">
    <thead>
	<tr>
		<th style="width:10%;">Tên trang</th>
        <th style="width:6%;">Sửa</th>
		
	</tr>
		</thead>
    
	<tbody>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:10%;"><?=$items[$i]['tentrang']?></td>
		<td style="width:6%;"><a href="index.php?com=gamenet&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		
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