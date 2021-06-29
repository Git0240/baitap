<style>
    .quoc_ola {
    width: 202px;
}.timkiemten{color:#FF0000; font-size:16px;}
</style>
<div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin sản phẩm</h3></div><!-- /.box-header -->
                <div class="box-body">
				
<form name="frm" method="post" action="index.php?com=sp&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">

    <?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại:</label>
                      <div class="col-sm-10">
                        <img src="<?= _upload_sanpham . $item['anh'] ?>" alt="NO PHOTO"  width="150"/>
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
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm(<span style="color:#FF0000;">*</span>)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm" name="tensp" value="<?= @$item['tensp'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">url Sản phẩm</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="url sản phẩm" name="url" value="<?= @$item['url'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Diện tích</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Diện tích" name="masp" value="<?= @$item['masp'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Giá sản phẩm" name="gia" value="<?= @$item['gia'] ?>">
                      </div>
                    </div>
					
	
<div style="display:none;">

<br /><br />  
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Banner hiện tại:</b><img src="<?= _upload_sanpham . $item['banner'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
      
    <b>Banner:</b> <input type="file" name="banner" /> <br /><br />

<b>Giá cũ</b> <input  type="text" name="giacu"  value="<?= @$item['giacu'] ?>" class="input" /><br /><br />
	<b>Giảm giá %</b><input type="text" name="giamgia" value="<?= @$item['giamgia'] ?>" class="input" /><br /><br />
	
	<b>Bán chạy: </b> <input type="checkbox" name="spbn" <?= (!isset($item['spbn']) || $item['spbn'] == 0) ? '' : 'checked="checked"' ?>><br /><br />
	<b>Sản phẩm tiêu biểu: </b> <input type="checkbox" name="spnoibat" <?= (!isset($item['spnoibat']) || $item['spnoibat'] == 0) ? '' : 'checked="checked"' ?>><br /><br />
	<b>Sản phẩm cao cấp: </b> <input type="checkbox" name="sphot" <?= (!isset($item['sphot']) || $item['sphot'] == 0) ? '' : 'checked="checked"' ?>><br /><br />

	
	<b>Xuất xứ</b> <input type="text" name="xuatxu"  value="<?= @$item['xuatxu'] ?>" class="input" /><br /><br />
	
	
	<b >Link Video</b><input type="text" name="video" value="<?= @$item['video'] ?>" class="input" />
	
	<b>Thương hiệu:</b>
    <?php
    echo "<select name=\"id_hang\" id=\"id_cat\" >";

    print '<option value ="' . $item['id_hang'] . '">Lựa chọn Thương hiệu </option>';

    for ($i = 0, $count = count($hangs); $i < $count; $i++) {
        print '<option value="' . $hangs[$i]['id_hang'] . '">' . $hangs[$i]['tenhang'] . '</option><br/>';
    }
 	print '<option value ="0">Không chọn </option>';
    echo "</select>";
    ?><?php 
		if (@$_REQUEST['act'] == 'edit') {
            $sql = "select * from #_hangsx where id_hang=".@$item['id_hang']; $d->query($sql); $results = $d->result_array();  foreach ($results as $values) {  echo '<span class="timkiemten">'.$values['tenhang'].'</span>'; }
    	}
	?>
  	<br /><br>  
</div>		
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Từ khóa (SEO)</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Từ khóa (SEO)" name="tukhoa" value="<?= @$item['tukhoa'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">mô tả sản phẩm (SEO)</label>
                      <div class="col-sm-10">
						<textarea  name="tomtat" cols="100" class="form-control" rows="5" id="tomtat"><?= @$item['tomtat'] ?></textarea>
                      </div>
                    </div>
	
    
	  
    <b style="display:none;">Khoảng giá:</b>
    <?php
    echo "<select name=\"id_kg\" id=\"id_cat\" style='display:none;' >";

    print '<option value ="' . $item['id_kg'] . '">Lựa chọn khoảng giá </option>';

    for ($i = 0, $count = count($kgs); $i < $count; $i++) {
        print '<option value="' . $kgs[$i]['id_kg'] . '">' . $kgs[$i]['tenkg'] . '</option><br/>';
    }

    echo "</select>";
    ?>

    <b style='display:none;'>Khuyến mãi</b>
    <input  style='display:none;' type="text" name="km" value="<?= @$item['km'] ?>" class="input" />
	
	
	
    <b style='display:none;'>Đơn vị tính:</b>

    <?php
    echo "<select name=\"id_hdh\" id=\"id_cat\" style='display:none;'>";

    print '<option value ="' . $item['id_hdh'] . '">Lựa chọn đơn vị tính </option>';

    for ($i = 0, $count = count($hdhs); $i < $count; $i++) {
        print '<option value="' . $hdhs[$i]['id_hdh'] . '">' . $hdhs[$i]['tenhdh'] . '</option><br/>';
    }

    echo "</select>";
    ?>
	
	
	
<div style="display:none;">	
    
	
	

    <b>Sản phẩm khuyến mãi: </b> <input type="checkbox"  name="spkm_gg" <?= (!isset($item['spkm_gg']) || $item['spkm_gg'] == 0) ? '' : 'checked="checked"' ?>><br /><br />

    
</div>
	
	<b style="display:none;">Tình trạng: </b> <input  style="display:none;" type="checkbox" name="conhang" <?= (!isset($item['conhang']) || $item['conhang'] == 0) ? '' : 'checked="checked"' ?>> 
    
    <b style="display:none;">Sản phẩm quan tâm: </b> <input  style="display:none;" type="checkbox" name="spqt" <?= (!isset($item['spqt']) || $item['spqt'] == 0) ? '' : 'checked="checked"' ?>>
	
	
    <b style='display:none;'>Có phải Sản phẩm này là linh kiện không: </b><input type="checkbox" style='display:none;' name="linhkien" <?= (!isset($item['linhkien']) || $item['linhkien'] == 0) ? '' : 'checked="checked"' ?>>

    <b  style='display:none;'>Nhóm linh kiện(nếu không phải linh kiện thì không chọn phần này)</b>

    <?php
    echo "<select name=\"id_nlk\" id=\"id_cat\"  style='display:none;'>";

    print '<option value ="' . $item['id_nlk'] . '">Lựa chọn nhóm linh kiện </option>';


    for ($i = 0, $count = count($nlks); $i < $count; $i++) {
        print '<option value="' . $nlks[$i]['id_nlk'] . '">' . $nlks[$i]['tennlk'] . '</option><br/>';
    }

    echo "</select>";
    ?>
    
    <b>Sản phẩm xuất ra ngoài: </b> <input type="checkbox" name="publish" <?= (!isset($item['publish']) || $item['publish'] == 1) ? 'checked="checked"' : '' ?>><br />
    <br>
    <br>
<!--    menu doc-->
    
 <div style="display:none;">   
    <b>Chọn mục menu dọc</b>
    <select name="id_cap_mot" id="id_cat_cha">
        <option value="<?php echo $item['id_cap_mot']?>">Chọn menu cha</option>
        <?php 
            $sql = "select * from #_nhommuc where parentid = 0";
            $d->query($sql);
            $mang_cha = $d->result_array();
            for($i =0 ,$count = count($mang_cha); $i < $count ; $i++){
        ?>
        <option value="<?php echo $mang_cha[$i]['id'] ?>"><?php echo $mang_cha[$i]['loaitin'] ?></option>
        <?php 
            }
            ?>
		 <option value="0">Không chọn</option>	
    </select>
    <br>
    <br>
    
    
    <b>Chọn menu dọc con cấp 1</b>
    <select name="id_cap_hai" id="id_cat_con" class="quoc_ola">
        <?php 
           $sql = "select * from #_nhommuc where topmenu=0";
            $d->query($sql);
            $result = $d->result_array();
            foreach ($result as $value) {
                if ($value['parentid'] == 0) {
                    
        ?>
        <optgroup label="<?php echo $value['loaitin']; ?>">
            <option value="<?php echo $item['id_cap_hai'] ?>"></option>
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

	
	<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại 1:</label>
                      <div class="col-sm-8">
                       <img src="<?= _upload_sanpham . $item['image1'] ?>" alt="NO PHOTO"  width="150"/>
                      </div>
					  <?php if($item['image1']!=''){ ?>
					  <div class="col-sm-2">
					  	<a href="index.php?com=sp&act=delete_image&id=<?= @$item['id'] ?>&image=image1" onClick="if (!confirm('Xác nhận xóa Hình hiện tại 1'))
							return false;"><img src="media/images/delete.png" border="0" /></a>
					  </div>
                    <?php } ?>
                    </div>
				<?php } ?>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình 1:</label>
                      <div class="col-sm-10">
                        <input type="file" name="image1" />
                      </div>
                    </div>
					
				<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại 2:</label>
                      <div class="col-sm-8">
                       <img src="<?= _upload_sanpham . $item['image3'] ?>" alt="NO PHOTO"  width="150"/>
                      </div>
					  <?php if($item['image3']!=''){ ?>
					  <div class="col-sm-2">
					  	<a href="index.php?com=sp&act=delete_image&id=<?= @$item['id'] ?>&image=image3" onClick="if (!confirm('Xác nhận xóa Hình hiện tại 2'))
							return false;"><img src="media/images/delete.png" border="0" /></a>
					  </div>
                    <?php } ?>
                    </div>
				<?php } ?>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình 2:</label>
                      <div class="col-sm-10">
                        <input type="file" name="image3" />
                      </div>
                    </div>
					
				<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại 3:</label>
                      <div class="col-sm-8">
                       <img src="<?= _upload_sanpham . $item['image5'] ?>" alt="NO PHOTO"  width="150"/>
                      </div>
					  <?php if($item['image5']!=''){ ?>
					  <div class="col-sm-2">
					  	<a href="index.php?com=sp&act=delete_image&id=<?= @$item['id'] ?>&image=image5" onClick="if (!confirm('Xác nhận xóa Hình hiện tại 3'))
							return false;"><img src="media/images/delete.png" border="0" /></a>
					  </div>
                    <?php } ?>
                    </div>
				<?php } ?>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình 3:</label>
                      <div class="col-sm-10">
                        <input type="file" name="image5" />
                      </div>
                    </div>

<div style="display:none;">
	
	<b>Chọn menu con linh kiện cấp  2</b>
    <select name="id_cap_ba" id="id_cap_ba" class="quoc_ola">
       
	   <?php 
            $sql = "select * from #_nhommuc where parentid=0";
            $d->query($sql);
            $results = $d->result_array();
            foreach ($results as $values) {  
        ?>
        <optgroup label="<?php echo $values['loaitin']; ?>" style="color:#FF0000;">
	    <?php 
            $sql = "select * from #_nhommuc where parentid=".$values['id']." and topmenu=0";
            $d->query($sql);
            $result = $d->result_array();
            foreach ($result as $value) {  
        ?>
        <optgroup label="&raquo;<?php echo $value['loaitin']; ?>" >
            <option value="<?php echo @$item['id_cap_ba'] ?>"></option>
            <?php 
                $id = $value['id'];
				$sql1 = "select * from #_nhommuc where topmenu = ".$id;
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
    </select><br /><br>    <br /><br>    
	
		<b>Chọn mục menu cấp 1 (nếu chọn nhiều)</b>
    	<?php 
            $sql = "select * from #_nhommuc where parentid > 0";
            $d->query($sql);
            $mang_cha = $d->result_array();
            for($i =0 ,$count = count($mang_cha); $i < $count ; $i++){
        ?>
			<input type="checkbox" name="idthem[]" id="" <?php 
			if ($item['idthem'] !='') {
					$id_mang = explode(',',$item['idthem']);
					  foreach($id_mang as $valuemang) {
							if($valuemang == $mang_cha[$i]['id'] ){echo 'checked="checked"';}
					   }
				}	
			 ?> value="<?php echo $mang_cha[$i]['id'] ?>" style="width:25px; height:25px;" /><span class="timkiemten"><?php echo $mang_cha[$i]['loaitin'] ?></span>
		<?php 
           }
         ?>
	<br>
    <br>
	
	 <b>Thông số kỹ thuật:</b><br /><br>
	<textarea class="" name="thongso" id="nd" rows="100" cols="40"><?= @$item['thongso'] ?></textarea><br /><br>    
	
	<?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>File hướng dẫn sản phẩm hiện tại:</b><?=$item['photo']?><br />
	<?php }?>
    <br />
	<b>File hướng dẫn sản phẩm:</b> <input type="file" name="photo" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar" /><br /><br />
	
	<b>Tóm tắt sản phẩm</b><br /><br />
	 <textarea class="ckeditor" name="mota" cols="100" rows="5" id="mota"><?= @$item['mota'] ?></textarea><br /><br />
	
</div>	
	
    
    <br /><br>
	
	
	
    
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Mô tả sản phẩm</label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="chitiet"  rows="100" cols="40"><?= @$item['chitiet'] ?></textarea>
                      </div>
                    </div>
	
	 <script src="ckeditor/ckeditor.js"></script>

    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=sp&act=man'" class="btn" />
</form>

</div></div></div>