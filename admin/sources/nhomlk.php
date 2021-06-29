<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "nhomlk/items";
        break;
    case "add":
        get_nhomlk();
        $template = "nhomlk/item_add";
        break;
    case "edit":
        get_item();
        get_nhomlk();
        $template = "nhomlk/item_add";
        break;
    case "save":
        save_item();
        get_nhomtin();
        break;
    case "delete":
        delete_item();
        break;

    default:
        $template = "index";
}

//doc cac muc menu cha va con
/* lay du lieu cho hai bang dat_tour va bang khach_hang */
function get_nhomlk() {
    global $d, $items;

    $sql = "select * from #_nhomlk WHERE 'parentid'=0 "; /* menu cap0 */
    $d->query($sql);
    $items = $d->result_array();
}

function get_items() // hien tat ca cac menu
{
   
    global $d, $items, $paging;

    $sql = "select * from #_nhomlk order by id_nlk DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=nlk&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=nhomtin&act=man");

    $sql = "select * from #_nhomlk where id_nlk='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=nlk&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=nlk&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        $data['tennlk'] = $_POST['tennlk'];
        
        $data['url'] = $_POST['url'];
          
        $d->setTable('nhomlk');
        $d->setWhere('id_nlk', $id);
        if ($d->update($data))
            redirect("index.php?com=nlk&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nlk&act=man");
    }else {//them moi
        $data['tennlk'] = $_POST['tennlk'];
       
       	$data['url'] = $_POST['url'];
      
        $d->setTable('nhomlk');
        if ($d->insert($data))
            redirect("index.php?com=nlk&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=nlk&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_nhomlk where id_nlk='" . $id . "'";
        if ($d->query($sql))
            header("Location:index.php?com=nlk&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=nlk&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=nlk&act=man");
}
?>


