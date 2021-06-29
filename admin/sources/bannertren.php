<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "bannertren/items";
        break;
    case "add":
        $template = "bannertren/item_add";
        break;
    
    case "edit":
        get_item();
        $template = "bannertren/item_add";
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


function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}

function get_items() {
    global $d, $items, $paging;

   

    $sql = "select * from #_bannertren order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=bannertren&act=man";
    $maxR = 20;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=bannertren&act=man");

    $sql = "select * from #_bannertren where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=bannertren&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=bannertren&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    
    if ($id) {
        $id = themdau($_POST['id']);
			
		
        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sl, $file_name)) {
            $data['photo'] = $photo;
            $d->setTable('bannertren');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sl . $row['photo']);
            }
        }
        
        
         $data['url'] = $_POST['url'];
        

        $d->setTable('bannertren');
        $d->setWhere('id', $id);
        
        if ($d->update($data))
            redirect("index.php?com=bannertren&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannertren&act=man");
    }else {

        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sl, $file_name)) {
            $data['photo'] = $photo;
        }
        
		$data['url'] = $_POST['url'];
        
        

        $d->setTable('bannertren');
        if ($d->insert($data))
            redirect("index.php?com=bannertren&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannertren&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select id, photo from #_bannertren where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_sl . $row['photo']);
            }
            $sql = "delete from #_bannertren where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=bannertren&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=bannertren&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=bannertren&act=man");
}
?>


