	<!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


	<style type="text/css">
.chudo{color:#FF0000; font-size:13px;}
.chuxanh{color:#0000FF; font-size:12px;}
.chuvang{color:#FF00FF; font-size:11px;}
</style>

<h3><a href="index.php?com=menu_doc&act=add">Thêm mới</a></h3>

<table id="example1" class="table table-bordered table-striped">
	<thead>
    <tr>
        <th style="width:1%;">ID</th>
		 <th style="width:1%;">ưu tiên</th>
        <th style="width:16%;">Tên menu</th>
		<th style="width:16%;">Thuộc loại</th>
		<th style="width:1%;">Nổi bật</th>
		<th style="width:1%;">Đặc trưng</th>
		<th style="width:1%;">Sửa</th>
        <th style="width:1%;">Xóa</th>
    </tr>
	</thead>
	<tbody>		
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
            <td style="width:1%;"><?= $items[$i]['id'] ?></td>
			<td style="width:1%;"><?= $items[$i]['uutien'] ?></td>
            <td style="width:16%;"><?= $items[$i]['loaitin'] ?></td>
			<td style="width:16%;">
			<?php 
				$sql = mysql_query('select * from table_nhommuc where id='.$items[$i]['parentid']);
				if(mysql_num_rows($sql)>0){
					$res=mysql_fetch_object($sql);echo '<span class="chudo">'.$res->loaitin.'</span>';
				}
				
			 ?>
			</td>
			<td style="width:1%;">
				<?php 
				if(@$items[$i]['noibat']==1)
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
				}  ?>        
			</td>
			<td style="width:1%;">
				<?php 
				if(@$items[$i]['hot']==1)
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
				}  ?>        
			</td>
			<td style="width:1%;"><a href="index.php?com=menu_doc&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:1%;"><a href="index.php?com=menu_doc&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                        return false;"><img src="media/images/delete.png" border="0" /></a></td>
        </tr>
<?php } ?>
	</tbody>
</table>

	<script>
      $('#example1').DataTable( {
        	"order": [[ 0, "DES" ]]
   		 } );
    </script>