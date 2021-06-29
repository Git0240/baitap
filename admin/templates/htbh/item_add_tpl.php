<h3>Thông tin hỗ trợ đại lý</h3>

<form name="frm" method="post" action="index.php?com=htbh&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên: </b>
    <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /><br /><br/>
    
	<b>Xin lựa chọn chủ đề:</b>
    <?php  
    echo "<select name=\"id_menu\" id=\"id_menu\">";

    print '<option value ="' . $item['id_menu'] . '">lựa chọn chủ đề</option>';

    for ($i = 0, $count = count($item_nhomtin); $i < $count; $i++) {
        print '<option value="' . $item_nhomtin[$i]['id'] . '">' . $item_nhomtin[$i]['loaitin'] . '</option><br/>';
    }
	print '<option value ="0">Không chọn</option>';
    echo "</select>";
    ?>

   <br/><br/>


    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=htbh&act=man'" class="btn" />
</form>