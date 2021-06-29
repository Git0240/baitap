<footer id="top-footer">
    <div id="top-footer-content" class="container">
		<div class="widget col-md-3">
        <h4>Bài viết mới</h4>
        <div class="content-box row">
          <div class="widget-content">
            <?php include('ketnoi.php');
	$sql = mysqli_query($con,'select * from table_news order by id DESC limit 0,6 ');
	if(mysqli_num_rows($sql)>0){ $res=mysqli_fetch_object($sql);do{
?>           
		  <li><a href="<?php echo $res->url ;?>.html" title="<?php echo $res->ten; ?>"><?php echo $res->ten; ?></a></li>
<?php }while($res=mysqli_fetch_object($sql)); } ?> 
		  </div>
        </div>
      </div>
      <div class="widget col-md-3">
        <h4 id="Info_name">Lotus Hotel</h4>
        <div class="content-box row">
          <div class="widget-content">
            <div id="Info_description"><?php echo $tomtat_lienhe; ?></div>
            <div class="social-icons"> <a href="<?php echo $face_lienhe; ?>" id="Info_fb" class="facebook"></a> 
			<a href="<?php echo $twitter_lienhe; ?>" id="Info_tw" class="twitter"></a> 
			<a href="<?php echo $google_lienhe; ?>" id="Info_gg" class="google-plus"></a> </div>
            <div class="social-icons logopartner"> <a target="_blank" href="https://www.agoda.com/vi-vn/starcity-halong-bay-hotel/hotel/halong-vn.html?checkin=2018-04-14&amp;los=1&amp;adults=2&amp;rooms=1&amp;cid=-1&amp;searchrequestid=35e3dabf-e666-48c9-8f87-e5d537aef572&amp;tabbed=true" class=""> <img src="Assets/img/Logo/agoda.png" /></a> <a target="_blank" href="https://www.expedia.com.vn/Halong-Bay-Khach-San-Starcity-Halong-Bay-Hotel.h6023961.Thong-tin-khach-san?adults=2&amp;children=0&amp;chkin=28%2F02%2F2018&amp;chkout=01%2F03%2F2018&amp;regionId=6055449&amp;hwrqCacheKey=145b8053-d317-471f-8866-52551df19111HWRQ1519617043456&amp;vip=false&amp;=undefined&amp;daysInFuture=&amp;stayLength=&amp;ts=1519617075635" class=""> <img src="Assets/img/Logo/B.png" /></a> <a target="_blank" href="https://www.booking.com/hotel/vn/starcity-suoi-mo.vi.html?label=gen173nr-1DCAEoggJCAlhYSDNYBGj0AYgBAZgBKsIBA2FibsgBDNgBA-gBAZICAXmoAgQ&amp;sid=6e4c477907eddc08a0b2380f832c8363&amp;bshb=2&amp;checkin=2018-03-01&amp;checkout=2018-03-02&amp;dest_id=-3715715&amp;dest_type=city&amp;dist=0&amp;group_adults=2&amp;hapos=1&amp;hpos=1&amp;room1=A%2CA&amp;sb_price_type=total&amp;soh=1&amp;soldout=0%2C0&amp;srepoch=1519617180&amp;srfid=9147c4ddde3af36a29e91d17b1b1818bfeb8bbe4X1&amp;srpvid=24871b4db1b500a9&amp;type=total&amp;ucfs=1&amp;hp_refreshed_with_new_dates=1" class=""> <img src="Assets/img/Logo/booking.png" /></a> <a target="_blank" href="https://www.traveloka.com/vi-vn/hotel/vietnam/starcity-halong-bay-1000000430785?spec=01-03-2018.02-03-2018.1.1.HOTEL.1000000430785.Starcity%20Halong%20Bay.1" class=""> <img src="Assets/img/Logo/treveloca.png" /></a> </div>
          </div>
        </div>
      </div>
      <div class="widget col-md-3">
        <h4>Địa chỉ</h4>
        <div class="content-box row">
          <div class="widget-content">
            <ul>
              <li> <i class="fa fa-phone-square"></i>: 0382 397 969 <br />
                <i class="fa fa-phone-square"></i>: 0928 729 117 </li>
              <li> <i class="fa fa-envelope"></i>: nnguyenggiang0240@gmail.com </li>
              <li> <i class="fa fa-map-marker"></i>: 331 QL1A, An Phú Đông, Quận 12, TP.Hồ Chí Minh</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="widget col-md-3">
        <h4>Bản đồ</h4>
        <div class="content-box row">
          <div class="widget-content">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.3574244390365!2d106.69221925106639!3d10.860395760568172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175283c0260c69f%3A0x82344320b971e9ab!2zxJBIIE5ndXnhu4VuIFThuqV0IFRow6BuaA!5e0!3m2!1svi!2s!4v1600582342042!5m2!1svi!2s" width="600" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		  </div>
        </div>
      </div>
    </div>
  </footer>
  <footer id="footer">
    <div id="go-up"></div>
    <ul class="footer-menu container">
      <li> <a href="index.php" data-id="index">Trang Chủ</a> </li>
      <li> <a href="chitietsanpham.php" data-id="room">Phòng Nghỉ</a> </li>
      <li> <a href="dichvu.php" data-id="service">Dịch Vụ</a> </li>
      <li> <a href="gioithieu.php" data-id="about">Giới Thiệu</a> </li>
      <li> <a href="lienhe.php" data-id="contact">Liên Hệ</a> </li>
    </ul>
    <div class="copyright">&copy; 2020 Phần mềm mã nguồn mở - 17DTH1A </div>
  </footer>
</div>
<script type="text/javascript" src="Assets/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="Assets/js/jquery.modernizr.min.js"></script>
<script type="text/javascript" src="Assets/js/bootstrap/tab.js"></script>
<script type="text/javascript" src="Assets/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="Assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="Assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="Assets/js/datetime.js"></script>
<!--
<script type="text/javascript" src="Assets/js/helper.js"></script>
<script type="text/javascript" src="Assets/js/init.js"></script>
-->
<script type="text/javascript" src="Assets/js/template.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.drawer').drawer();
        });
    </script>


<script src="Assets/js/jquery.touchSwipe.js"></script>
<script src="Assets/js/plugin.min.js"></script>
<script>
	jQuery('.bxslider-welcome').bxSlider({
                        speed: 1e3, controls: !0, auto: !0, mode: "fade", pause: 5e3, pager: !1
                    });
	$('#testimonials-slider').owlCarousel({
                items: 3, itemsTablet: [1024, 1],
                navigation: !0, pagination: !1
            });
				
</script>
<header role="banner">
  <button type="button" class="drawer-toggle drawer-hamburger"> <span class="sr-only">toggle navigation</span> <span class="drawer-hamburger-icon"></span> </button>
  <nav class="drawer-nav" role="navigation">
    <div class="js_frm_signup js_frm_signup_white">
      <h3 data-animation="animated fadeInLeft">Đặt phòng</h3>
      <form action="#" role="form">
        <div class="form-group" data-animation="animated fadeInRight">
          <input id="QFromDate" required placeholder="Từ ngày" class="form-control datepicker-fields check-in">
        </div>
        <div class="form-group" data-animation="animated fadeInLeft">
          <input id="QToDate" required placeholder="Đến ngày" class="form-control datepicker-fields check-out">
        </div>
        <div id="ddlRoomTypes" class="form-group choosen-form" data-animation="animated fadeInRight">
          <select class='form-control'>
            <option value='Chưa chọn loại phòng'>Loại Phòng</option>
<?php
	$sql = mysqli_query($con,"select * from table_sanpham where publish = 1 order by id");
	$row = mysqli_num_rows($sql);
		if($row>0){	
		$res = mysqli_fetch_object($sql);
			do{
 ?>			
            <option value='<?php echo $res->id;?>'><?php echo $res->tensp;?></option>
<?php		
			}while($res = mysqli_fetch_object($sql));
		}
?>
          </select>
        </div>
        <div class="form-group" data-animation="animated fadeInLeft">
          <input id="QRoomNum" required class="form-control" placeholder="Số lượng phòng" type="number">
        </div>
        <div class="form-group" data-animation="animated fadeInRight">
          <input id="QUserNum" required class="form-control" placeholder="Số lượng khách" type="number">
        </div>
        <button class="btn btn-default" onclick="QuickBook()" data-animation="animated fadeInLeft" type="button">Đặt</button>
      </form>
    </div>
  </nav>
</header>
    <script>
        function QuickBook() {
            var QFromDate = $('#QFromDate').val().replace('/-/g', 'x'), QToDate = $('#QToDate').val().replace('/-/g', 'x'),
                QRoomTypes = $('#ddlRoomTypes').find('select').val(), QRoomNum = $('#QRoomNum').val(), QUserNum = $('#QUserNum').val();
            var from = '', to = '';
            for (var i in QFromDate) {

                if (QFromDate[i] == '-') {
                    from += QFromDate[i].replace('-', 'x');
                } else {
                    from += QFromDate[i];
                }
            }
            for (var i in QToDate) {

                if (QToDate[i] == '-') {
                    to += QToDate[i].replace('-', 'x');
                } else {
                    to += QToDate[i];
                }
            }
            if (from != '' && to != '' && QRoomTypes != '-1' && QRoomNum != '' && QUserNum != '') {
                window.location.href = 'datphong.php?QRoomNum=' + QRoomNum + '&QUserNum=' + QUserNum + '&QRoomTypes=' + QRoomTypes + '&from=' + from + '&to=' + to;
                //return false;
            }
            else { alert('Điền đầy đủ thông tin...'); }
        }
        function booking(id) {
            var dta = new Date();
            var from = (dta.getMonth() + 1) + 'x' + dta.getDate() + 'x' + dta.getFullYear();
            var to = (dta.getMonth() + 1) + 'x' + (dta.getDate() + 2) + 'x' + dta.getFullYear();
			window.location.href = 'datphong.php?QRoomNum=' + 1 + '&QUserNum=' + 1 + '&QRoomTypes=' + id + '&from=' + from + '&to=' + to;
        }
    </script>