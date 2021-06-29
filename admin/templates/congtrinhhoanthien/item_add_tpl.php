<style>
    .quoc_ola {
    width: 202px;
}
</style>
<h3>Công trình hoàn thiện</h3>

<form name="frm" method="post" action="index.php?com=congtrinhhoanthien&act=save" enctype="multipart/form-data" class="nhaplieu">

    <br />

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại:</b><img src="<?= _upload_sanpham . $item['anh'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    
    
    <b>Hình ảnh:</b> <input type="file" name="file" /> <?= _news_type ?><br /><br />
    <b>Tên</b> <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /><br />
    <b>Tiêu đề</b>  <div><textarea name="tieude" cols="50" rows="3" id="tomtat"><?= @$item['tieude'] ?></textarea></div><br />
	<b>Chi tiết</b>  <div><textarea name="chitiet1" cols="50" rows="3" id="tomtat"><?= @$item['chitiet'] ?></textarea></div><br />
    <br>

    <b>Sản phẩm xuất ra ngoài: </b> <input type="checkbox" name="publish" <?= (!isset($item['publish']) || $item['publish'] == 1) ? 'checked="checked"' : '' ?>><br />
    <br>
    <br>
<!--    menu doc-->
    
    
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
    </select>
    <br>
    <br>
    
    
    <b>Chọn menu dọc</b>
    <select name="id_cap_hai" id="id_cat_con" class="quoc_ola">
        <?php 
            $sql = "select * from #_nhommuc";
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
    </select>
    <br>
    
    
    <br>
    
<!--    end menu doc-->
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 1:</b><img src="<?= _upload_sanpham . $item['image1'] ?>" alt="NO PHOTO"  width="150" /><br />
    <?php } ?>
   	 <br>
     <b>Hình chi tiết 1:</b> <input type="file" name="image1" />
   
 <br>
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 2:</b><img src="<?= _upload_sanpham . $item['image2'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
        <br>
     <b>Hình chi tiết 2:</b> <input type="file" name="image2"  />
  
 <br>
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 3:</b><img src="<?= _upload_sanpham . $item['image3'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
         <br>
     <b>Hình chi tiết 3:</b> <input type="file" name="image3"  /> 

 <br>
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 4:</b><img src="<?= _upload_sanpham . $item['image4'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
        <br>
     <b>Hình chi tiết 4:</b> <input type="file" name="image4"  /> 

 <br>
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 5:</b><img src="<?= _upload_sanpham . $item['image5'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?> <br>
    <b>Hình chi tiết 5:</b> <input type="file"  name="image5" /> 
 	 <br>
	 <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 6:</b><img src="<?= _upload_sanpham . $item['image6'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?> <br>
    <b>Hình chi tiết 6:</b> <input type="file"  name="image6" /> 
  <br>

    <script type=text/javascript>//CKEDITOR.replace( â€˜noi_dungâ€˜); </script>
    <?php
    include_once ('ckeditor/ckeditor.php');
    require_once ('ckfinder/ckfinder.php');
    $ckeditor = new CKEditor('chitiet'); //gá»� dá»� tuong truoc 
    $ckeditor->basePath = 'upload'; //lay duong dan mac dinh
    CKFinder::SetupCKEditor($ckeditor, 'ckfinder/');
    $ckeditor->replace("chitiet");
    ?>    

    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=congtrinhhoanthien&act=man'" class="btn" />
</form>