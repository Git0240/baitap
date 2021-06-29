<h3>Thông tin</h3>

<form name="frm" method="post" action="index.php?com=traodoinoibo&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Ho ten</b>
    <input type="text" name="ho_ten" value="<?=@$item_mot['ho_ten']?>" class="input" /><br />
	<b>Chuc danh</b>
	<input type="text" name="chuc_danh" value="<?=@$item_mot['chuc_danh']?>" class="input" /><br />
    <b>Cong ty</b>
    <input type="text" name="cong_ty" value="<?=@$item_mot['cong_ty']?>" class="input" /><br />
    <b>Dia chi</b>
    <input type="text" name="dia_chi" value="<?=@$item_mot['dia_chi']?>" class="input" /><br />
	<b>Ma quoc gia</b>
    <input type="text" name="ma_quocgia" value="<?=$item_mot['ma_quocgia']?>" class="input" /><br>
    <b>Xin lua chon quoc gia</b>
    <?php

    echo "<select name=\"ma_quocgia\" id=\"ma_quocgia\">";
          print '<option value="rong">&nbsp;</option>';


   for($i = 0, $count = count($item_quocgia); $i < $count;$i++)
    {
        print '<option value="'.$item_quocgia[$i]['ma_quocgia'].'">'.$item_quocgia[$i]['ten'].'</option><br/>';
    }

    echo "</select>";

    ?>
    <br/>
    <b>Dien thoai</b>
    <input type="text" name="dienthoai" value="<?=$item_mot['dienthoai']?>" class="input" /><br>
    <b>Fax</b>
    <input type="text" name="fax" value="<?=$item_mot['fax']?>" class="input" /><br>
    <b>Email</b>
    <input type="text" name="email" value="<?=$item_mot['email']?>" class="input" /><br>
    <b>noi dung</b>
    <div>
        <?php
        $oFCKeditor = new FCKeditor('noidung') ;
        $oFCKeditor->BasePath	= $sBasePath ;
        $oFCKeditor->Height		= 300;
        $oFCKeditor->Value		= $item_mot['noidung'];
        $oFCKeditor->Create() ;
        ?></div>

    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=yahoo&act=man'" class="btn" />
</form>