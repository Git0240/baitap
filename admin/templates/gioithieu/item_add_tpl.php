
<div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin về bài Bài viết 1 bài</h3></div><!-- /.box-header -->
                <div class="box-body">
<form name="frm" method="post" action="index.php?com=gioithieu&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">

	<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại:</label>
                      <div class="col-sm-10">
                        <img src="<?=_upload_gioithieu.$item_mot['hinhanh']?>" alt="NO PHOTO"  width="150"/>
                      </div>
                    </div>
				<?php } ?>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh:</label>
                      <div class="col-sm-10">
                        <input type="file" name="file" />
                      </div>
                    </div>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tiêu đề" name="tieude" value="<?= @$item_mot['tieude'] ?>">
                      </div>
                    </div>
	

<div style="display:none;">
	<b>bài viết trên: </b><input type="checkbox" name="noibat" <?= (!isset($item_mot['noibat']) || $item_mot['noibat'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>bài viết giữa: </b><input type="checkbox" name="giua" <?= (!isset($item_mot['giua']) || $item_mot['giua'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>bài viết dưới: </b><input type="checkbox" name="duoi" <?= (!isset($item_mot['duoi']) || $item_mot['duoi'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>Menu bài viết 1 bài:(<span style="color:#FF0000;">*</span>)</b>
    <?php
    echo "<select name=\"id_menu\" id=\"id_menu\">";
	
    print '<option value ="' . @$item_mot['id_menu'] . '">Lựa chọn menu bài viết</option>';

    for ($i = 0, $count = count($tbms); $i < $count; $i++) {
        print '<option value="' . $tbms[$i]['id_tbm'] . '">' . $tbms[$i]['ten'] . '</option><br/>';
    }
	print '<option value="0">Không chọn</option>';
    echo "</select>";
    ?>
<b style="display:none;">Lịch sử</b>
    <p style="display:none;">
        <textarea class="" name="vechungtoi" id="" rows="100" cols="40"><?= @$item_mot['vechungtoi'] ?></textarea>
    </p>
	
	<b style="display:none;">Lịch sử</b>
    <p style="display:none;">
        <textarea class="" name="hoatdong" id="" rows="100" cols="40"><?= @$item_mot['hoatdong'] ?></textarea>
    </p>
	
	<br /><br />
	<b>Tóm tắt</b><br /><br />
    <textarea class="" name="tomtat" id="nd" rows="5" cols="70"><?= @$item_mot['tomtat'] ?></textarea>
</div>	
	
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nội dung bài viết</label>
                      <div class="col-sm-10">
						<textarea class="ckeditor" class="form-control" name="noidung" id="nd" rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
                      </div>
                    </div>
        
    

    <script src="ckeditor/ckeditor.js"></script>
    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=gioithieu&act=man'" class="btn" />
</form>