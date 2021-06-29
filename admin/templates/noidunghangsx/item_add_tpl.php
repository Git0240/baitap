<h3>Thông tin về bài giới thiệu</h3>
<form name="frm" method="post" action="index.php?com=noidunghangsx&act=save" enctype="multipart/form-data" class="nhaplieu">
    
    <b>Tiêu đề</b>
	<input type="text" name="tieude" value="<?=@$item_mot['tieude']?>" class="input" /><br />
    

        <b>Nội dung bài viết</b>
   
    <p>
        <textarea class="ckeditor_quoc" name="noidung" id="nd" rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
    </p>
	<?php include('../ketnoi.php');
		$sql = mysql_query("select * from table_hangsx order by id_hang DESC");
		if(mysql_num_rows($sql)>0){
		$res = mysql_fetch_object($sql);
		
	?>
	<p>
        <select id="id_hang" name="id_hang">
		<?php do{ ?>
			<option value="<?php echo $res->id_hang;?>"><?php echo $res->tenhang; ?></option>
		<?php }while($res = mysql_fetch_object($sql));?>
		</select>
    </p>
	<?php 
		
		}//row
	?>
	
	
    <script type=text/javascript>//CKEDITOR.replace( â€˜noi_dungâ€˜); </script>
    <?php
    include_once ('ckeditor/ckeditor.php');
    require_once ('ckfinder/ckfinder.php');
    $ckeditor = new CKEditor('chitiet'); //gá»� dá»� tuong truoc 
    $ckeditor->basePath = '/images/'; //lay duong dan mac dinh
    CKFinder::SetupCKEditor($ckeditor, 'ckfinder/');
    $ckeditor->replace("noidung");

//chen file php vo  trong trang wweb
    ?>  
    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=noidunghangsx&act=man'" class="btn" />
</form>