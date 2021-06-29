<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
    case "man":
        get_items();
        $template = "traodoinoibo/items";
        break;
    case "add":
        get_quocgia();
        $template = "traodoinoibo/item_add";
        break;
    case "edit":
        get_quocgia();
        get_item();
        $template = "traodoinoibo/item_add";
        break;
    case "save":
        get_quocgia();
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

    $sql = "select * from #_traodoinoibo order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=traodoinoibo&act=man";
    $maxR=40;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_quocgia(){
    global $d, $item_quocgia;

    $sql = "select * from #_quocgia";
    $d->query($sql);
    $item_quocgia = $d->result_array();

}

/* doc item */
function get_item(){
    global $d, $item_mot;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=traodoinoibo&act=man");

    $sql = "select * from #_traodoinoibo where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=traodoinoibo&act=man");
    $item_mot = $d->fetch_array();
}

function save_item(){
    global $d;

    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=traodoinoibo&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){ // cap nhat
        $id =  themdau($_POST['id']);
        $data['ho_ten'] = $_POST['ho_ten'];
        $data['chuc_danh'] = $_POST['chuc_danh'];

        $data['cong_ty'] = $_POST['cong_ty'];
        $data['dia_chi'] = $_POST['dia_chi'];

        $data['ma_quocgia'] = $_POST['ma_quocgia'];

        $data['dienthoai'] = $_POST['dienthoai'];
        $data['fax'] = $_POST['fax'];
        $data['email'] = $_POST['email'];
        $data['noidung'] = $_POST['noidung'];


        $d->setTable('traodoinoibo');
        $d->setWhere('id', $id);

        if($d->update($data))

            header("Location:index.php?com=traodoinoibo&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=traodoinoibo&act=man");
    }else{ // them moi
        $data['ho_ten'] = $_POST['ho_ten'];
        $data['chuc_danh'] = $_POST['chuc_danh'];

        $data['cong_ty'] = $_POST['cong_ty'];
        $data['dia_chi'] = $_POST['dia_chi'];

        $data['ma_quocgia'] = $_POST['ma_quocgia'];

        $data['dienthoai'] = $_POST['dienthoai'];
        $data['fax'] = $_POST['fax'];
        $data['email'] = $_POST['email'];
        $data['noidung'] = $_POST['noidung'];

        $d->setTable('traodoinoibo');
        if($d->insert($data))
            header("Location:index.php?com=traodoinoibo&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=traodoinoibo&act=man");
    }
}

function delete_item(){
    global $d;

    if(isset($_GET['id'])){
        $id =  themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_traodoinoibo where id='".$id."'";
        if($d->query($sql))
            header("Location:index.php?com=traodoinoibo&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=traodoinoibo&act=man");
    }else transfer("Không nhận được dữ liệu", "index.php?com=traodoinoibo&act=man");
}
#--------------------------------------------------------------------------------------------- photo

?>

	
