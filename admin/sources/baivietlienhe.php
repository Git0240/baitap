<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
    case "man":
        get_items();
        $template = "baivietlienhe/items";
        break;
    case "add":
        $template = "baivietlienhe/item_add";
        break;
    case "edit":
        get_item();
        $template = "baivietlienhe/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;

    default:
        $template = "index";
}


function fns_Rand_digit($min,$max,$num)
{
    $result='';
    for($i=0;$i<$num;$i++){
        $result.=rand($min,$max);
    }
    return $result;
}

/* Hien noi dung toan bo bang */
function get_items(){
    global $d, $items, $paging;

    $sql = "select * from #_baivietlienhe order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=baivietlienhe&act=man";
    $maxR=10;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

/* doc tung muc trong item */
function get_item(){
    global $d, $item_mot;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=tuyendung&act=man");

    $sql = "select * from #_baivietlienhe where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tuyendung&act=man");
    $item_mot = $d->fetch_array();
}

/* Cap nhat va them vao bang */
function save_item(){

    global $d;
    $file_name=fns_Rand_digit(0,9,8);
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=baivietlienhe&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){
        $id =  themdau($_POST['id']);
		
		$data['tieude'] = str_replace("'",'&acute;',$_POST['tieude']);
		
		$data['diachi'] = $_POST['diachi'];		
		$data['email'] = $_POST['email'];
		$data['dienthoai'] = $_POST['dienthoai'];
		
		$data['face'] = $_POST['face'];
		$data['google'] = $_POST['google'];
		
		
		$data['thanhvien'] = $_POST['thanhvien'];
		
		
		
		$data['you'] = str_replace('watch?v=','embed/',$_POST['you']);
		
		$data['hotline'] = $_POST['hotline'];
		$data['twitter'] = $_POST['twitter'];
		$data['instagram'] = $_POST['instagram'];
				
		$data['ten1'] = $_POST['ten1'];		
		$data['ten2'] = $_POST['ten2'];
		
		$data['sozalo'] = $_POST['sozalo'];
		
		$danhgia = str_replace('=""','',$_POST['danhgia']);
        $danhgia = str_replace("'",'"',$danhgia);
		$danhgia = str_replace('""','"', $danhgia);
        $data['danhgia'] = $danhgia;
		
       	$timkiem = str_replace('=""','',$_POST['timkiem']);
        $timkiem = str_replace("'",'"',$timkiem);
		$timkiem = str_replace('""','"', $timkiem);
        $data['timkiem'] = $timkiem;
		
		$noidung = str_replace('=""','',$_POST['noidung']);
        $noidung = str_replace("'",'"',$noidung);
		$noidung = str_replace('""','"', $noidung);
        $data['noidung'] = $noidung;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
		$sanpham = str_replace('=""','',$_POST['sanpham']);
		$sanpham = str_replace("'",'"',$sanpham);
		$sanpham = str_replace('""','"', $sanpham);
        $data['sanpham'] = $sanpham;
		
		$gioithieu = str_replace('=""','',$_POST['gioithieu']);
		$gioithieu = str_replace("'",'"',$gioithieu);
		$gioithieu = str_replace('""','"', $gioithieu);
        $data['gioithieu'] = $gioithieu;
		
		$bo = str_replace('+','',$_POST['tieude']);
		$bo = str_replace('~','',$bo);
		$bo = str_replace('%','',$bo);
		$bo = str_replace('&','',$bo);
		$bo = str_replace('/','',$bo);
		$bo = str_replace('--','-',$bo);
		
	  	$data['url'] = vn2latin(str_replace(',','',$bo),true);
		      
        $d->setTable('baivietlienhe');
        $d->setWhere('id', $id);
        if($d->update($data))
            redirect("index.php?com=baivietlienhe&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=baivietlienhe&act=man");
    }else{
		$data['tieude'] = str_replace("'",'&acute;',$_POST['tieude']);
		
		$data['diachi'] = $_POST['diachi'];		
		$data['email'] = $_POST['email'];
		$data['dienthoai'] = $_POST['dienthoai'];
				
		$data['face'] = $_POST['face'];
		$data['google'] = $_POST['google'];
		$data['you'] = str_replace('watch?v=','embed/',$_POST['you']);
		
		$data['hotline'] = $_POST['hotline'];
		$data['twitter'] = $_POST['twitter'];
		$data['instagram'] = $_POST['instagram'];
		
		$data['sothanhvien'] = $_POST['sothanhvien'];
		$data['thanhvien'] = $_POST['thanhvien'];
		$data['sohoptac'] = $_POST['sohoptac'];
		$data['hoptac'] = $_POST['hoptac'];
		$data['sophanphoi'] = $_POST['sophanphoi'];
		$data['phanphoi'] = $_POST['phanphoi'];
		
		$data['ten1'] = $_POST['ten1'];		
		$data['ten2'] = $_POST['ten2'];
		
		$data['zalo'] = $_POST['zalo'];
		
		$danhgia = str_replace('=""','',$_POST['danhgia']);
        $danhgia = str_replace("'",'"',$danhgia);
		$danhgia = str_replace('""','"', $danhgia);
        $data['danhgia'] = $danhgia;
		
       	$timkiem = str_replace('=""','',$_POST['timkiem']);
        $timkiem = str_replace("'",'"',$timkiem);
		$timkiem = str_replace('""','"', $timkiem);
        $data['timkiem'] = $timkiem;
		
		$noidung = str_replace('=""','',$_POST['noidung']);
        $noidung = str_replace("'",'"',$noidung);
		$noidung = str_replace('""','"', $noidung);
        $data['noidung'] = $noidung;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
		$sanpham = str_replace('=""','',$_POST['sanpham']);
		$sanpham = str_replace("'",'"',$sanpham);
		$sanpham = str_replace('""','"', $sanpham);
        $data['sanpham'] = $sanpham;
		
		$gioithieu = str_replace('=""','',$_POST['gioithieu']);
		$gioithieu = str_replace("'",'"',$gioithieu);
		$gioithieu = str_replace('""','"', $gioithieu);
        $data['gioithieu'] = $gioithieu;
		
		
		$bo = str_replace('+','',$_POST['tieude']);
		$bo = str_replace('~','',$bo);
		$bo = str_replace('%','',$bo);
		$bo = str_replace('&','',$bo);
		$bo = str_replace('/','',$bo);
		$bo = str_replace('--','-',$bo);
		
	  	$data['url'] = vn2latin(str_replace(',','',$bo),true);
		
        $d->setTable('baivietlienhe');
        if($d->insert($data))
            redirect("index.php?com=baivietlienhe&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=baivietlienhe&act=man");
    }

}
function delete_item(){
    global $d;

    if(isset($_GET['id'])){
        $id =  themdau($_GET['id']);

        // xoa item
        $sql = "delete from #_baivietlienhe where id='".$id."'";
        if($d->query($sql))
            header("Location:index.php?com=baivietlienhe&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=baivietlienhe&act=man");
    }else transfer("Không nhận được dữ liệu", "index.php?com=baivietlienhe&act=man");
}
#--------------------------------------------------------------------------------------------- photo
?>