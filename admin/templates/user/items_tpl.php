

<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Thành viên:</h3><br />
				  <a class="doimatkhau" href="index.php?com=user&act=admin_edit">Đổi mật khẩu: <img src="media/images/edit.png" /></a>
                </div><!-- /.box-header -->
                <div class="box-body">
				
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>Stt</th>
						<th>Tên tài khoản</th>
						<th>Email</th>
						<th>Hiển thị</th>
						<th>Sửa</th>
						<th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>

	<?php for($i=0, $count=count($items); $i<$count; $i++){ ?>
	<tr>
		<td><?= $i+1; ?></td>
		<td><?= $items[$i]['username'] ?></td>
		<td><?= $items[$i]['email'] ?></td>
		<td><? if(@$items[$i]['hienthi']){ ?><img src="media/images/active_1.png" /><? } ?></td>
		<td><a href="index.php?com=user&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png" /></a></td>
		<td><a href="index.php?com=user&act=delete&id=<?= $items[$i]['id'] ?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
			<img src="media/images/delete.png" /></a></td>
	</tr>
	<?php } ?>

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Stt</th>
						<th>Tên tài khoản</th>
						<th>Email</th>
						<th>Hiển thị</th>
						<th>Sửa</th>
						<th>Xóa</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
</div>

<script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>