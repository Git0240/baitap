<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tin tức</h3><br />				  
				  <h3><a href="index.php?com=tintuc&act=add"><img src="media/images/add.jpg" border="0"  /></a></h3>               	
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
        <th style="width:1%;">Stt</th>
        <th style="width:9%;">Tên</th>
        <th style="width:12%;">Thuộc nhóm</th>
        <th style="width: 12%">Ảnh minh họa</th>

        <th style="width:1%;">Sửa</th>
        <th style="width:1%;">Xóa</th>
    </tr>
	</thead>
	<tbody>	
    <?php 
	for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            <td style="width:2%;" align="center"><?= $items[$i]['id'] ?></td>
            <td style="width:9%;" align="center"><a href="index.php?com=tintuc&act=edit&id=<?= $items[$i]['id'] ?>" style="text-decoration:none;"><?= $items[$i]['ten'] ?></a></td>
            <td style="width:15%;" align="center">
			<?php include ('../ketnoi.php');
				$sql = mysqli_query($con,'select * from table_nhomtin where id='.$items[$i]['id_cat']);
				if(mysqli_num_rows($sql)>0){
					$res=mysqli_fetch_object($sql);echo '<span class="chudo">'.$res->loaitin.'</span>';
				}
				
				$sql_1 = mysqli_query($con,'select * from table_nhomtin where id='.$items[$i]['id_cat1']);
				if(mysqli_num_rows($sql_1)>0){
					$res_1=mysqli_fetch_object($sql_1);echo '<span class="chuxanh">&nbsp;->&nbsp;'.$res_1->loaitin.'</span>';
				}
			 ?>
			</td>
            <td style="width:10%;" align="center"><img width="160px" height="150px" src="<?= _upload_tintuc . $items[$i]['photo'] ?>" /></td>
			
            <td style="width:2%;" align="center"><a href="index.php?com=tintuc&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:2%;"><a href="index.php?com=tintuc&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
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