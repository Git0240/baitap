// JavaScript Document
jQuery(document).ready(function(){
			
	var filter_idSP='';
	var filter_tensp='';
	var filter_urlsp='';
	var filter_anh='';
	
	var idsanpham='';
	var tensp='';
	var ajax_loading=jQuery('#ajax_loading');
	
	jQuery(document).on('click','#btn-addcart',function(e){
		e.preventDefault();

		filter_idSP = jQuery(this).data('idsp');
		filter_soluong = jQuery('#quantity_5ca48a16e8d61').val();
		
		show(filter_idSP,filter_soluong,soluong);							
	});
	
	jQuery(document).on('click','#btn-addcart-chitiet',function(e){
		e.preventDefault();
		soluongsanpham = jQuery('#qty');
		
		filter_idSP = jQuery(this).data('idsp');
		filter_tensp = jQuery(this).data('tensp');
		filter_urlsp = jQuery(this).data('urlsp');
		filter_anh = jQuery(this).data('anh');
		
			var reg = /^\d+jQuery/;
			function kiemtra(chuoi){
				 return (reg.test(chuoi));
			}
			
			if(kiemtra(soluongsanpham.val())== false){alert('Vui lòng nhập số lượng bằng số'); }
			else{ 
				show(filter_idSP,soluongsanpham.val(),soluong,xemnhanh_giohang);
				var jQueryinfo = '<div class="row"><div class="col-md-4"><a href="san-pham/'+ filter_urlsp +'"><img width="70px" src="media/upload/sanpham/'+ filter_anh +'" alt="'+ filter_tensp +'"/></a></div><div class="col-md-8"><div class="jGrowl-note">Sản phẩm đã cho vào <a href="gio-hang.html">Giỏ hàng</a></div><a class="jGrowl-title" href="san-pham/'+ filter_urlsp +'">'+ filter_tensp +'</a></div></div>';
  				notifyProduct(jQueryinfo);
			}				
	});
	
	
	jQuery(document).on('click','#xoasp_xemnhanh',function(){
		filter_idSP = jQuery(this).data('idsp');
		filter_tensp = jQuery(this).data('tensp');
		
		var conf = confirm("Bạn chắc xóa sản phẩm: " + filter_tensp);
		if(conf){
			xoa_giohang(filter_idSP,soluong,xemnhanh_giohang);
		}
		else{return false;}
	});
	
	jQuery(document).on('click','.tieptuc_muahang',function(){
		window.location = 'index.html';
	});
	
	jQuery(document).on('click','.nuttat_popup_datmua',function(){
		//jQuery('#ajax_popup_datmua').css('display','none');
		jQuery('#ajax_popup_datmua').html('');
	});
	jQuery(document).on('click','.popup_datmnua',function(){
		//jQuery('#ajax_popup_datmua').css('display','none');	
		jQuery('#ajax_popup_datmua').html('');
	});
	jQuery(document).on('click','.nutchon_tieptuc',function(){
		//jQuery('#ajax_popup_datmua').css('display','none');
		jQuery('#ajax_popup_datmua').html('');
	});
	jQuery(document).on('click','.giohang_left',function(){
		jQuery('#ajax_xemnhanh_giohang').html('');
		xemnhanh_giohang();									
		jQuery('#ajax_xemnhanh_giohang').fadeToggle();
	});
	jQuery(document).on('click','.xoatoanbo',function(){	
		var conf = confirm("Ban chac muon Xoa toan bo san pham");
		if(conf){ xoa_giohang(0,soluong);}
		else{return false;}
	});
	
	jQuery(document).on('click','.dong2xoa',function(){
		tensp = jQuery(this).data('value');
		var conf = confirm("Ban chac xoa " + tensp);
		if(conf){
			idsanpham = jQuery(this).data('idsp');
			//khong dong bo o day
			//phai xoa xong moi load lai so luong
			
			xoa_giohang(idsanpham,soluong);
			
			ajax_noidung_giohang
		}
		else{return false;}
	});
	/**/
	
	jQuery(document).on('click','#submit_giohang',function(e){
		e.preventDefault();
		var form_giohang=jQuery('#form_giohang');
		//alert();
		//Ma hoa form thanh object de gui di bang ajax, khong gui gia tri nut submit
		//Cach nay khong quan tam form co bao nhieu input.
		//Chi can submit di, phia server se xu ly
		var data = form_giohang.serializeArray(); 
		var len = data.length;
		for(i = 0; i< len; i++)
		{
			// them gia tri cho input 'do_ajax' , dung de php nhan biet form co submit bang ajax hay khong.
			//Khong lam thay doi gia tri tren form, chi thay doi trong bien data
			//Co the dung jQuery de thay doi gia tri cua input do_ajax tren form, nhung phai mat cong kiem soat no,
			//nen dung cach nay de khong phai phat sinh nhunh dong ma khong lien ket voi data minh dang xu ly.
			if(data[i].name == 'do_ajax')
			{
				data[i].value = 'do_ajax'; //Ok !
			}
		}		
		console.log(data);
		//Cho hien hinh loading.gif
		ajax_loading.removeClass('hidden');
		jQuery.post( 
             "gio-hang.html", //<- url
             data, //<- data gui di
	          function(data) { 
				  //An hinh loading.gif
				  ajax_loading.addClass('hidden');
				 // if(data == 'thanh_cong')
				 // {
					  //Xu ly neu thanh cong
					  capnhat_giohang();
					  jQuery('html,body').animate({scrollTop:400},900);
				 // }
				 // else
				  //{
					  //Xu ly neu khong thanh cong
				//	  alert('Cap nhat khong thanh cong');
				 // }
                //console.log(data);
             }
			 //, [data type] 
          );		
		//Ham post khong co tham so cho data type thi mac dinh data nhan duoc la dang text
		//[data type] la json, jsonp,text, ....
	});
	/**/
	
	function show(con,soluong,ham_callback_cua_tui)
	{	
		ajax_loading.removeClass('hidden');
			var url = "popup_datmua.php?idsp=" + con +"&soluong=" + soluong;
				//console.log(url);
				jQuery.get(
					url,	
					{},			
					function(data){
						ajax_loading.addClass('hidden');
						if(typeof ham_callback_cua_tui == 'function'){ham_callback_cua_tui();}
						window.location='gio-hang.html';
					}					
				);
	}
	function soluong()
	{	
				jQuery('#carttotal').html('');
				jQuery.get(
					url = "soluong_sp_giohang.php",	
					{},			
					function(data){
						jQuery('#carttotal').html(data);					
					}					
				);
	}
	function xemnhanh_giohang()
	{	
			jQuery('#ajax_xemnhanh_giohang').html('');
			var url = "xemnhanh_giohang.php";
			ajax_loading.removeClass('hidden');
				//console.log(url);
				jQuery.get(
					url,	
					{},			
					function(data){
						ajax_loading.addClass('hidden');
						jQuery('#ajax_xemnhanh_giohang').html(data);
					}					
				);
	}
	function xoa_giohang(con,ham_callback_cua_tui)
	{	
		ajax_loading.removeClass('hidden');
			var url = "popup_datmua.php?xoa_idsp=" + con;
				jQuery.get(
					url,	
					{},			
					function(data){
						ajax_loading.addClass('hidden');

						if(typeof ham_callback_cua_tui == 'function'){ham_callback_cua_tui();}
						capnhat_giohang();
					}					
				);
	}
	function capnhat_giohang()
	{	
			var url = "xemnhanh_noidung_giohang.php";
			ajax_loading.removeClass('hidden');
				//console.log(url);
				jQuery.get(
					url,	
					{},			
					function(data){
						ajax_loading.addClass('hidden');
						jQuery('#ajax_noidung_giohang').html(data);
					}					
				);
	}
	function xuly_dathang(){
		var url = "xyly_dathang.php";
			ajax_loading.removeClass('hidden');
			jQuery.get(
				url,	
				{},			
				function(data){
					ajax_loading.addClass('hidden');
					jQuery('#ajax_tt_giohang').html(data);
				}					
		);	
	}
     var reg = /^\d+jQuery/;
	function kiemtra(chuoi){
		 return (reg.test(chuoi));
	}
	
	jQuery(document).on('click','.nutchon_dong_tt',function(){
		jQuery('#ajax_tt_giohang').html('');
	});
	
	jQuery(document).on('click','.nutchon_thanhtoan',function(){
		var dangky_hoten 		= jQuery('#dangky_hoten');
		var dangky_dienthoai 	= jQuery('#dangky_dienthoai');
		var dangky_email 		= jQuery('#dangky_email');
		var maxacnhan 			= jQuery('#maxacnhan');
	
		if(dangky_hoten.val()==''){jQuery('.loi_hoten').css('display','block'); dangky_hoten.focus();}
		else{jQuery('.loi_hoten').css('display','none');}
		
		if(dangky_dienthoai.val()==''){jQuery('.loinhap_dienthoai').css('display','block'); dangky_dienthoai.focus();}
		else{jQuery('.loinhap_dienthoai').css('display','none');}
		
		if(dangky_email.val()==''){jQuery('.loi_email').css('display','block'); dangky_email.focus();}
		else{jQuery('.loi_email').css('display','none');}
		
		if(maxacnhan.val()==''){jQuery('.loi_xacnhan').css('display','block'); maxacnhan.focus();}
		else{jQuery('.loi_xacnhan').css('display','none');}
		
		
		if(dangky_hoten.val() !='' && dangky_dienthoai.val() !='' && dangky_email.val() !='' && maxacnhan.val()!=''){
			
			if(dangky_dienthoai.val()!='' && kiemtra(dangky_dienthoai.val())== false ) {
				jQuery(".loi_dienthoai").css('display', 'block', 'important');
				
				dangky_dienthoai.focus();
			}else{
				jQuery(".loi_dienthoai").css('display', 'none');
				
				ajax_loading.removeClass('hidden');
				var UrlToPass = 'action=gui&dangky_hoten='+dangky_hoten.val()+'&dangky_dienthoai='+dangky_dienthoai.val()+'&dangky_email='+dangky_email.val()
					+'&maxacnhan='+maxacnhan.val();
				//console.log(UrlToPass);
				jQuery.ajax({ // Send the credential values to another using Ajax in POST menthod
					type : 'POST',
					data : UrlToPass,
					url  : "donhang.php",
					success: function(responseText){ // Get the result and asign to each cases
						//alert(responseText);
						if(responseText == 2){
							ajax_loading.addClass('hidden');
							jQuery('.loi_email').css('display','block'); dangky_email.focus();
						}
						else if(responseText == 3){
							ajax_loading.addClass('hidden');
							jQuery('.loi_xacnhan').css('display','block'); maxacnhan.focus();
						}
						else 
						if(responseText == 1){
							ajax_loading.addClass('hidden');
							jQuery('.loi_email').css('display','none');
							jQuery('.loi_xacnhan').css('display','none');
							
							alert('Đặt hàng thành công');
							jQuery('#ajax_tt_giohang').html('');
							soluong();
							capnhat_giohang();
						}else if(responseText == 0){
							ajax_loading.addClass('hidden');
							jQuery('.loi_email').css('display','none');
							
							alert('Có lỗi trong quá trình đặt hàng');
						}
					}
				});
			}
		}
		
	});
	
	var username1 	  = jQuery('#username');
	jQuery(document).on('click','.thanhtoan_giohang',function(){
		window.location='thanhtoan_giohang.php';
	});
	
	jQuery(document).on('click','.gui_donhang',function(){

			var ajax_loading = jQuery('#ajax_loading');
			
			var reg = /^\d+jQuery/;
			function kiemtra(chuoi){
				 return (reg.test(chuoi));
			}
		
			var hoten = jQuery('#hoten');
			var dienthoai = jQuery('#dienthoai');
			var email = jQuery('#email');
			var diachi = jQuery('#diachi');
			var ghichu = jQuery('#ghichu');
			var vanchuyen = jQuery('#shipping');
			var hinhthuc = jQuery("input[type=radio]:checked").val();
			
						
			if(hoten.val()==''){alert('Chưa nhập họ tên'); hoten.focus();}
			else if(email.val()==''){alert('Chưa nhập Email'); email.focus();}
			else if(dienthoai.val()==''){alert('Chưa nhập điện thoại'); dienthoai.focus();}
			else if(kiemtra(dienthoai.val())== false){alert('Điện thoại phải nhập bằng số'); dienthoai.focus();}
			else if(diachi.val()==''){alert('Chưa nhập Địa chỉ'); diachi.focus();}
			else if(ghichu.val()==''){alert('Chưa nhập Ghi chú'); ghichu.focus();}
			
			else{
				
				
				ajax_loading.removeClass('hidden');
				var UrlToPass = 'action=gui&hoten='+hoten.val()+'&dienthoai='+dienthoai.val()+'&diachi='+diachi.val()+'&email='+email.val()+'&ghichu='+ghichu.val()
					+'&hinhthuc='+hinhthuc+'&vanchuyen='+vanchuyen.val();
				
				console.log(UrlToPass);
				jQuery.ajax({ // Send the credential values to another using Ajax in POST menthod
					type : 'POST',
					data : UrlToPass,
					url  : "donhang.php",
					success: function(responseText){ // Get the result and asign to each cases
						
						//alert(responseText);
						if(responseText == 2){
							ajax_loading.addClass('hidden');
							alert('Email không hợp lệ'); email.focus();
						}else
						if(responseText == 0){
							ajax_loading.addClass('hidden');
							alert('Có lỗi trong quá trình gửi đơn hàng, hãy thử lại');
						}
						else if(responseText == 1){
							ajax_loading.addClass('hidden');
							alert('Gửi đơn hàng thành công, bạn sẽ sớm nhận được thông báo của cửa hàng');
							
							window.location='gio-hang.html';
						}
						else{
							ajax_loading.addClass('hidden');
							alert('Erro');
						}
					}
				});				
				
			}
			
	
	});
	
	jQuery(document).on('click','#ctl00_ContentPlaceHolder1_chkCopyFromContact',function(){
	
		 if(this.checked) {
//----------------------		
		
		jQuery.ajax({
			 Type:'POST',
			 url : "kt_session_thanhvien.php",
			 success: function(responseText){
				if(responseText==1){
					
					var lay_hoten= jQuery('#lay_hoten');
					var lay_email= jQuery('#lay_email');
					var lay_dienthoai= jQuery('#lay_dienthoai');
					var lay_diachi= jQuery('#lay_diachi');
					
					
					jQuery('#hoten').val(lay_hoten.val());
					jQuery('#email').val(lay_email.val());
					jQuery('#dienthoai').val(lay_dienthoai.val());
					jQuery('#diachi').val(lay_diachi.val());
					
				}
				else{
					alert("Bạn Chưa đăng nhập");
					window.location="login.html";
				}
			}
		});
		
//------------------------		
	 	 }else{
					 jQuery('#hoten').val("");
					jQuery('#email').val("");
					jQuery('#dienthoai').val("");
					jQuery('#diachi').val("");
		}
	  
	});
	
	
});