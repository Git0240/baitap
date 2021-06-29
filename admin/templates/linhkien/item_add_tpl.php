<h3>Thông tin linh kiện</h3>

<form name="frm" method="post" action="index.php?com=lk&act=save" enctype="multipart/form-data" class="nhaplieu">


    <br />
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại:</b><img src="<?= _upload_linhkien . $item['anh'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Hình ảnh:</b> <input type="file" name="file" /> <?= _news_type ?><br /><br />


    <b>Tiêu đề</b> <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /><br />


    <b>Xin lựa chọn nhóm linh kiện:</b>
    <?php
    echo "<select name=\"id_nlk\" id=\"id_nlk\">";

    print '<option value ="' . $item['id_nlk'] . '">lựa chọn nhóm linh kiện</option>';


    for ($i = 0, $count = count($nhomlks); $i < $count; $i++) {
        print '<option value="' . $nhomlks[$i]['id_nlk'] . '">' . $nhomlks[$i]['tennlk'] . '</option><br/>';
    }

    echo "</select>";
    ?>
    <br>
    <br>
    <b>tóm tắt</b>
    <div><textarea name="tomtat" cols="50" rows="3" id="mota_vi"><?= @$item['tomtat'] ?></textarea></div>
    <br>
    <b>Giá</b> <input type="text" name="gia" value="<?= @$item['gia'] ?>" class="input" /><br />
    
    
    <b>Chi tiết</b>
     

    <p>
        <textarea class="ckeditor_quoc" name="chitiet" id="nd" rows="100" cols="40"><?= @$item['chitiet'] ?></textarea>
    </p>

    <script type=text/javascript>//CKEDITOR.replace( â€˜noi_dungâ€˜); </script>
    <?php
    include_once ('ckeditor/ckeditor.php');
    require_once ('ckfinder/ckfinder.php');
    $ckeditor = new CKEditor('chitiet'); //gá»� dá»� tuong truoc 
    $ckeditor->basePath = '/images/'; //lay duong dan mac dinh
    CKFinder::SetupCKEditor($ckeditor, 'ckfinder/');
    $ckeditor->replace("chitiet");

//chen file php vo  trong trang wweb
    ?>    

    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=news&act=man'" class="btn" />
</form>