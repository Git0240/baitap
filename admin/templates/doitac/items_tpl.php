<h3><a href="index.php?com=doitac&act=add">Thêm mục album</a></h3>

	<!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<style type="text/css">
.chudo{color:#FF0000; font-size:14px;}
.chuxanh{color:#0000FF; font-size:12px;}
.chuvang{color:#FF00FF; font-size:12px;}
</style>

<table id="example1" class="table table-bordered table-striped">
	<thead>
    <tr>      
        <th style="width:1%;">ID</th>
		<th style="width:6%;">Tên album</th>

		 <th width="9%" style="width:6%;">Ảnh</th>
        <th style="width:1%;">Sửa</th>
        <th style="width:1%;">Xóa</th>
    </tr>
</thead>
	<tbody>		
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
    		<td style="width:1%;"><?= $items[$i]['id'] ?></td>        
            <td style="width:6%;"><?= $items[$i]['ten'] ?></td>

 <td style="width:6%;" align="center"><img src="<?= _upload_hang . $items[$i]['hinh'] ?>" style="width:100px;" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
 			
            <td style="width:1%;"><a href="index.php?com=doitac&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
            <td style="width:1%;"><a href="index.php?com=doitac&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
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