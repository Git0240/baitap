<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "thanhtich/items";
        break;
    case "add":
		
        $template = "thanhtich/item_add";
        break;
    case "edit":
		
        get_item();
        $template = "thanhtich/item_add";
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

    $sql = "select * from #_thanhtich order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=thanhtich&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=thanhtich&act=man");

    $sql = "select * from #_thanhtich where id ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=thanhtich&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    $file_name = fns_Rand_digit(0, 9, 8);
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=thanhtich&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        
        
        if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)){
            $data['hinh'] = $photo;
            $d->setTable('thanhtich');
            $d->setWhere('id',$id);
            $d->select();
            if($d->num_rows() > 0){
                $row = $d->fetch_array();
                delete_file(_upload_thanhtich . $row['hinh']);
            }
        }
        
        $data['tenthanhtich'] = $_POST['tenthanhtich'];
        
        $d->setTable('thanhtich');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=thanhtich&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=thanhtich&act=man");
    }else {//them moi
        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)) {
            $data['hinh'] = $photo;
        }
        
        $data['tenthanhtich'] = $_POST['tenthanhtich'];
		
        $d->setTable('thanhtich');
        if ($d->insert($data))
            redirect("index.php?com=thanhtich&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=thanhtich&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
	
        $id = themdau($_GET['id']);

        $d->reset();
		
        $sql = "select * from #_thanhtich where id='" . $id . "'";
		
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_hang . $row['hinh']);
            }
            $sql = "delete from #_thanhtich where id ='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=thanhtich&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=thanhtich&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=thanhtich&act=man");
}
?>


