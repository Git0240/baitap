<style>
    .quoc_ola {
    width: 202px;
}
</style>
<h3>Thêm loại sản phẩm</h3>

<form name="frm" method="post" action="index.php?com=chitiet_menu&act=save" enctype="multipart/form-data" class="nhaplieu">

<!--    menu doc-->
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
   
    <b>Chi tiết</b>

   

    <p>
        <textarea class="ckeditor_quoc" name="chitiet" id="nd" rows="100" cols="40"><?= @$item['noidung'] ?></textarea>
    </p>

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
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=chitiet_menu&act=man'" class="btn" />
</form>