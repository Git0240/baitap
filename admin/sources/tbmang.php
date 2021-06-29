<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "tbmang/items";
        break;
    case "add":
        get_tbmang();
        $template = "tbmang/item_add";
        break;
    case "edit":
        get_item();
        get_tbmang();
        $template = "tbmang/item_add";
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
function get_tbmang() {
    global $d, $items;

    $sql = "select * from #_tbmang WHERE 'parentid'=0 "; /* menu cap0 */
    $d->query($sql);
    $items = $d->result_array();
}

function get_items() // hien tat ca cac menu
{
   
    global $d, $items, $paging;

    $sql = "select * from #_tbmang order by id_tbm DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=tbmang&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=tbmang&act=man");

    $sql = "select * from #_tbmang where id_tbm ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=tbmang&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=tbmang&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        
        $data['ten'] = str_replace("'",'&rsquo;',$_POST['ten']);
		
		$data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['tren'] = isset($_POST['tren']) ? 1 : 0;
		
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
		
        $d->setTable('tbmang');
        $d->setWhere('id_tbm', $id);
        if ($d->update($data))
            redirect("index.php?com=tbmang&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tbmang&act=man");
    }else {//them moi
       	$data['ten'] = str_replace("'",'&rsquo;',$_POST['ten']);
       
	   $data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['tren'] = isset($_POST['tren']) ? 1 : 0;
	   
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
      
        $d->setTable('tbmang');
        if ($d->insert($data))
            redirect("index.php?com=tbmang&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=tbmang&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_tbmang where id_tbm ='" . $id . "'";
        if ($d->query($sql))
            header("Location:index.php?com=tbmang&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=tbmang&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=tbmang&act=man");
}
?>


