<div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin menu</h3></div><!-- /.box-header -->
                <div class="box-body">
<form name="frm" method="post" action="index.php?com=nhomtin&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">
    
	<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên menu </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tên menu " name="loaitin" value="<?= @$item['loaitin'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">url Tên menu </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="url Tên menu " name="url" value="<?= @$item['url'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Ưu tiên (nhỏ đứng trước) </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="uutien" name="uutien" value="<?= @$item['uutien'] ?>">
                      </div>
                    </div>
	
	

	
<div style="display:none;">	
	<b>Menu trên: </b><input type="checkbox" name="menutren" <?= (!isset($item['menutren']) || $item['menutren'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>Menu dưới: </b><input type="checkbox" name="duoi" <?= (!isset($item['duoi']) || $item['duoi'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>Chọn mục menu cho nhóm</b>
    <?php
    echo "<select name=\"parentid\" id=\"parentid\">";
    print '<option value="' . @$item['parentid'] . '">Menu Chính </option>';

    for ($i = 0, $count = count($items); $i < $count; $i++) {
        print '<option value="' . $items[$i]['id'] . '">' . $items[$i]['loaitin'] . '</option><br/>';
    }
	
	print '<option value="0">Không chọn</option>';

    echo "</select>";
	
    ?><br/><br />
	
	
	
	<b>Nội dung nếu có</b><br /><br />
	<textarea class="ckeditor" name="tomtat" cols="100" rows="5" id="tomtat"><?= @$item['tomtat'] ?></textarea><br /><br />
	
	

<b>Bài viết dạng tin tức: </b><input type="checkbox" name="tintuc" <?= (!isset($item['tintuc']) || $item['tintuc'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
<br />
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Banner hiện tại:</b><img src="<?= _upload_tintuc . $item['photo'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Banner:</b> <input type="file" name="file" /> <?= _news_type ?><br /><br />
	<b>Bài viết giữa: </b><input type="checkbox" name="giua" <?= (!isset($item['giua']) || $item['giua'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	<b>Bài viết phải: </b><input type="checkbox" name="phai" <?= (!isset($item['phai']) || $item['phai'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	

	<b>Menu trái: </b><input type="checkbox" name="trai" <?= (!isset($item['trai']) || $item['trai'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	
	
	<b>Bài viết dưới footer: </b><input type="checkbox" name="giuaduoi" <?= (!isset($item['giuaduoi']) || $item['giuaduoi'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>DỊCH VỤ BẠN CẦN: </b><input type="checkbox" name="dichvu" <?= (!isset($item['dichvu']) || $item['dichvu'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	
	<b style="display:none;">Chọn menu cha(Chỉ áp dụng cho menu con câp 2)</b>	 
    <select name="topmenu" id="topmenu" class="quoc_ola" style="display:none;">
        <?php 
            $sql = "select * from #_nhomtin where topmenu=0";
            $d->query($sql);
            $result = $d->result_array();
            foreach ($result as $value) {
                if ($value['parentid'] == 0) {
                    
        ?>
        <optgroup label="<?php echo $value['loaitin']; ?>">
            <option value="<?php echo @$item['topmenu'] ?>"></option>
            <?php 
                $id = $value['id'];
                foreach ($result as $value2) {
                    if ($value2['parentid'] == $id) {
                        ?>
                        <option value="<?php echo $value2['id']; ?>"><?php  echo $value2['loaitin']; ?></option>
            <?php
                    }
                }
            ?>
            
            <?php } ?>
        </optgroup>
        <?php
            }
        ?>
		<option value="0">Không chọn</option>
    </select>
	<br /><br />
</div>	
	

    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=loaitin&act=man'" class="btn" />
</form>