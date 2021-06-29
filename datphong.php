<!DOCTYPE html>
<html lang="vi">
<head>
<?php include('head.php'); ?>
<?php include('title.php'); ?>
<?php 
	$QRoomNum='';$QUserNum='';$QRoomTypes='';$from=''; $to='';
	
		if(isset($_GET['QRoomNum']) && $_GET['QRoomNum']!=''){
			$QRoomNum = $_GET['QRoomNum'];
			$QRoomNum = str_replace('"','',$QRoomNum);
			$QRoomNum = str_replace("'",'',$QRoomNum);	
		}
		
		if(isset($_GET['QUserNum']) && $_GET['QUserNum']!=''){
			$QUserNum = $_GET['QUserNum'];
			$QUserNum = str_replace('"','',$QUserNum);
			$QUserNum = str_replace("'",'',$QUserNum);	
		}
		
		if(isset($_GET['QRoomTypes']) && $_GET['QRoomTypes']!=''){
			$QRoomTypes = $_GET['QRoomTypes'];
			$QRoomTypes = str_replace('"','',$QRoomTypes);
			$QRoomTypes = str_replace("'",'',$QRoomTypes);	
		}
		
		if(isset($_GET['from']) && $_GET['from']!=''){
			$from = $_GET['from'];
			$from = str_replace('"','',$from);
			$from = str_replace("'",'',$from);	
		}
		
		if(isset($_GET['to']) && $_GET['to']!=''){
			$to = $_GET['to'];
			$to = str_replace('"','',$to);
			$to = str_replace("'",'',$to);	
		}

?>
</head>
<body class="drawer drawer--left inner-page layout-switch">
<?php include('ajax_loading.php'); include('header.php'); ?>
<section id="internal-title" class="" data-background="parallax" style="background-attachment: fixed; background-position: 50% -1px;">
  <h1>Đặt phòng </h1>
  <ol class="breadcrumb">
    <li> <a href="index.html">Trang Chủ</a> </li>
    <li class="active">Đặt phòng </li>
  </ol>
</section>
<input name="ctl00$Content$Key" type="hidden" id="Content_Key" data-Room="<?php echo $QRoomNum; ?>" data-User="<?php echo $QUserNum; ?>" data-Type="<?php echo $QRoomTypes; ?>" data-From="<?php echo str_replace('x','/',$from); ?>" data-To="<?php echo str_replace('x','/',$to); ?>" />
<section id="columns" class="padding-bottom">
        <!-- Booking Main Container -->
        <div class="container booking-container">
            <!-- The tabular structure uses the Bootstrap tab structure! -->
            <ul class="nav nav-tabs nav-justified" id="booking-tabs">
                <!-- Booking Tabs -->
                <li class="active">
                    <!-- Add Active class for the active tab -->
                    <a href="#booking-choose-date" data-toggle="tab"><span class="number"><b>1</b></span><!-- Tab number -->
                        <span class="title">Chọn ngày</span><!-- Tab title -->
                    </a>
                </li>
                <li>
                    <a href="#booking-choose-room" data-toggle="tab"><span class="number"><b>2</b></span><!-- Tab number -->
                        <span class="title">Chọn phòng</span><!-- Tab title -->
                    </a>
                </li>
                <li>
                    <a href="#booking-reservation" data-toggle="tab"><span class="number"><b>3</b></span><!-- Tab number -->
                        <span class="title">Đặt phòng</span><!-- Tab title -->
                    </a>
                </li>
                <li>
                    <a href="#booking-confirmation" data-toggle="tab"><span class="number"><b>4</b></span><!-- Tab number -->
                        <span class="title">Xác nhận</span><!-- Tab title -->
                    </a>
                </li>
            </ul>
            <!-- Tab main content container -->
            <div id="booking-tab-contents" class="tab-content">
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fade in active" id="booking-choose-date">
                    <!-- Check In / Check Out section -->
                    <div class="input-daterange booking-dates">
                        <div class="booking-date-fields-container FromDate col-xs-6">
                            <!-- Do NOT change the "booking-date-fields-container" Class -->
                            <h5>
                                <span>Từ ngày</span>
                            </h5>
                        </div>
                        <div class="booking-date-fields-container ToDate col-xs-6">
                            <!-- Do NOT change the "booking-date-fields-container" Class -->
                            <h5>
                                <span>Đến ngày</span>
                            </h5>
                        </div>
                    </div>
                    <div class="more-details-container clearfix">
                        <h4>
                            <span>Thông tin thêm</span>
                        </h4>
                        <!-- Other Section Title -->
                        <div class="rooms-container col-xs-6 col-md-6">
                            <label for="RoomNum">Số lượng phòng:</label>
                            <input type="text" value="" id="RoomNum" />
                        </div>
                        <div class="rooms-container col-xs-6 col-md-6">
                            <label for="UserNum">Số lượng khách:</label>
                            <input type="text" value="" id="UserNum" />
                        </div>

                    </div>
                    <button onclick="activaTab('booking-choose-room')" class="btn btn-md colored">Tiếp tục</button>
                </div>
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fade" id="booking-choose-room">
                    <section id="rooms">
                        <div id="roomLoader" class="clearfix">
                            <div class="loader"></div>
                            <div class="close-icon"></div>
                            <div id="roomLoader-container"></div>
                        </div>
                        <!-- Property Detail's Loader ( DO NOT remove this section) -->
                        <!-- Main Room container -->
                        <ul class="property-container prp-ajax-loader clearfix" id="ListRoomId">
<?php include ('ketnoi.php');
	$sql = mysqli_query($con,"select * from table_sanpham where spbn=1 and publish = 1 order by id ");
	$row = mysqli_num_rows($sql);
		if($row>0){	
		$res = mysqli_fetch_object($sql);
			do{
 ?>        
		<li class="property-boxes col-xs-6 col-md-4" data-animation="fadeInLeft" data-animation-delay=".0">
          <div class="prp-img"> <img src="media/upload/sanpham/<?php echo $res->anh; ?>" alt="<?php echo $res->tensp;?>">
            <div class="price"> <span><?php if($res->gia >0){ ?><?php echo number_format($res->gia); ?>&nbsp;<?php echo $menhgia_sanpham; ?><?php } ?></span> </div>
          </div>
          <div class="prp-detail">
            <div class="title"><?php echo $res->tensp;?></div>
            <div class="title title_des">Diện tích: <?php echo $res->masp;?></div>
            <div class="description"><?php echo $res->tomtat;?></div>
			<a href="room/<?php echo $res->url ;?>.html" class="more-detail btn colored">Chi Tiết </a> </div>
        </li>
<?php	include ('ketnoi.php');	
			}while($res = mysqli_fetch_object($sql));
		}
?>							
                        </ul>
                        <div class="rooms-container col-xs-6 col-md-6">
                            <label for="RoomType">Loại Phòng:</label>
                            <select id="RoomType">
							<option value='Chưa chọn loại phòng' >Chọn loại phòng</option>
<?php include ('ketnoi.php');	
	$sql = mysqli_query($con,"select * from table_sanpham where publish = 1 order by id");
	$row = mysqli_num_rows($sql);
		if($row>0){	
		$res = mysqli_fetch_object($sql);
			do{
 ?>			
            <option value='<?php echo $res->tensp;?>' <?php if($QRoomTypes ==$res->id){echo ' selected="selected"';} ?> ><?php echo $res->tensp;?></option>
<?php		include ('ketnoi.php');	
			}while($res = mysqli_fetch_object($sql));
		}
?>
							</select>
                        </div>
                        <button onclick="activaTab('booking-reservation')" class="btn btn-md colored">Tiếp tục</button>
                        <!-- End of Main Room container -->
                    </section>
                </div>
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fade" id="booking-reservation">
                    <!-- Guest Info form -->
                    <h4>
                        <span>Thông tin khách hàng</span>
                    </h4>
                    <div class="row">
                        <div class="field-container col-xs-6 col-md-4">
                            <input id="rFname" type="text" placeholder="Tên *"><!-- Last Name Field -->
                        </div>
                        <div class="field-container col-xs-12 col-md-4">
                            <input id="rEmail" type="email" placeholder="Email *"><!-- Email Field -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="field-container col-xs-6 col-md-4">
                            <input id="rPhone" type="tel" placeholder="Điện thoại *"><!-- Phone Field -->
                        </div>
                        <div class="field-container col-xs-6 col-md-4">
                            <input id="rCity" type="text" placeholder="Thành phố"><!-- City Field -->
                        </div>
                        <div class="field-container col-xs-12 col-md-4">
                            <input id="rAddress" type="text" placeholder="Địa chỉ"><!-- Address Field -->
                        </div>
                    </div>
                    <div class="field-container row message-field">
                        <textarea id="message-field" placeholder="Ghi chú"></textarea><!-- Special Requirements Field -->
                    </div>
                    <!-- End of Terms and Condition Box -->
                    <button id="ctl00_uxSend" class="btn btn-md colored">Đặt phòng</button>
                    <!-- End of Guest Info form -->
                </div>
                <!-- Tab Contents ( Do Not Change / Remove the ID) -->
                <div class="tab-pane fade" id="booking-confirmation">
                    <h3>
                        <span>Xác nhận của khách sạn!</span>
                    </h3>
                    <p>
                        Khách sạn sẽ gửi mail xác nhận đặt phòng hoặc liên hệ trực tiếp qua SĐT cá nhân trong vòng 24h. 
                        <br>
                        Để biết thêm chi tiết vui lòng liên hệ HOTLINE : 0382 397 969
                        
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- TOP FOOTER -->
<input type="hidden" id="rtSource"
        data-room="Loại Phòng"
        data-square="Diện tích"
        data-bed="Giường" />

<?php include('footer.php'); ?>
<script>
		jQuery("#booking-tab-contents .booking-dates").datepicker({
            format: "mm-dd-yyyy",
            inputs: jQuery('.booking-date-fields-container')
        });
		
		$('#RoomNum').val($('#Content_Key').data('room'));
        $('#UserNum').val($('#Content_Key').data('user'));
        jQuery('.FromDate').datepicker('setDate', $('#Content_Key').data('from'));
        jQuery('.ToDate').datepicker('setDate', $('#Content_Key').data('to'));
        var rID = $('#Content_Key').data('type');

		function activaTab(tab) {
            $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        };
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#ctl00_uxSend').click(function(e){
			e.preventDefault();
			
			var txtFullname = jQuery('#rFname');
			var txtEmailInput = jQuery('#rEmail');
			var txtTitle = jQuery('#rPhone');
			var txtContent = jQuery('#message-field');	
			
			var rCity = jQuery('#rCity');
			var rAddress = jQuery('#rAddress');
			var RoomType = jQuery('#RoomType');		
			var QRoomNum = '<?php echo $QRoomNum; ?>';
			var QUserNum = '<?php echo $QUserNum; ?>';
			var Tungay = '<?php echo str_replace('x','/',$from); ?>';
			var Denngay = '<?php echo str_replace('x','/',$to); ?>';
			
			
			var ajax_loading = jQuery('#ajax_loading');
			
			if(txtFullname.val()==""){alert("Bạn chưa nhập tên"); txtFullname.focus();}
			else if(txtEmailInput.val()==""){alert("Bạn chưa nhập email"); txtEmailInput.focus();}
			else if(txtTitle.val()==""){alert("Bạn chưa nhập số điện thoại"); txtTitle.focus();}
						
			else{
			
					var UrlToPass = 'action=gui_datphong&lienhe_hoten='+txtFullname.val()+'&lienhe_email='+txtEmailInput.val()+'&lienhe_noidung='+txtContent.val()+'&lienhe_tieude='+txtTitle.val()
					+'&lienhe_thanhpho='+rCity.val()+'&lienhe_diachi='+rAddress.val()+'&lienhe_loaiphong='+RoomType.val()+'&lienhe_sophong='+QRoomNum
					+'&lienhe_sokhach='+QUserNum+'&lienhe_Tungay='+Tungay+'&lienhe_Denngay='+Denngay;
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
									else if(responseText == 1){ ajax_loading.addClass('hidden');alert("Đặt phòng thành công, cảm ơn bạn!");
									$('.nav-tabs a[href="#booking-confirmation"]').tab('show'); }
									else if(responseText == 4){ ajax_loading.addClass('hidden');alert("có lỗi trong quá trình Đặt phòng, hãy thử lại");}
								}
							});
							
						}				
			
		});
	});
</script>

</body>
</html>
