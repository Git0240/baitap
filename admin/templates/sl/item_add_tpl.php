
<div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin Slide</h3></div><!-- /.box-header -->
                <div class="box-body">
				
<form name="frm" method="post" action="index.php?com=sl&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">
	
				<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại:</label>
                      <div class="col-sm-10">
                        <img src="<?= _upload_sl . $item['photo'] ?>" alt="NO PHOTO"  width="150"/>
                      </div>
                    </div>
				<?php } ?>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh:</label>
                      <div class="col-sm-10">
                        <input type="file" name="file" />
                      </div>
                    </div>
	

<div style="display:none;">
	<b>Slide trên: </b><input type="checkbox" name="tren" <?= (!isset($item['tren']) || $item['tren'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	<b>Slide dưới: </b><input type="checkbox" name="duoi" <?= (!isset($item['duoi']) || $item['duoi'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	<b>Slide sản phẩm: </b><input type="checkbox" name="sanpham" <?= (!isset($item['sanpham']) || $item['sanpham'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
</div>	
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tiêu đề" name="ten" value="<?= @$item['ten'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tóm tắt</label>
                      <div class="col-sm-10">
                        <textarea name="tomtat" class="form-control" rows="5" cols="100"><?= @$item['tomtat'] ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Link</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Link" name="url" value="<?= @$item['url'] ?>">
                      </div>
                    </div>
	
	<b style="display:none;">Thuộc nhóm mục:</b>
	<select name="id_loaitin"  style="display:none;">
		<?php 
			$sql = mysqli_query("select * from table_nhommuc where parentid =0 order by id desc ");
			if(mysqli_num_rows($sql)>0){
				$res = mysqli_fetch_object($sql);
				do{
			?>
				<option value="<?php echo $res->id;?>"><?php echo $res->loaitin;?></option>	
			<?php	}while($res = mysqli_fetch_object($sql));
			}
		?>
	</select><br /><br />
	
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=sl&act=man'" class="btn" />
</form>
</div></div></div>