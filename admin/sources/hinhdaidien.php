<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "hinhdaidien/items";
        break;
    case "add":
		get_htdl();
        $template = "hinhdaidien/item_add";
        break;
    case "edit":
		get_htdl();
        get_item();
        $template = "hinhdaidien/item_add";
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

function get_htdl() {
    global $d, $htdl;

    $sql = "select * from #_htdl order by id DESC";
    $d->query($sql);
    $htdl = $d->result_array();
}

//doc cac muc menu cha va con
/* lay du lieu cho hai bang dat_tour va bang khach_hang */
function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}
function get_items() // hien tat ca cac menu
{
   
    global $d, $items, $paging;

    $sql = "select * from #_hinhdaidien order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=hinhdaidien&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=hinhdaidien&act=man");

    $sql = "select * from #_hinhdaidien where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=hinhdaidien&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    $file_name = fns_Rand_digit(0, 9, 8);
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=hinhdaidien&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        
        
        if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)){
            $data['img'] = $photo;
            $d->setTable('hinhdaidien');
            $d->setWhere('id',$id);
            $d->select();
            if($d->num_rows() > 0){
                $row = $d->fetch_array();
                delete_file(_upload_hang . $row['img']);
            }
        }
        
        $data['ten'] = $_POST['ten'];
		$data['id_menu'] = $_POST['id_menu'];
			
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
        
        
        $d->setTable('hinhdaidien');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=hinhdaidien&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hinhdaidien&act=man");
    }else {//them moi
        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)) {
            $data['img'] = $photo;
        }
        
        $data['ten'] = $_POST['ten'];
		$data['id_menu'] = $_POST['id_menu'];
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
        $d->setTable('hinhdaidien');
        if ($d->insert($data))
            redirect("index.php?com=hinhdaidien&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=hinhdaidien&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
	
        $id = themdau($_GET['id']);

        $d->reset();
		
        $sql = "select * from #_hinhdaidien where id='" . $id . "'";
		
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                 delete_file(_upload_hang . $row['img']);
            }
            $sql = "delete from #_hinhdaidien where id ='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=hinhdaidien&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=hinhdaidien&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=hinhdaidien&act=man");
}

?>


