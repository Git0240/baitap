<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "doitac/items";
        break;
    case "add":
		get_nhomtin();
        $template = "doitac/item_add";
        break;
    case "edit":
		get_nhomtin();
        get_item();
        $template = "doitac/item_add";
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


function get_nhomtin() {
    global $d, $items;

    $sql = "select * from #_doitac WHERE parentid = 0 "; /* menu cap0 */
    $d->query($sql);
    $items = $d->result_array();
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

    $sql = "select * from #_doitac order by id DESC";
    $d->query($sql);
    $items = $d->result_array();
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man");

    $sql = "select * from #_doitac where id ='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=doitac&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    $file_name = fns_Rand_digit(0, 9, 8);
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {//cap nhat
        
        
        if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)){
            $data['hinh'] = $photo;
            $d->setTable('doitac');
            $d->setWhere('id',$id);
            $d->select();
            if($d->num_rows() > 0){
                $row = $d->fetch_array();
                delete_file(_upload_doitac . $row['hinh']);
            }
        }
        
        $data['tendoitac'] = $_POST['tendoitac'];
		$data['ten'] = $_POST['ten'];
		
		$data['parentid'] = $_POST['parentid'];
		
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
		
        $d->setTable('doitac');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=doitac&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=doitac&act=man");
    }else {//them moi
        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_hang, $file_name)) {
            $data['hinh'] = $photo;
        }
        
        $data['tendoitac'] = $_POST['tendoitac'];
		$data['ten'] = $_POST['ten'];
		
		$data['parentid'] = $_POST['parentid'];
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;		
		
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
		
        $d->setTable('doitac');
        if ($d->insert($data))
            redirect("index.php?com=doitac&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=doitac&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
	
        $id = themdau($_GET['id']);

        $d->reset();
		
        $sql = "select * from #_doitac where id='" . $id . "'";
		
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_hang . $row['hinh']);
            }
            $sql = "delete from #_doitac where id ='" . $id . "'";
            $d->query($sql);
        }
		
		//-----------------
	
	//delete hình ảnh
	
		$sql_hinh = "select * from #_albumkh where id_tintuc='" . $id . "'";
		
		$d->query($sql_hinh);
		 if ($d->num_rows() > 0) {
		 	  while ($row_hinh = $d->fetch_array()) {
			  	 delete_file(_upload_albumkh . $row_hinh['hinh']);
			  }
			  $sql_anhhinh = "delete from #_albumkh where id_tintuc='" . $id . "'";
           		$d->query($sql_anhhinh);
		 }
		 
		
       if ($d->query($sql)&& $d->query($sql_anhhinh) )
            redirect("index.php?com=doitac&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=doitac&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=doitac&act=man");
}
?>


