<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
    case "man":
        get_items();
        $template = "gamenet/items";
        break;
    case "add":
        $template = "gamenet/item_add";
        break;
    case "edit":
        get_item();
        $template = "gamenet/item_add";
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


function fns_Rand_digit($min,$max,$num)
{
    $result='';
    for($i=0;$i<$num;$i++){
        $result.=rand($min,$max);
    }
    return $result;
}

/* Hien noi dung toan bo bang */
function get_items(){
    global $d, $items, $paging;

    $sql = "select * from #_gamenet";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=gamenet&act=man";
    $maxR=40;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

/* doc tung muc trong item */
function get_item(){
    global $d, $item_mot;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=gamenet&act=man");

    $sql = "select * from #_gamenet where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=gamenet&act=man");
    $item_mot = $d->fetch_array();
}

/* Cap nhat va them vao bang */
function save_item(){

    global $d;
    $file_name=fns_Rand_digit(0,9,8);
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=gamenet&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){
        $id =  themdau($_POST['id']);
		
		$data['tieude'] = $_POST['tieude'];
        $data['noidung'] = $_POST['noidung'];
        
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['tentrang'] = $_POST['tentrang'];
		      
        $d->setTable('gamenet');
        $d->setWhere('id', $id);
        if($d->update($data))
            redirect("index.php?com=gamenet&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=gamenet&act=man");
    }else{
		$data['tieude'] = $_POST['tieude'];
        $data['noidung'] = $_POST['noidung'];
		
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
		$data['tentrang'] = $_POST['tentrang'];
		
        $d->setTable('gamenet');
        if($d->insert($data))
            redirect("index.php?com=gamenet&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=gamenet&act=man");
    }

}
function delete_item(){
    global $d;

    if(isset($_GET['id'])){
        $id =  themdau($_GET['id']);

        // xoa item
        $sql = "delete from #_gamenet where id='".$id."'";
        if($d->query($sql))
            header("Location:index.php?com=gamenet&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=gamenet&act=man");
    }else transfer("Không nhận được dữ liệu", "index.php?com=gamenet&act=man");
}
#--------------------------------------------------------------------------------------------- photo
?>