<?php
include('../ketnoi.php');

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "menu_doc/items";
        break;
    case "add":
        get_nhomtin();
		get_nhomtin_cap2();
        $template = "menu_doc/item_add";
        break;
    case "edit":
        get_item();
        get_nhomtin();
		get_nhomtin_cap2();
        $template = "menu_doc/item_add";
        break;
    case "save":
        save_item();
        get_nhomtin();
		get_nhomtin_cap2();
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

function get_nhomtin() {
    global $d, $items;
    $sql = "select * from #_nhommuc WHERE parentid = 0 order by id DESC"; /* menu cap0 */
    $d->query($sql);
    $items = $d->result_array();
}

function get_nhomtin_cap2() {
    global $d, $itemss;
    $sql = "select * from #_nhommuc WHERE parentid > 0 order by id DESC"; /* menu cap0 */
    $d->query($sql);
    $itemss = $d->result_array();
}

function get_items() // hien tat ca cac menu
{
   
    global $d, $items, $paging;

    $sql = "select * from #_nhommuc order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

    $url = "index.php?com=menu_doc&act=man";
    $maxR = 40;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=menu_doc&act=man");

    $sql = "select * from #_nhommuc where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=menu_doc&act=man");
    $item = $d->fetch_array();
}



function save_item() {
    global $d,$itemss,$items; $link_lk="";
	$file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=menu_doc&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    
    if ($id) {//cap nhat
		
		$id = themdau($_POST['id']);
		
		$file_name = fns_Rand_digit(0, 9, 8);
        if ($image1 = upload_image("image1", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image1'] = $image1;
            $d->setTable('nhommuc');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['image1']);
            }
        }
		
        $data['loaitin'] = $_POST['loaitin'];
		$data['uutien'] = $_POST['uutien'];
		
		$data['menutren'] = isset($_POST['menutren']) ? 1 : 0;
		$data['trai'] = isset($_POST['trai']) ? 1 : 0;

		$tomtat = str_replace('=""','',$_POST['mota']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['mota'] = $tomtat;

		$dinhduong = str_replace('=""','',$_POST['dinhduong']);
		$dinhduong = str_replace("'",'"',$dinhduong);
		$dinhduong = str_replace('""','"', $dinhduong);
        $data['dinhduong'] = $dinhduong;

        $data['parentid'] = $_POST['parentid'];
		$data['topmenu'] = $_POST['topmenu'];
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		
		$data['hot'] = isset($_POST['hot']) ? 1 : 0;
		$data['sale'] = isset($_POST['sale']) ? 1 : 0;
		$data['new'] = isset($_POST['new']) ? 1 : 0;
		
		$bo = str_replace('+','',$_POST['url']);
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
	  	$data['url'] = $link_lk.str_replace('---','-',vn2latin($bo,true));
		
        $d->setTable('nhommuc');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=menu_doc&act=man");
       else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=menu_doc&act=man");
    }else {//them moi
       
		$file_name = fns_Rand_digit(0, 9, 8);

        if ($image1 = upload_image("image1", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image1'] = $image1;
        }
		
		$data['loaitin'] = $_POST['loaitin'];
		$data['uutien'] = $_POST['uutien'];
        $data['parentid'] = $_POST['parentid']; // neu khong chon thi mac dinh no la 0
		$data['topmenu'] = $_POST['topmenu'];
		
		$tomtat = str_replace('=""','',$_POST['mota']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['mota'] = $tomtat;
		
		$dinhduong = str_replace('=""','',$_POST['dinhduong']);
		$dinhduong = str_replace("'",'"',$dinhduong);
		$dinhduong = str_replace('""','"', $dinhduong);
        $data['dinhduong'] = $dinhduong;
		
		
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['menutren'] = isset($_POST['menutren']) ? 1 : 0;
		$data['trai'] = isset($_POST['trai']) ? 1 : 0;
		
		$data['hot'] = isset($_POST['hot']) ? 1 : 0;
		$data['sale'] = isset($_POST['sale']) ? 1 : 0;
		$data['new'] = isset($_POST['new']) ? 1 : 0;
		
		$bo = str_replace('+','',$_POST['loaitin']);
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
	  	$data['url'] = $link_lk.str_replace('---','-',vn2latin($bo,true));
		
        $d->setTable('nhommuc');
        if ($d->insert($data))
            redirect("index.php?com=menu_doc&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=menu_doc&act=man");
    }
}


function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select id, photo from #_nhommuc where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                 delete_file(_upload_sanpham . $row['image1']);
            }
            $sql = "delete from #_nhommuc where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=menu_doc&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=menu_doc&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=menu_doc&act=man");
}

?>


