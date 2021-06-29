<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
		get_nhomtin();
		get_doitac();
        $template = "albumkh/items";
        break;
    case "add":
		get_nhomtin();
		get_doitac();
        $template = "albumkh/item_add";
        break;
 
    case "delete":
        delete_item();
        break;
    default:
        $template = "index";
}

function get_nhomtin() {
    global $d, $item_nhomtin;

    $sql = "select * from #_doitac where parentid =0";
    $d->query($sql);
    $item_nhomtin = $d->result_array();
}

function get_doitac() {
    global $d, $item_doitac;

    $sql = "select * from #_doitac order by id DESC";
    $d->query($sql);
    $item_doitac = $d->result_array();
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

    $sql = "select * from #_albumkh order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=albumkh&act=man";
    $maxR = 40;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=albumkh&act=man");

    $sql = "select * from #_albumkh where id ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=albumkh&act=man");
    $item = $d->fetch_array();
}



function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
	
        $id = themdau($_GET['id']);

        $d->reset();
		
        $sql = "select * from #_albumkh where id='" . $id . "'";
		
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file( _upload_albumkh . $row['hinh']);
            }
            $sql = "delete from #_albumkh where id ='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=albumkh&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=albumkh&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=albumkh&act=man");
}
?>


