// JavaScript Document
$(document).ready(function(){
	$(document).on('click','#ajaxtimkiem',function(e){
		e.preventDefault();
		var timkiem = $('#timkiem');
		if(timkiem.val() ==''){alert("Chua nhap thong tin tim kiem");}
		else{
			$('#ajaxtimkiem').html("");
			var url = "http://localhost/admin/ajax_timkiem.php?key=" + timkiem.val();
				console.log(url);
				$.get(
					url,	
					{},			
					function(data){
						$('#ajax_xemnhanh_giohang').html(data);
					}					
				);
		}
		
	});
	
});
