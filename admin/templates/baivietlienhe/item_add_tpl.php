  <div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin về bài Bài viết liên hệ</h3></div><!-- /.box-header -->
                <div class="box-body">
				
<form name="frm" method="post" action="index.php?com=baivietlienhe&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">
    
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="tieude " name="tieude" value="<?= @$item_mot['tieude'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Slogan </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Slogan " name="ten1" value="<?= @$item_mot['ten1'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Địa chỉ " name="diachi" value="<?= @$item_mot['diachi'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Điện thoại </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Điện thoại " name="dienthoai" value="<?= @$item_mot['dienthoai'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email " name="email" value="<?= @$item_mot['email'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">hotline </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="hotline " name="hotline" value="<?= @$item_mot['hotline'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">face </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="face " name="face" value="<?= @$item_mot['face'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">google </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="google " name="google" value="<?= @$item_mot['google'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Link Youtube </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Link Youtube " name="you" value="<?= @$item_mot['you'] ?>">
                      </div>
                    </div>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Twitter</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Twitter " name="twitter" value="<?= @$item_mot['twitter'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">instagram</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="instagram " name="instagram" value="<?= @$item_mot['instagram'] ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Zalo</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Zalo " name="sozalo" value="<?= @$item_mot['sozalo'] ?>">
                      </div>
                    </div>

	
	
	
	
<div style="display:none;">

	<b>địa chỉ thành viên</b>
	<input type="text" name="sothanhvien" value="<?=@$item_mot_mot['sothanhvien']?>" class="input" /><br /><br />
	
	
	<b>Số hợp tác</b>
	<input type="text" name="sohoptac" value="<?=@$item_mot_mot['sohoptac']?>" class="input" /><br /><br />
	<b>Hợp tác</b>
	<input type="text" name="hoptac" value="<?=@$item_mot_mot['hoptac']?>" class="input" /><br /><br />
	
	<b>Số phân phối</b>
	<input type="text" name="sophanphoi" value="<?=@$item_mot_mot['sophanphoi']?>" class="input" /><br /><br />
	<b>Phân phối</b>
	<input type="text" name="phanphoi" value="<?=@$item_mot_mot['phanphoi']?>" class="input" /><br /><br />
	<b>Tên thành viên</b>
	<input type="text" name="ten2" value="<?=@$item_mot_mot['ten2']?>" class="input" /><br /><br />
	<b>Địa chỉ khách hàng</b>
	<input type="text" name="thanhvien" value="<?=@$item_mot_mot['thanhvien']?>" class="input" /><br /><br />
</div>	
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Giới thiệu</label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="danhgia"  rows="100" cols="40"><?= @$item_mot['danhgia'] ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Phòng nghỉ</label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="sanpham"  rows="100" cols="40"><?= @$item_mot['sanpham'] ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Giới thiệu trang chủ</label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="gioithieu"  rows="100" cols="40"><?= @$item_mot['gioithieu'] ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tóm tắt</label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="tomtat"  rows="100" cols="40"><?= @$item_mot['tomtat'] ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Bản đồ </label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="timkiem"  rows="100" cols="40"><?= @$item_mot['timkiem'] ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Vị trí </label>
                      <div class="col-sm-12">
                        <textarea class="ckeditor" name="noidung"  rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
                      </div>
                    </div>
	


     <script src="ckeditor/ckeditor.js"></script>
	 
    <input type="hidden" name="id" id="id" value="<?=@$item_mot_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=baivietlienhe&act=man'" class="btn" />
</form>
</div>
</div></div>