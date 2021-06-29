<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "tintuc/items";
        break;
    case "add":
        get_nhomtin();
        $template = "tintuc/item_add";
        break;
    case "duyettin":
        get_tinduyet();
        $template = "tintuc/duyettin";
        break;
    case "duyetbl":
        get_duyetbl();
        $template = "tintuc/duyetbl";
        break;
    case "edit":
        get_item();
        get_nhomtin();
        $template = "tintuc/item_add";
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
    global $d, $item_nhomtin;

    $sql = "select * from #_nhomtin where parentid =0 order by id DESC";
    $d->query($sql);
    $item_nhomtin = $d->result_array();
}



function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}

function get_items() {
    global $d, $items, $paging;

    if (@$_REQUEST['update'] != '') {
        $id_up = @$_REQUEST['update'];

        $tinnoibat = time();

        $sql_sp = "SELECT id,tinnoibat FROM table_news where id='" . $id_up . "' order by id DESC";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $spdc1 = $cats[0]['tinnoibat'];
        //echo "id:". $spdc1;
        if ($spdc1 == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat ='" . $tinnoibat . "' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }

    if (@$_REQUEST['hienthi'] != '') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_news where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        //echo "id:". $spdc1;
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }

    $sql = "select * from #_news order by id desc";
    $d->query($sql);
    $items = $d->result_array();

}

function get_tinduyet() {
    global $d, $items, $paging;
    set_time_limit(0);
    include ("laytin.php");
    $urlwebsite = "http://honda.com.vn/";
    $links = DanTri_TrangChu($urlwebsite);
    foreach ($links as $td => $url) {
        $tin = DanTri_Lay1Tin($urlwebsite, $url);
        LuuTinVaoDB($tin, $url, "honda");
        next($links);
    }
    $sql = "select * from #_tinmoi where DaDuyet=0 ";
    $sql.=" order by idTin desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=news&act=duyettin";
    $maxR = 20;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}



function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=tintuc&act=man");

    $sql = "select * from #_news where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=tintuc&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=tintuc&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {
        $id = themdau($_POST['id']);

        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_tintuc, $file_name)) {
            $data['photo'] = $photo;
            $d->setTable('news');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_tintuc . $row['photo']);
            }
        }
		
		$file_name = vn2latin(fns_Rand_digit(0,9,8).'-'.$_FILES['tailieu']['name'],true);
		if ($photo = upload_image("tailieu", 'pdf|PDF|doc|docx|xls|xlsx|zip|rar', _upload_tintuc, $file_name)) {		
            $data['tailieu'] = $photo;
            $d->setTable('news');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_tintuc . $row['tailieu']);
            }
        }
		
       
        $data['ten'] = $_POST['ten'];
		
		$data['tukhoa'] = $_POST['tukhoa'];
        
       	$data['id_cat1'] = $_POST['id_cat1'];
	   	$data['id_cat2'] = $_POST['id_cat2'];
        $data['id_cat'] = $_POST['id_cat'];
        
		
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['menutren'] = isset($_POST['menutren']) ? 1 : 0;
		$data['sukien'] = isset($_POST['sukien']) ? 1 : 0;
		
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
		
		$chitiet = str_replace('=""','',$_POST['chitiet']);
        $chitiet = str_replace("'",'"',$chitiet);
		$chitiet = str_replace('""','"', $chitiet);
        $data['chitiet'] = $chitiet;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
		$noidung = str_replace('=""','',$_POST['noidung']);
		$noidung = str_replace("'",'"',$noidung);
		$noidung = str_replace('""','"', $noidung);
        $data['noidung'] = $noidung;
		
		$now = getdate();
		$data['ngay'] = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"]; 
       
        $d->setTable('news');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=tintuc&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tintuc&act=man");
    }else {

        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_tintuc, $file_name)) {
            $data['photo'] = $photo;
        }
        
		$file_name = vn2latin(fns_Rand_digit(0,9,8).'-'.$_FILES['tailieu']['name'],true);
		if ($photo1 = upload_image("tailieu", 'pdf|PDF|doc|docx|xls|xlsx|zip|rar', _upload_tintuc, $file_name)) {
            $data['tailieu'] = $photo1;
        }
		
        $data['ten'] = $_POST['ten'];
        $data['id_cat1'] = $_POST['id_cat1'];
        $data['id_cat'] = $_POST['id_cat'];
		$data['id_cat2'] = $_POST['id_cat2'];
        
		$data['tukhoa'] = $_POST['tukhoa'];
       
	    $chitiet = str_replace('=""','',$_POST['chitiet']);
        $chitiet = str_replace("'",'"',$chitiet);
		$chitiet = str_replace('""','"', $chitiet);
        $data['chitiet'] = $chitiet;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
		$noidung = str_replace('=""','',$_POST['noidung']);
		$noidung = str_replace("'",'"',$noidung);
		$noidung = str_replace('""','"', $noidung);
        $data['noidung'] = $noidung;
		
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['menutren'] = isset($_POST['menutren']) ? 1 : 0;
		$data['sukien'] = isset($_POST['sukien']) ? 1 : 0;
		
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
		
		$now = getdate();
		$data['ngay'] = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"]; 
		
        $d->setTable('news');
        if ($d->insert($data))
            redirect("index.php?com=tintuc&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=tintuc&act=man");
    }
}


function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
	
        $id = themdau($_GET['id']);

        $d->reset();
		
        $sql = "select * from #_news where id='" . $id . "'";
		
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_tintuc . $row['photo']);
				delete_file(_upload_tintuc . $row['tailieu']);
            }
            $sql = "delete from #_news where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=tintuc&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=tintuc&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=tintuc&act=man");
}
?>


