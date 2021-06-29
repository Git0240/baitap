<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "htkd/items";
        break;
    case "add":
       
        $template = "htkd/item_add";
        break;
    case "edit":
        get_item();
        
        $template = "htkd/item_add";
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

    $sql = "select * from #_htkd order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=htkd&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=htkd&act=man");

    $sql = "select * from #_htkd where id ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=htkd&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=htkd&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        $data['ten'] = $_POST['ten'];
        
		$bo = str_replace('+','',$_POST['ten']);
		$bo = str_replace('?','',$bo);
		$bo = str_replace('~','',$bo);
		$bo = str_replace('%','',$bo);
		$bo = str_replace('&','',$bo);
		$bo = str_replace('/','',$bo);
		$bo = str_replace(',','',$bo);
		$bo = str_replace(':','',$bo);
		$bo = str_replace('(','',$bo);
		$bo = str_replace(')','',$bo);
		$bo = str_replace('*','',$bo);
		$bo = str_replace("'",'',$bo);
		$bo = str_replace('"','',$bo);
		$bo = str_replace('.','',$bo);
		$bo = str_replace('<','',$bo);
		$bo = str_replace('>','',$bo);
	  	$data['url'] = str_replace('---','-',vn2latin($bo,true));
		
        $d->setTable('htkd');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=htkd&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=htkd&act=man");
    }else {//them moi
        $data['ten'] = $_POST['ten'];
       
        $bo = str_replace('+','',$_POST['ten']);
		$bo = str_replace('?','',$bo);
		$bo = str_replace('~','',$bo);
		$bo = str_replace('%','',$bo);
		$bo = str_replace('&','',$bo);
		$bo = str_replace('/','',$bo);
		$bo = str_replace(',','',$bo);
		$bo = str_replace(':','',$bo);
		$bo = str_replace('(','',$bo);
		$bo = str_replace(')','',$bo);
		$bo = str_replace('*','',$bo);
		$bo = str_replace("'",'',$bo);
		$bo = str_replace('"','',$bo);
		$bo = str_replace('.','',$bo);
		$bo = str_replace('<','',$bo);
		$bo = str_replace('>','',$bo);
	  	$data['url'] = str_replace('---','-',vn2latin($bo,true));
       
      
        $d->setTable('htkd');
        if ($d->insert($data))
            redirect("index.php?com=htkd&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=htkd&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_htkd where id='" . $id . "'";
        if ($d->query($sql))
            header("Location:index.php?com=htkd&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=htkd&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=htkd&act=man");
}
?>



