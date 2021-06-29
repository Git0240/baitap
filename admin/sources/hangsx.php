<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "hangsx/items";
        break;
    case "add":
        $template = "hangsx/item_add";
        break;
    case "edit":
        get_item();
        $template = "hangsx/item_add";
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

    $sql = "select * from #_hangsx order by id_hang DESC";
    $d->query($sql);
    $items = $d->result_array();
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=hang&act=man");

    $sql = "select * from #_hangsx where id_hang='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=hang&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    $file_name = fns_Rand_digit(0, 9, 8);
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=hang&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        
        
        if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)){
            $data['img'] = $photo;
            $d->setTable('hangsx');
            $d->setWhere('id_hang',$id);
            $d->select();
            if($d->num_rows() > 0){
                $row = $d->fetch_array();
                delete_file(_upload_hang . $row['img']);
            }
        }
        
        $data['tenhang'] = $_POST['tenhang'];
		
		$data['href'] = $_POST['href'];
		
		$data['trongnuoc'] = isset($_POST['trongnuoc']) ? 1 : 0;
		$data['hot'] = isset($_POST['hot']) ? 1 : 0;
		$data['sale'] = isset($_POST['sale']) ? 1 : 0;
		$data['new'] = isset($_POST['new']) ? 1 : 0;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
        $bo = str_replace('+','',$_POST['tenhang']);
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
		
        
        $d->setTable('hangsx');
        $d->setWhere('id_hang', $id);
        if ($d->update($data))
            redirect("index.php?com=hang&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hang&act=man");
    }else {//them moi
        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)) {
            $data['img'] = $photo;
        }
        
        $data['tenhang'] = $_POST['tenhang'];
		
		$data['href'] = $_POST['href'];
		
		$data['trongnuoc'] = isset($_POST['trongnuoc']) ? 1 : 0;
		$data['hot'] = isset($_POST['hot']) ? 1 : 0;
		$data['sale'] = isset($_POST['sale']) ? 1 : 0;
		$data['new'] = isset($_POST['new']) ? 1 : 0;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
        $bo = str_replace('+','',$_POST['tenhang']);
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
		
        $d->setTable('hangsx');
        if ($d->insert($data))
            redirect("index.php?com=hang&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=hang&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
	
        $id = themdau($_GET['id']);

        $d->reset();
		
        $sql = "select * from #_hangsx where id_hang='" . $id . "'";
		
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_hang . $row['img']);
            }
            $sql = "delete from #_hangsx where id_hang ='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=hang&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=hang&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=hang&act=man");
}
?>


