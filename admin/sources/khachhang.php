<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
    case "man":
        get_items();
        $template = "khachhang/items";
        break;
    case "add":
        $template = "khachhang/item_add";
        break;
    case "edit":
        get_item();
        $template = "khachhang/item_add";
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

/* Hien noi dung */
function get_items(){
    global $d, $items, $paging;

    $sql = "select * from #_khachhang";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=khachhang&act=man";
    $maxR=10;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

/* doc item */
function get_item(){
    global $d, $item_mot;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=khachhang&act=man");

    $sql = "select * from #_khachhang where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=khachhang&act=man");
    $item_mot = $d->fetch_array();
}

function save_item(){
    global $d;

    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=khachhang&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){ // cap nhat
        $id =  themdau($_POST['id']);
        $data['ma_kh'] = $_POST['ma_kh'];
        $data['ten_kh'] = $_POST['ten_kh'];

        $data['tuoi'] = $_POST['tuoi'];
        $data['gioitinh'] = $_POST['gioitinh'] ? 1 : 0;
        $data['cmnd'] = $_POST['cmnd'];

        $data['ma_quocgia'] = $_POST['ma_quocgia'];

        $data['ma_taikhoan'] = $_POST['ma_taikhoan'];
        $data['nganhang'] = $_POST['nganhang'];
        $data['diachi'] = $_POST['diachi'];
        $data['email'] = $_POST['email'];
        $data['dienthoai'] = $_POST['dienthoai'];


        $d->setTable('khachhang');
        $d->setWhere('id', $id);

        if($d->update($data))

            header("Location:index.php?com=khachhang&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=khachhang&act=man");
    }else{ // them moi
        $data['ma_kh'] = $_POST['ma_kh'];
        $data['ten_kh'] = $_POST['ten_kh'];

        $data['tuoi'] = $_POST['tuoi'];
        $data['gioitinh'] = $_POST['gioitinh'] ? 1 : 0;
        $data['cmnd'] = $_POST['cmnd'];

        $data['ma_quocgia'] = $_POST['ma_quocgia'];

        $data['ma_taikhoan'] = $_POST['ma_taikhoan'];
        $data['nganhang'] = $_POST['nganhang'];
        $data['diachi'] = $_POST['diachi'];
        $data['email'] = $_POST['email'];
        $data['dienthoai'] = $_POST['dienthoai'];

        $d->setTable('khachhang');
        if($d->insert($data))
            header("Location:index.php?com=khachhang&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=khachhang&act=man");
    }
}

function delete_item(){
    global $d;

    if(isset($_GET['id'])){
        $id =  themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_khachhang where id='".$id."'";
        if($d->query($sql))
            header("Location:index.php?com=khachhang&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=khachhang&act=man");
    }else transfer("Không nhận được dữ liệu", "index.php?com=khachhang&act=man");
}
#--------------------------------------------------------------------------------------------- photo

?>

	
