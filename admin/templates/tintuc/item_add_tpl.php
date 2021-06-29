
<div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin tin tức</h3></div><!-- /.box-header -->
                <div class="box-body">

<form name="frm" method="post" action="index.php?com=tintuc&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">

				<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại:</label>
                      <div class="col-sm-10">
                        <img src="<?= _upload_tintuc . $item['photo'] ?>" alt="NO PHOTO"  width="150"/>
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
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tiêu đề" name="ten" value="<?= @$item['ten'] ?>">
                      </div>
                    </div>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">url Tiêu đề</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="url Tiêu đề" name="url" value="<?= @$item['url'] ?>">
                      </div>
                    </div>
	

	<b>Bài viết xem nhiều: </b><input type="checkbox" name="noibat" <?= (!isset($item['noibat']) || $item['noibat'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	
<div style="display:none;">	
	
	<b>Menu trên: </b><input type="checkbox" name="menutren" <?= (!isset($item['menutren']) || $item['menutren'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>Nổi bật trang chủ: </b><input type="checkbox" name="sukien" <?= (!isset($item['sukien']) || $item['sukien'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>Chọn chủ đề con cấp 1:(<span style="color:#FF0000;">*</span>)</b>
    <select name="id_cat1" id="id_cat1" class="quoc_ola">
        <?php 
            $sql = "select * from #_nhomtin where topmenu=0";
            $d->query($sql);
            $result = $d->result_array();
            foreach ($result as $value) {
                if ($value['parentid'] == 0) {
                    
        ?>
        <optgroup label="<?php echo $value['loaitin']; ?>">
            <option value="<?= @$item['id_cat1'] ?>"></option>
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
		<option value ="0">Không chọn</option>
    </select>
    <br>
	<br />
	<?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>File tài liệu hiện tại:</b><?=$item['tailieu']?><br />
	<?php }?>
    <br />
	<b>File tài liệu nếu có:</b> <input type="file" name="tailieu" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar" /><br /><br />
	<b>Nội dung ngắn</b><br><br />
	<textarea class="" name="noidung" id="nd" rows="100" cols="40"><?= @$item['noidung'] ?></textarea><br><br />	
	
</div>
    
	
	<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Xin lựa chọn chủ đề</label>
                      <div class="col-sm-10">
                       
						<?php   
							echo "<select name=\"id_cat\" id=\"id_cat\" class='form-control select2'>";
							print '<option value ="' . @$item['id_cat'] . '">lựa chọn chủ đề</option>';
							for ($i = 0, $count = count($item_nhomtin); $i < $count; $i++) {
								print '<option value="' . $item_nhomtin[$i]['id'] . '">' . $item_nhomtin[$i]['loaitin'] . '</option><br/>';
							}
							echo "</select>";
						?>
					   
                      </div>
                    </div>
	
	
	<b style="display:none;">Chọn menu con cấp  2</b>
    <select name="id_cat2" id="id_cat2" class="quoc_ola" style="display:none;">
       
	   <?php 
            $sql = "select * from #_nhomtin where parentid=0";
            $d->query($sql);
            $results = $d->result_array();
            foreach ($results as $values) {  
        ?>
        <optgroup label="<?php echo $values['loaitin']; ?>" style="color:#FF0000;">
	    <?php 
            $sql = "select * from #_nhomtin where parentid=".$values['id']." and topmenu=0";
            $d->query($sql);
            $result = $d->result_array();
            foreach ($result as $value) {  
        ?>
        <optgroup label="&raquo;<?php echo $value['loaitin']; ?>" >
            <option value="<?php echo @$item['id_cat2'] ?>"></option>
            <?php 
                $id = $value['id'];
				$sql1 = "select * from #_nhomtin where topmenu = ".$id;
				$d->query($sql1);
            	$result1 = $d->result_array();
			
                foreach ($result1 as $value2) {
                   
                        ?>
                        <option style="color:#0000FF;" value="<?php echo $value2['id']; ?>">&raquo;&raquo;<?php  echo $value2['loaitin']; ?></option>
            <?php
                  
                }
            ?>
        </optgroup>
        <?php
            }
        ?>
		</optgroup>
		<?php
            }
        ?>
		<option value="0">Không chọn</option>	
    </select>
	<br><br />
	
	
    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tóm tắt</label>
                      <div class="col-sm-10">
                        <textarea name="tomtat" class="form-control" cols="50" rows="3" id="mota_vi"><?= @$item['tomtat'] ?></textarea>
                      </div>
                    </div>
	<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Từ khóa (SEO)</label>
                      <div class="col-sm-10">
                        <textarea name="tukhoa" class="form-control" cols="50" rows="3" id="mota_vi"><?= @$item['tukhoa'] ?></textarea>
                      </div>
                    </div>
	
	

				<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nội dung bài viết</label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="chitiet"  rows="100" cols="40"><?= @$item['chitiet'] ?></textarea>
                      </div>
                    </div>
    
	 <script src="ckeditor/ckeditor.js"></script>

    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=news&act=man'" class="btn" />
</form>

</div></div></div>