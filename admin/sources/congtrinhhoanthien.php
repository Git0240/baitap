<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "congtrinhhoanthien/items";
        break;
    case "add":
        get_hang();
        get_kg();
        get_hdh();
        get_nlk();
        $template = "congtrinhhoanthien/item_add";
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
        $template = "congtrinhhoanthien/item_add";
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

    $sql = "select * from #_congtrinhhoanthien order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=sp&act=man";
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
        transfer("Không nhận được dữ liệu", "index.php?com=sp&act=man");

    $sql = "select * from #_congtrinhhoanthien where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=tintuc&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 8);
	
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=sp&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";

    if ($id) {
        $id = themdau($_POST['id']);

        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['anh'] = $photo;
            $d->setTable('congtrinhhoanthien');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['anh']);
            }
        }


        if ($image1 = upload_image("image1", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $_FILES['image1']['name'])) {
            $data['image1'] = $image1;
            $d->setTable('congtrinhhoanthien');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['image1']);
            }
        }


        $file_name = fns_Rand_digit(0, 9, 8);
        if ($image2 = upload_image("image2", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image2'] = $image2;
            $d->setTable('congtrinhhoanthien');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['image2']);
            }
        }

        $file_name = fns_Rand_digit(0, 9, 8);
        if ($image3 = upload_image("image3", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image3'] = $image3;
            $d->setTable('congtrinhhoanthien');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['image3']);
            }
        }


        $file_name = fns_Rand_digit(0, 9, 8);
        if ($image4 = upload_image("image4", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image4'] = $image4;
            $d->setTable('congtrinhhoanthien');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['image4']);
            }
        }

        $file_name = fns_Rand_digit(0, 9, 8);
        if ($image5 = upload_image("image5", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image5'] = $image5;
            $d->setTable('congtrinhhoanthien');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['image5']);
            }
        }
		
		if ($image6 = upload_image("image6", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image6'] = $image6;
            $d->setTable('congtrinhhoanthien');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['image6']);
            }
        }


        $data['ten'] = $_POST['ten'];
        $data['tieude'] = $_POST['tieude'];
        $data['chitiet'] = $_POST['chitiet1'];		
        $data['publish'] = isset($_POST['publish']) ? 1 : 0;
        $data['id_cap_mot'] = $_POST['id_cap_mot'];
        $data['id_cap_hai'] = $_POST['id_cap_hai'];
      
        
        $d->setTable('congtrinhhoanthien');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=congtrinhhoanthien&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=congtrinhhoanthien&act=man");
    }else {
        $file_name = fns_Rand_digit(0, 9, 8);

        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['anh'] = $photo;
        }

        $file_name = fns_Rand_digit(0, 9, 8);

        if ($image1 = upload_image("image1", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image1'] = $image1;
        }
        $file_name = fns_Rand_digit(0, 9, 8);

        if ($image2 = upload_image("image2", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image2'] = $image2;
        }

        $file_name = fns_Rand_digit(0, 9, 8);

        if ($image3 = upload_image("image3", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image3'] = $image3;
        }

        $file_name = fns_Rand_digit(0, 9, 8);

        if ($image4 = upload_image("image4", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image4'] = $image4;
        }

        $file_name = fns_Rand_digit(0, 9, 8);

        if ($image5 = upload_image("image5", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image5'] = $image5;
        }
		
		 $file_name = fns_Rand_digit(0, 9, 8);

        if ($image6 = upload_image("image6", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['image6'] = $image6;
        }

         $data['ten'] = $_POST['ten'];
        $data['tieude'] = $_POST['tieude'];
        $data['chitiet'] = $_POST['chitiet1'];		
        $data['publish'] = isset($_POST['publish']) ? 1 : 0;
        $data['id_cap_mot'] = $_POST['id_cap_mot'];
        $data['id_cap_hai'] = $_POST['id_cap_hai'];
		
        $d->setTable('congtrinhhoanthien');
        if ($d->insert($data))
            redirect("index.php?com=congtrinhhoanthien&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=congtrinhhoanthien&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select * from #_congtrinhhoanthien where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_sanpham . $row['anh']);
                delete_file(_upload_sanpham . $row['image1']);
                delete_file(_upload_sanpham . $row['image2']);
                delete_file(_upload_sanpham . $row['image3']);
                delete_file(_upload_sanpham . $row['image4']);
                delete_file(_upload_sanpham . $row['image5']);
				delete_file(_upload_sanpham . $row['image6']);
            }
            $sql = "delete from #_congtrinhhoanthien where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=congtrinhhoanthien&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=congtrinhhoanthien&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=congtrinhhoanthien&act=man");
}
?>


