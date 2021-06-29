<!DOCTYPE html>
<html lang="vi">
<head>
<?php include('head.php'); ?>
<?php include('title.php'); ?>
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('ajax_loading.php'); include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1>Liên hệ </h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <li class="active">Liên hệ </li>
  </ol>
</section>
<section id="contact-page" class="container">
        <h3>
            <span>Liên Hệ</span>
        </h3>
        <div class="contact-desc">
            <p>331 QL1A, An Phú Đông, Quận 12, TP.HCM</p>
        </div>
        <div class="contact-info clearfix">
            <div class="contact-info-contnet">
                <div class="location col-md-4 col-xs-4">0382 397 969</div>
                <div class="phone col-md-4 col-xs-4">0928 729 117</div>
                <div class="email col-md-4 col-xs-4">
                    <a href="mailto:<?php echo $email_lienhe; ?>">nnguyenggiang0240@gmail.com</a>
                </div>
            </div>
        </div>

        <div class="contact-us-content col-md-12">
            <form id="contact-form" name="contact-form" action="#" novalidate="">
                <div class="row">
                    <div class="name-field col-md-6 col-xs-6">
                        <input type="text" id="txtFullname" name="name-field" placeholder="Tên *" required="" data-parsley-id="1890"><ul class="parsley-errors-list" id="parsley-id-1890"></ul>
                    </div>
                    <div class="email-field col-md-6 col-xs-6">
                        <input type="email" id="txtEmailInput" name="email-field" placeholder="Email *" required="" data-parsley-id="4497"><ul class="parsley-errors-list" id="parsley-id-4497"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="phone-field col-md-6 col-xs-6">
                        <input type="tel" id="txtTitle" name="phone" placeholder="SDT" data-parsley-id="2011"><ul class="parsley-errors-list" id="parsley-id-2011"></ul>
                    </div>
                    <div class="website-field col-md-6 col-xs-6">
                        <input type="url" id="address" name="address-field" placeholder="Address" data-parsley-id="9941"><ul class="parsley-errors-list" id="parsley-id-9941"></ul>
                    </div>
                </div>
                <div class="message-field row">
                    <textarea name="message-field" id="txtContent" placeholder="Lời Nhắn *" required="" data-parsley-id="9725"></textarea><ul class="parsley-errors-list" id="parsley-id-9725"></ul>
                    <input type="button" id="ctl00_uxSend" class="contact-submit btn colored" value="Gửi">
                </div>
            </form>
        </div>
    </section>
<?php include('footer.php'); ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#ctl00_uxSend').click(function(e){
			e.preventDefault();
			
			var txtFullname = jQuery('#txtFullname');
			var txtEmailInput = jQuery('#txtEmailInput');
			var txtTitle = jQuery('#txtTitle');
			var txtContent = jQuery('#txtContent');
			var ajax_loading = jQuery('#ajax_loading');
			
			if(txtFullname.val()==""){alert("Bạn chưa nhập tên"); txtFullname.focus();}
						else if(txtEmailInput.val()==""){alert("Bạn chưa nhập email"); txtEmailInput.focus();}
						
			else{
			
					var UrlToPass = 'action=gui&lienhe_hoten='+txtFullname.val()+'&lienhe_email='+txtEmailInput.val()+'&lienhe_noidung='+txtContent.val()+'&lienhe_tieude='+txtTitle.val();
							//console.log(UrlToPass);
							ajax_loading.removeClass('hidden');
							jQuery.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
								type : 'POST',
								data : UrlToPass,
								url  : 'lienhe_xuly.php',
								success: function(responseText){ // Get the result and asign to each cases
									//alert(responseText);
									if(responseText == 2){
										ajax_loading.addClass('hidden');
										alert("Email không hợp lệ, vui lòng nhập lại");
										txtEmailInput.focus();
									}
									else if(responseText == 1){ ajax_loading.addClass('hidden');alert("Liên hệ thành công, cảm ơn bạn!");
										window.location = "lien-he.html";}
									else if(responseText == 4){ ajax_loading.addClass('hidden');alert("có lỗi trong quá trình liên hệ, hãy thử lại");}
								}
							});
							
						}				
			
		});
	});
</script>
</body>
</html>
