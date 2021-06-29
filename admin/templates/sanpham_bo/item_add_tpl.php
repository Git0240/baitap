<h3>Thêm sản phẩm</h3>

<form name="frm" method="post" action="index.php?com=sp&act=save" enctype="multipart/form-data" class="nhaplieu">


    <br />

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại:</b><img src="<?= _upload_sanpham . $item['anh'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    
    
    <b>Hình ảnh:</b> <input type="file" name="file" /> <?= _news_type ?><br /><br />
    <b>Tên sản phẩm</b> <input type="text" name="tensp" value="<?= @$item['tensp'] ?>" class="input" /><br />
    <b>Tóm tắt</b>  <div><textarea name="tomtat" cols="50" rows="3" id="tomtat"><?= @$item['tomtat'] ?></textarea></div><br />
    <b>Giá</b> <input type="text" name="gia" value="<?= @$item['gia'] ?>" class="input" /><br />
    <br>

    <b>Hãng sản xuất:</b>
    <?php
    echo "<select name=\"id_hang\" id=\"id_cat\">";

    print '<option value ="' . $item['id_hang'] . '">Lựa chọn hãng sản xuất </option>';


    for ($i = 0, $count = count($hangs); $i < $count; $i++) {
        print '<option value="' . $hangs[$i]['id_hang'] . '">' . $hangs[$i]['tenhang'] . '</option><br/>';
    }

    echo "</select>";
    ?>
    <br>
    <br>
    <b>Khoảng giá:</b>
    <?php
    echo "<select name=\"id_kg\" id=\"id_cat\">";

    print '<option value ="' . $item['id_kg'] . '">Lựa chọn khoảng giá </option>';


    for ($i = 0, $count = count($kgs); $i < $count; $i++) {
        print '<option value="' . $kgs[$i]['id_kg'] . '">' . $kgs[$i]['tenkg'] . '</option><br/>';
    }

    echo "</select>";
    ?>
    <br>
    <br>
    <b>Khuyến mãi</b>
    <input type="text" name="km" value="<?= @$item['km'] ?>" class="input" /><br />
    <br>
    <b>Hệ điều hành:</b>

    <?php
    echo "<select name=\"id_hdh\" id=\"id_cat\">";

    print '<option value ="' . $item['id_hdh'] . '">Lựa chọn hệ điều hành </option>';


    for ($i = 0, $count = count($hdhs); $i < $count; $i++) {
        print '<option value="' . $hdhs[$i]['id_hdh'] . '">' . $hdhs[$i]['tenhdh'] . '</option><br/>';
    }

    echo "</select>";
    ?>
    <br>

    <br>
    <b>Sản phẩm hot: </b> <input type="checkbox" name="sphot" <?= (!isset($item['sphot']) || $item['sphot'] == 1) ? 'checked="checked"' : '' ?>><br />
    <br>
    <b>Sản phẩm Khuyến mãi - giảm giá: </b> <input type="checkbox" name="spkm_gg" <?= (!isset($item['spkm_gg']) || $item['spkm_gg'] == 1) ? 'checked="checked"' : '' ?>><br /><br>

    <b>Sản phẩm bán nhiều nhất: </b> <input type="checkbox" name="spbn" <?= (!isset($item['spbn']) || $item['spbn'] == 1) ? 'checked="checked"' : '' ?>><br />
    <br>
    <b>Sản phẩm nhiều người quan tâm nhất: </b> <input type="checkbox" name="spqt" <?= (!isset($item['spqt']) || $item['spqt'] == 1) ? 'checked="checked"' : '' ?>><br />
    <br>

    <br>
    <b>Có phải sản phẩm này là linh kiện không: </b><input type="checkbox" name="linhkien" <?= (!isset($item['linhkien']) || $item['linhkien'] == 0) ? '' : 'checked="checked"' ?>><br />

    <br>

    <b>Nhóm linh kiện(nếu không phải linh kiện thì không chọn phần này)</b>

    <?php
    echo "<select name=\"id_nlk\" id=\"id_cat\">";

    print '<option value ="' . $item['id_nlk'] . '">Lựa chọn nhóm linh kiện </option>';


    for ($i = 0, $count = count($nlks); $i < $count; $i++) {
        print '<option value="' . $nlks[$i]['id_nlk'] . '">' . $nlks[$i]['tennlk'] . '</option><br/>';
    }

    echo "</select>";
    ?>
    <br>
    <br>
    <b>Sản phẩm xuất ra ngoài: </b> <input type="checkbox" name="publish" <?= (!isset($item['publish']) || $item['publish'] == 1) ? 'checked="checked"' : '' ?>><br />
    <br>
    <br>

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 1:</b><img src="<?= _upload_sanpham . $item['image1'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br>
     <b>Hình chi tiết 1:</b> <input type="file" name="image1" /><br /><br />
    <br>
    <br>

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 2:</b><img src="<?= _upload_sanpham . $item['image2'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
        <br>
     <b>Hình chi tiết 2:</b> <input type="file" name="image2" /><br /><br />
     <br>
    <br>

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 3:</b><img src="<?= _upload_sanpham . $item['image3'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
        <br>
     <b>Hình chi tiết 3:</b> <input type="file" name="image3" /> <br /><br />
    <br>
    <br>
     <br>
    <br>

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 4:</b><img src="<?= _upload_sanpham . $item['image4'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
        <br>
     <b>Hình chi tiết 4:</b> <input type="file" name="image4" /> <br /><br />
    <br>
    <br>

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại chi tiết một 5:</b><img src="<?= _upload_sanpham . $item['image5'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <b>Hình chi tiết 5:</b> <input type="file" name="image5" /> <br /><br />
    <br>
    <br>
    <b>Chi tiết</b>

    <br>

    <p>
        <textarea class="ckeditor_quoc" name="chitiet" id="nd" rows="100" cols="40"><?= @$item['chitiet'] ?></textarea>
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
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=sp&act=man'" class="btn" />
</form>