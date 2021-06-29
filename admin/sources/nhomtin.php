<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "nhomtin/items";
        break;
    case "add":
        get_nhomtin();
        $template = "nhomtin/item_add";
        break;
    case "edit":
        get_item();
        get_nhomtin();
        $template = "nhomtin/item_add";
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
function get_nhomtin() {
    global $d, $items;

    $sql = "select * from #_nhomtin WHERE parentid = 0 order by id DESC "; /* menu cap0 */
    $d->query($sql);
    $items = $d->result_array();
}

function get_items() // hien tat ca cac menu
{
   
    global $d, $items, $paging;

    $sql = "select * from #_nhomtin order by id DESC";
    $d->query($sql);
    $items = $d->result_array();

}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=nhomtin&act=man");

    $sql = "select * from #_nhomtin where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=nhomtin&act=man");
    $item = $d->fetch_array();
}
function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}
function save_item() {
    global $d;
	$file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=nhomtin&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
		if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_tintuc, $file_name)) {
            $data['photo'] = $photo;
            $d->setTable('nhomtin');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_tintuc . $row['photo']);
            }
        }
		
        $data['loaitin'] = $_POST['loaitin'];
		
		$data['uutien'] = $_POST['uutien'];
	  	
		$data['parentid'] = $_POST['parentid'];
		$data['menutren'] = isset($_POST['menutren']) ? 1 : 0;
		$data['giua'] = isset($_POST['giua']) ? 1 : 0;
		$data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['topmenu'] = $_POST['topmenu'];
		$data['giuaduoi'] = isset($_POST['giuaduoi']) ? 1 : 0;

		$data['phai'] = isset($_POST['phai']) ? 1 : 0;
		$data['trai'] = isset($_POST['trai']) ? 1 : 0;
		$data['tintuc'] = isset($_POST['tintuc']) ? 1 : 0;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
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
	  	$data['url'] = str_replace('---','-',vn2latin($bo,true));
	  	
        $d->setTable('nhomtin');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=nhomtin&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=nhomtin&act=man");
    }else {//them moi
		 if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_tintuc, $file_name)) {
            $data['photo'] = $photo;
        }
		
        $data['loaitin'] = $_POST['loaitin'];
     $data['uutien'] = $_POST['uutien'];
		
		$data['parentid'] = $_POST['parentid'];
		$data['menutren'] = isset($_POST['menutren']) ? 1 : 0;
		$data['giua'] = isset($_POST['giua']) ? 1 : 0;
		$data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['topmenu'] = $_POST['topmenu'];
		$data['giuaduoi'] = isset($_POST['giuaduoi']) ? 1 : 0;
		
		$data['phai'] = isset($_POST['phai']) ? 1 : 0;
		$data['trai'] = isset($_POST['trai']) ? 1 : 0;
		$data['tintuc'] = isset($_POST['tintuc']) ? 1 : 0;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
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
	  	$data['url'] = str_replace('---','-',vn2latin($bo,true));
		
        $d->setTable('nhomtin');
        if ($d->insert($data))
            redirect("index.php?com=nhomtin&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=nhomtin&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
		
		$d->reset();
		
        $sql = "select * from #_nhomtin where id='" . $id . "'";
		
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_tintuc . $row['photo']);
            }
            $sql = "delete from #_nhomtin where id='" . $id . "'";
            $d->query($sql);
        }

        // xoa item
        
        if ($d->query($sql))
            header("Location:index.php?com=nhomtin&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=nhomtin&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=nhomtin&act=man");
}
?>


