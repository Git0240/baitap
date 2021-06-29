<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "chitiet_menu/items";
        break;
    case "add":
        get_hang();
        get_kg();
        get_hdh();
        get_nlk();
        $template = "chitiet_menu/item_add";
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
        get_nlk();
        get_hang();
        get_kg();
        get_hdh();
        get_item();
        $template = "chitiet_menu/item_add";
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

function get_nlk() {
    global $d, $nlks;
    $sql = "select * from #_nhomlk order by id_nlk DESC";
    $d->query($sql);
    $nlks = $d->result_array();
}

function get_hang() {
    global $d, $hangs;

    $sql = "select * from #_hangsx order by id_hang DESC";
    $d->query($sql);
    $hangs = $d->result_array();
}

function get_kg() {
    global $d, $kgs;

    $sql = "select * from #_khoanggia order by id_kg DESC";
    $d->query($sql);
    $kgs = $d->result_array();
}

function get_hdh() {
    global $d, $hdhs;

    $sql = "select * from #_hedh order by id_hdh DESC";
    $d->query($sql);
    $hdhs = $d->result_array();
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

        $sql_chitiet_menu = "SELECT id,tinnoibat FROM table_news where id='" . $id_up . "' order by id DESC";
        $d->query($sql_chitiet_menu);
        $cats = $d->result_array();
        $chitiet_menudc1 = $cats[0]['tinnoibat'];
        //echo "id:". $chitiet_menudc1;
        if ($chitiet_menudc1 == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat ='" . $tinnoibat . "' WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }

    if (@$_REQUEST['hienthi'] != '') {
        $id_up = @$_REQUEST['hienthi'];
        $sql_chitiet_menu = "SELECT id,hienthi FROM table_news where id='" . $id_up . "' ";
        $d->query($sql_chitiet_menu);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        //echo "id:". $chitiet_menudc1;
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }

    $sql = "select * from #_chitiet_menu order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=chitiet_menu&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
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
        transfer("Không nhận được dữ liệu", "index.php?com=chitiet_menu&act=man");

    $sql = "select * from #_chitiet_menu where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=tintuc&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 8);
	
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=chitiet_menu&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";

    if ($id) {
        $id = themdau($_POST['id']);

      
        $data['noidung'] = $_POST['chitiet'];
        
      
        
        $d->setTable('chitiet_menu');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=chitiet_menu&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=chitiet_menu&act=man");
    }else {
        
		$data['noidung'] = $_POST['chitiet'];
        $data['id_cap_mot'] = $_POST['id_cap_hai'];
        
        $d->setTable('chitiet_menu');
        if ($d->insert($data))
            redirect("index.php?com=chitiet_menu&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=chitiet_menu&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select * from #_chitiet_menu where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_chitiet_menu . $row['anh']);
                delete_file(_upload_chitiet_menu . $row['image1']);
                delete_file(_upload_chitiet_menu . $row['image2']);
                delete_file(_upload_chitiet_menu . $row['image3']);
                delete_file(_upload_chitiet_menu . $row['image4']);
                delete_file(_upload_chitiet_menu . $row['image5']);
            }
            $sql = "delete from #_chitiet_menu where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=chitiet_menu&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=chitiet_menu&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=chitiet_menu&act=man");
}
?>


