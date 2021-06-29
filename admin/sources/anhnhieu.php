<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "anhnhieu/items";
        break;
    case "add":
        get_hang();
        get_kg();
        get_hdh();
        get_nlk();
        $template = "anhnhieu/item_add";
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
        $template = "anhnhieu/item_add";
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



function get_kg() {
    global $d, $kgs;

    $sql = "select * from #_khoanggia order by id_kg DESC";
    $d->query($sql);
    $kgs = $d->result_array();
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




    $sql = "select * from #_banner2 order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=an&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}



function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=an&act=man");

    $sql = "select * from #_banner2 where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=an&act=man");
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
            $data['trai'] = $photo;
            $d->setTable('banner2');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['trai']);
            }
        }

        $file_name = fns_Rand_digit(0, 9, 8);
        if ($image1 = upload_image("phai", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham,$file_name)) {
            $data['phai'] = $image1;
            $d->setTable('banner2');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_sanpham . $row['phai']);
            }
        }


     

       

        $data['link_trai'] = $_POST['link_trai'];
        $data['link_phai'] = $_POST['link_phai'];

		$data['publish'] = isset($_POST['publish']) ? 1 : 0;
        $d->setTable('banner2');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=an&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=an&act=man");
    }else {
        $file_name = fns_Rand_digit(0, 9, 8);

        if ($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['trai'] = $photo;
        }

        $file_name = fns_Rand_digit(0, 9, 8);

        if ($image1 = upload_image("phai", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG', _upload_sanpham, $file_name)) {
            $data['phai'] = $image1;
        }
        $file_name = fns_Rand_digit(0, 9, 8);
		$data['publish'] = isset($_POST['publish']) ? 1 : 0;
       
        $data['link_trai'] = $_POST['link_trai'];
        $data['link_phai'] = $_POST['link_phai'];
       
        $d->setTable('banner2');
        if ($d->insert($data))
            redirect("index.php?com=an&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=an&act=man");
    }
}

function delete_item() {
    global $d;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select * from #_banner where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_sanpham . $row['trai']);
                delete_file(_upload_sanpham . $row['phai']);
               
            }
            $sql = "delete from #_banner2 where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=an&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=an&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=an&act=man");
}
?>


