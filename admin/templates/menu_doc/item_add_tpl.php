<h3>Thêm mới</h3>

<form name="frm" method="post" action="index.php?com=menu_doc&act=save" enctype="multipart/form-data" class="nhaplieu">
   
	<b>Tên menu </b>
    <input type="text" name="loaitin" value="<?= @$item['loaitin'] ?>" class="input" /><br /><br />
	
	<b>url Tên menu </b>
    <input type="text" name="url" value="<?= @$item['url'] ?>" class="input" /><br /><br />
	
	<b>Ưu tiên menu (nhỏ đứng trước) </b>
    <input type="text" name="uutien" value="<?= @$item['uutien'] ?>" class="input" /><br /><br />
	
	<?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết:</b><img src="<?= _upload_sanpham . $item['image1'] ?>" alt="NO PHOTO"  width="150" /><br /><br />
    <?php } ?>
  
     <b>Hình chi tiết:</b> <input type="file" name="image1"/>   
	<br /><br />
	
	<b>Chọn menu cha(Chỉ áp dụng cho menu cấp 1)</b>

    <?php
    
    echo "<select name=\"parentid\" id=\"parentid\" >"; // chon menu cha

    print '<option value="' . @$item['parentid'] . '">Menu Chính </option>';


    for ($i = 0, $count = count($items); $i < $count; $i++) {
        print '<option value="' . $items[$i]['id'] . '">' . $items[$i]['loaitin'] . '</option><br/>'; // chọn lai
    }
	print '<option value="0">Không chọn</option>';
	
    echo "</select>";
    ?>
	<br /><br />
	
	
	
	<b>nổi bật trang chủ: </b><input type="checkbox" name="noibat" <?= (!isset($item['noibat']) || $item['noibat'] == 0) ? '' : 'checked="checked"' ?>><br /><br />
	
	 <b>SẢN PHẨM ĐẶC TRƯNG: </b><input type="checkbox" name="hot" <?= (!isset($item['hot']) || $item['hot'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
<div style="display:none;">	  
		<b>Chọn menu cha(Chỉ áp dụng cho menu con câp 2)</b>	 
    <select name="topmenu" id="topmenu" class="quoc_ola">
        <?php 
            $sql = "select * from #_nhommuc where topmenu=0";
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
   
   	<b>Menu trên: </b><input type="checkbox" name="menutren" <?= (!isset($item['menutren']) || $item['menutren'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>Menu trái: </b><input type="checkbox" name="trai" <?= (!isset($item['trai']) || $item['trai'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
   
   
  
	
	<b>Sale: </b><input type="checkbox" name="sale" <?= (!isset($item['sale']) || $item['sale'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>New: </b><input type="checkbox" name="new" <?= (!isset($item['new']) || $item['new'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	
  	<b>Giá trị dinh dưỡng trên 100 gr</b><br /><br />
    <textarea class="" name="dinhduong" id="nd" rows="5" cols="100"><?= @$item['dinhduong'] ?></textarea><br /><br />

	
 </div>   

	<b>Mô tả</b><br /><br />
    <textarea class="ckeditor" name="mota" id="nd" rows="5" cols="100"><?= @$item['mota'] ?></textarea><br /><br />
	
	

    <script src="ckeditor/ckeditor.js"></script>
	
    <br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
	
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=menu_doc&act=man'" class="btn" />
</form>