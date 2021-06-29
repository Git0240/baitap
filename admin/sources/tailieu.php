<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "tailieu/items";
        break;
    case "add":
		get_items();
		get_htkd();
        $template = "tailieu/item_add";
        break;
    
    case "edit":
        get_item();
		get_htkd();
        $template = "tailieu/item_add";
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

function get_htkd() {
    global $d, $htkd;

    $sql = "select * from #_htkd order by id DESC";
    $d->query($sql);
    $htkd = $d->result_array();
}

function get_items() {
    global $d, $items, $paging;


    $sql = "select * from #_tailieu order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=tailieu&act=man";
    $maxR = 20;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=tailieu&act=man");

    $sql = "select * from #_tailieu where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=tailieu&act=man");
    $item = $d->fetch_array();
}

function upload_image1($file, $extension, $folder, $newname=''){

	if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
		
		$ext = end(explode('.',$_FILES[$file]['name']));
                
		$name = basename($_FILES[$file]['name']);
		
		if(strpos($extension, $ext)===false){
			alert('Chỉ hỗ trợ upload file dạng '.$extension);
			return false; // không hỗ trợ
		}
		
		if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i)){
					$_FILES[$file]['name'] = $name.$i;
					break;
				}
			}
		else{
			$_FILES[$file]['name'] = $newname;
		}
		
		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}

function save_item() {
    global $d;
	$file_name = vn2latin(fns_Rand_digit(0,9,8).'-'.$_FILES['file']['name'],true);
	$file_name1 = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=tailieu&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    
    if ($id) {
        $id = themdau($_POST['id']);
				
		if($photo = upload_image("image", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sl, $file_name1)){
            $data['image'] = $photo;
            $d->setTable('tailieu');
            $d->setWhere('id',$id);
            $d->select();
            if($d->num_rows() > 0){
                $row = $d->fetch_array();
                delete_file(_upload_hangsx . $row['image']);
            }
        }
		
		if ($photo = upload_image("file", 'pdf|PDF|doc|docx|xls|xlsx|zip|rar', _upload_sl, $file_name)) {
		
            $data['photo'] = $photo;
            $d->setTable('tailieu');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sl . $row['photo']);
            }
        }
		
        $data['ten'] = $_POST['ten'];
		
		$data['id_menu'] = $_POST['id_menu'];
		
		$now = getdate();
		$data['ngay'] = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
        
        $d->setTable('tailieu');
        $d->setWhere('id', $id);
        
        if ($d->update($data))
            redirect("index.php?com=tailieu&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tailieu&act=man");
    }else {
		
		if ($photo1 = upload_image("image", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sl, $file_name1)) {
            $data['image'] = $photo1;
        }
		
        if ($photo = upload_image1("file", 'pdf|PDF|doc|docx|xls|xlsx|zip|rar', _upload_sl, $file_name)) {
            $data['photo'] = $photo;
        }
        
		$data['ten'] = $_POST['ten'];
		
		$data['id_menu'] = $_POST['id_menu'];
		
		$now = getdate();
		$data['ngay'] = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"]; 
		
        $d->setTable('tailieu');
        if ($d->insert($data))
            redirect("index.php?com=tailieu&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=tailieu&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select * from #_tailieu where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_sl . $row['photo']);
				delete_file(_upload_sl . $row['image']);
            }
            $sql = "delete from #_tailieu where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=tailieu&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=tailieu&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=tailieu&act=man");
}
?>


