<h3>Thông tin Tài liệu</h3>

<form name="frm" method="post" action="index.php?com=tailieu&act=save" enctype="multipart/form-data" class="nhaplieu">

	<b>Tên</b>
	<input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /><br />
	
	<?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại:</b><img src="<?= _upload_sl . $item['image'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Hình ảnh:(<span style="color:#FF0000;">*</span>)</b> <input type="file" name="image" /> <?= _news_type ?><br /><br />
	
	<?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>File hiện tại:</b><?=$item['photo']?><br />
	<?php }?>
    <br />
	<b>File:</b> <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar" /><br /><br />

<div style="display:none;">	
	<b>Menu DOWNLOAD:(<span style="color:#FF0000;">*</span>)</b>
    <?php
    echo "<select name=\"id_menu\" id=\"id_menu\">";
	
    print '<option value ="' . @$item['id_menu'] . '">Lựa chọn menu DOWNLOAD</option>';

    for ($i = 0, $count = count($htkd); $i < $count; $i++) {
        print '<option value="' . $htkd[$i]['id'] . '">' . $htkd[$i]['ten'] . '</option><br/>';
    }
	print '<option value="0">Không chọn</option>';
    echo "</select>";
    ?>
	<br /><br />
</div>
	
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=tailieu&act=man'" class="btn" />
</form>