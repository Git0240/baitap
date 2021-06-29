
<div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thành viên</h3></div><!-- /.box-header -->
                <div class="box-body">

<script language="javascript">
function js_submit(){
	if(isEmpty(document.frm.username, "Chưa nhập tên đăng nhập.")){
		return false;
	}
	
	if(isEmpty(document.frm.oldpassword, "Chưa nhập mật khẩu cũ.")){
		return false;
	}
	
	if(!isEmpty(document.frm.new_pass) && document.frm.new_pass.value.length<5){
		alert("Mật khẩu phải nhiều hơn 4 ký tự.");
		document.frm.new_pass.focus();
		return false;
	}
	
	if(!isEmpty(document.frm.new_pass) && document.frm.new_pass.value!=document.frm.renew_pass.value){
		alert("Nhập lại mật khẩu mới không chính xác.");
		document.frm.renew_pass.focus();
		return false;
	}
	
	if(!isEmpty(document.frm.email) && !check_email(document.frm.email.value)){
		alert('Email không hợp lệ.');
		document.frm.email.focus();
		return false;
	}
}
</script>
<h3>Tài khoản admin</h3>

<form name="frm" method="post" action="index.php?com=user&act=admin_edit" enctype="multipart/form-data" class="nhaplieu form-horizontal" onSubmit="return js_submit();">


					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên đăng nhập</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tên đăng nhập" name="username" value="<?=$item['username']?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Mật khẩu" name="oldpassword">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu mới</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Mật khẩu mới" name="new_pass">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nhập lại mật khẩu mới</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Nhập lại mật khẩu mớii" name="renew_pass">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Họ tên</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Họ tên" name="ten" value="<?=$item['ten']?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?=$item['email']?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Yahoo nickname</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Yahoo nickname" name="nick_yahoo" value="<?=$item['nick_yahoo']?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Skype nickname</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Skype nickname" name="nick_skype" value="<?=$item['nick_skype']?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Điện thoại</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="Điện thoại" name="dienthoai" value="<?=$item['dienthoai']?>">
                      </div>
                    </div>

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn btn-primary" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php'" class="btn btn-primary" />
</form>

</div></div></div>