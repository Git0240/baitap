<?php include ('ketnoi.php');
@session_start();
include('function_guimail.php'); $email_admin ='nnguyenggiang0240@gmail.com';

if(isset($_POST['action']) && $_POST['action'] == 'gui'){ // Check the action `login`
	$lienhe_hoten 		= ($_POST['lienhe_hoten']); // Get the username
	$lienhe_email 		= (($_POST['lienhe_email']));
	$lienhe_tieude 		= (($_POST['lienhe_tieude']));
	$lienhe_noidung 	= (($_POST['lienhe_noidung']));
	
	$pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
	if(preg_match($pattern, $lienhe_email) != 1){echo 2;}//2 là email ko hợp lệ
	else{
		
		$noidung = "";
		$noidung .= "<h1>Liên hệ trên website</h1><br><br>";
		$noidung .= "Họ tên khách hàng: ".$lienhe_hoten."<br>";
		$noidung .= "Điện thoại: ".$lienhe_tieude."<br>";
		$noidung .= "Email: ".$lienhe_email."<br>";
		$noidung .= "Nội dung: ".$lienhe_noidung."<br>";
	
		
		if(smtpmailer($email_admin,GUSER, 'LIEN HE TREN WEBSITE', 'LIEN HE TREN WEBSITE', $noidung) )
		{
			echo 1;
		}//3 la ok
		
		else if (!empty($error)){echo 4;}//4 la loi
	
	}//1 là đầy đủ thông tin
}

if(isset($_POST['action']) && $_POST['action'] == 'gui_datphong'){ // Check the action `login`
	$lienhe_hoten 		= ($_POST['lienhe_hoten']); // Get the username
	$lienhe_email 		= (($_POST['lienhe_email']));
	$lienhe_tieude 		= (($_POST['lienhe_tieude']));
	$lienhe_noidung 	= (($_POST['lienhe_noidung']));
	
	$lienhe_thanhpho 		= ($_POST['lienhe_thanhpho']); // Get the username
	$lienhe_diachi 		= (($_POST['lienhe_diachi']));
	$lienhe_loaiphong 		= (($_POST['lienhe_loaiphong']));
	$lienhe_sophong 	= (($_POST['lienhe_sophong']));
	
	$lienhe_sokhach 		= ($_POST['lienhe_sokhach']); // Get the username
	$lienhe_Tungay 		= (($_POST['lienhe_Tungay']));
	$lienhe_Denngay 		= (($_POST['lienhe_Denngay']));

	$pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
	if(preg_match($pattern, $lienhe_email) != 1){echo 2;}//2 là email ko hợp lệ
	else{
		
		$noidung = "";
		$noidung .= "<h1>Liên hệ Đặt phòng trên website</h1><br><br>";
		$noidung .= "Họ tên khách hàng: ".$lienhe_hoten."<br>";
		$noidung .= "Điện thoại: ".$lienhe_tieude."<br>";
		$noidung .= "Email: ".$lienhe_email."<br>";
		$noidung .= "Nội dung: ".$lienhe_noidung."<br>";
		
		$noidung .= "Thành phố: ".$lienhe_thanhpho."<br>";
		$noidung .= "Địa chỉ: ".$lienhe_diachi."<br>";
		$noidung .= "Loại phòng: ".$lienhe_loaiphong."<br>";
		$noidung .= "Số phòng: ".$lienhe_sophong."<br>";
		$noidung .= "Số khách: ".$lienhe_sokhach."<br>";
		$noidung .= "Từ ngày: ".$lienhe_Tungay."<br>";
		$noidung .= "Đến ngày: ".$lienhe_Denngay."<br>";
		
		
		if(smtpmailer($email_admin,GUSER, 'LIEN HE DAT PHONG TREN WEBSITE', 'LIEN HE DAT PHONG TREN WEBSITE', $noidung) )
		{
			echo 1;
		}//3 la ok
		
		elseif (!empty($error)){echo 4;}//4 la loi
	
	}//1 là đầy đủ thông tin
}

if(isset($_POST['action']) && $_POST['action'] == 'gui_email'){ // Check the action `login`
	include('ketnoi.php');	
		
	$lienhe_email 		= (($_POST['lienhe_email']));
	
	$pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
	if(preg_match($pattern, $lienhe_email) != 1){echo 2;}//2 là email ko hợp lệ
	else{
		
		$sql = mysqli_query($con,'insert into table_bh (ten) values("'.$lienhe_email.'" ) ');
 
		if(isset($sql)){echo 1;}//3 la ok
		elseif (!empty($error)){echo 4;}//4 la loi
	
	}//1 là đầy đủ thông tin
}
?>