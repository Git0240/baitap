<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "sl/items";
        break;
    case "add":
        $template = "sl/item_add";
        break;
    
    case "edit":
        get_item();
        $template = "sl/item_add";
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

    if (@$_REQUEST['update'] != '') {
        $id_up = @$_REQUEST['update'];

        $tinnoibat = time();

        $sql_sp = "SELECT id,tinnoibat FROM table_news where id='" . $id_up . "' order by id DESC";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $spdc1 = $cats[0]['tinnoibat'];
        //echo "id:". $spdc1;
        if ($spdc1 == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat ='" . $tinnoibat . "' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }

    if (@$_REQUEST['hienthi'] != '') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_news where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        //echo "id:". $spdc1;
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }

    $sql = "select * from #_slide order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=sl&act=man";
    $maxR = 20;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=sl&act=man");

    $sql = "select * from #_slide where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=sl&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=sl&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    
    if ($id) {
        $id = themdau($_POST['id']);
		
		
        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sl, $file_name)) {
            $data['photo'] = $photo;
            $d->setTable('slide');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sl . $row['photo']);
            }
        }
        
        $data['ten'] = $_POST['ten'];
        $data['tomtat'] = $_POST['tomtat'];
	    $data['url'] = $_POST['url'];
		
		$data['sanpham'] = isset($_POST['sanpham']) ? 1 : 0;
		
		$data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['tren'] = isset($_POST['tren']) ? 1 : 0;
		
        $d->setTable('slide');
        $d->setWhere('id', $id);
        
        if ($d->update($data))
            redirect("index.php?com=sl&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=sl&act=man");
    }else {

        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sl, $file_name)) {
            $data['photo'] = $photo;
        }
      
	  	$data['ten'] = $_POST['ten'];
        $data['tomtat'] = $_POST['tomtat'];
	    $data['url'] = $_POST['url'];
        
		$data['sanpham'] = isset($_POST['sanpham']) ? 1 : 0;
		$data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['tren'] = isset($_POST['tren']) ? 1 : 0;
		
        $d->setTable('slide');
        if ($d->insert($data))
            redirect("index.php?com=sl&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=sl&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select id, photo from #_slide where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_sl . $row['photo']);
            }
            $sql = "delete from #_slide where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=sl&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=sl&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=sl&act=man");
}
?>


