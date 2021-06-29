<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "fter/items";
        break;
    case "add":
       
        $template = "fter/item_add";
        break;
    case "edit":
        get_item();
        
        $template = "fter/item_add";
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


function get_items() // hien tat ca cac menu
{
   
    global $d, $items, $paging;

    $sql = "select * from #_footer order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=fter&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=fter&act=man");

    $sql = "select * from #_footer where id ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=fter&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=fter&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        $data['dc'] = $_POST['dc'];
        $data['dt'] = $_POST['dt'];
        $d->setTable('footer');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=fter&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=fter&act=man");
    }else {//them moi
        $data['dc'] = $_POST['dc'];
        $data['dt'] = $_POST['dt'];
       
      
        $d->setTable('footer');
        if ($d->insert($data))
            redirect("index.php?com=fter&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=fter&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_footer where id='" . $id . "'";
        if ($d->query($sql))
            header("Location:index.php?com=fter&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=fter&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=fter&act=man");
}
?>



