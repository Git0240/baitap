<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
		
        $template = "hotline/items";
        break;
    case "add":
      	 get_kg();
        $template = "hotline/item_add";
        break;
    case "edit":
        get_item();
        get_kg();
        $template = "hotline/item_add";
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


function get_kg() {
    global $d, $kgs;

    $sql = "select * from #_khoanggia order by id_kg DESC";
    $d->query($sql);
    $kgs = $d->result_array();
}

function get_items() // hien tat ca cac menu
{
   
    global $d, $items, $paging;

    $sql = "select * from #_hotline order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=hotline&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=hotline&act=man");

    $sql = "select * from #_hotline where id ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=hotline&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=hotline&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        
        $data['sdt'] = str_replace('watch?v=','embed/',$_POST['sdt']);
		
		$data['ten'] = $_POST['ten'];
		
		$data['idvideo'] = str_replace('https://www.youtube.com/watch?v=','',str_replace('https://www.youtube.com/embed/','',$_POST['sdt']));
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		
        $d->setTable('hotline');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=hotline&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hotline&act=man");
    }else {//them moi
		
        $data['sdt'] = str_replace('watch?v=','embed/',$_POST['sdt']);
       	$data['ten'] = $_POST['ten'];
      	$data['idvideo'] = str_replace('https://www.youtube.com/watch?v=','',str_replace('https://www.youtube.com/embed/','',$_POST['sdt']));
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		
        $d->setTable('hotline');
        if ($d->insert($data))
            redirect("index.php?com=hotline&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=hotline&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_hotline where id='" . $id . "'";
        if ($d->query($sql))
            header("Location:index.php?com=hotline&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=hotline&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=hotline&act=man");
}
?>



