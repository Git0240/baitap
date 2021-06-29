<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
    case "man":
        get_items();
        $template = "gioithieu/items";
        break;
    case "add":
        $template = "gioithieu/item_add";
		get_tbm();
        break;
    case "edit":
		get_tbm();
        get_item();
        $template = "gioithieu/item_add";
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

function get_tbm() {
    global $d, $tbms;

    $sql = "select * from #_tbmang order by id_tbm DESC";
    $d->query($sql);
    $tbms = $d->result_array();
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

    $sql = "select * from #_gioithieu";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=gioithieu&act=man";
    $maxR=10;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

/* doc tung muc trong item */
function get_item(){
    global $d, $item_mot;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=gioithieu&act=man");

    $sql = "select * from #_gioithieu where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=gioithieu&act=man");
    $item_mot = $d->fetch_array();
}

/* Cap nhat va them vao bang */
function save_item(){

    global $d;
    $file_name=fns_Rand_digit(0,9,8);
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=gioithieu&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){
        $id =  themdau($_POST['id']);

        if($hinhanh = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG',_upload_gioithieu,$file_name)){
            $data['hinhanh'] = $hinhanh;
            $d->setTable('gioithieu');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0){
                $row = $d->fetch_array();
                delete_file(_upload_gioithieu.$row['hinhanh']);
            }
        }
		
		$data['tieude'] = str_replace("'",'&rsquo;',$_POST['tieude']);
		
		$noidung = str_replace('=""','',$_POST['noidung']);
        $noidung = str_replace("'",'"',$noidung);
		$noidung = str_replace('""','"', $noidung);
        $data['noidung'] = $noidung;
		
		$tomtat = str_replace('=""','',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['giua'] = isset($_POST['giua']) ? 1 : 0;
		$data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['id_menu'] = $_POST['id_menu'];
        
		$bo = str_replace('+','',$_POST['tieude']);
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
		
        
        $d->setTable('gioithieu');
        $d->setWhere('id', $id);
        if($d->update($data))
            redirect("index.php?com=gioithieu&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=gioithieu&act=man");
    }else{

        if($hinhanh = upload_image("file", 'jpg|png|gif|jpeg|JPEG|PNG|GIF|JPG',_upload_gioithieu,$file_name)){
            $data['hinhanh'] = $hinhanh;
        }
        
		$data['tieude'] = str_replace("'",'&rsquo;',$_POST['tieude']);
       
	    $noidung = str_replace('=""','',$_POST['noidung']);
        $noidung = str_replace("'",'',$noidung);
		$noidung = str_replace('""','"', $noidung);
        $data['noidung'] = $noidung;
		
		$tomtat = str_replace('=""','"',$_POST['tomtat']);
		$tomtat = str_replace("'",'"',$tomtat);
		$tomtat = str_replace('""','"', $tomtat);
        $data['tomtat'] = $tomtat;
		
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['giua'] = isset($_POST['giua']) ? 1 : 0;
		$data['duoi'] = isset($_POST['duoi']) ? 1 : 0;
		$data['id_menu'] = $_POST['id_menu'];
		
		$bo = str_replace('+','',$_POST['tieude']);
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
		
        $d->setTable('gioithieu');
        if($d->insert($data))
            redirect("index.php?com=gioithieu&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=gioithieu&act=man");
    }

}
function delete_item(){
    global $d;

    if(isset($_GET['id'])){
        $id =  themdau($_GET['id']);


        // xoa item
        $sql = "delete from #_gioithieu where id='".$id."'";
        if($d->query($sql))
            header("Location:index.php?com=gioithieu&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=gioithieu&act=man");
    }else transfer("Không nhận được dữ liệu", "index.php?com=gioithieu&act=man");
}
#--------------------------------------------------------------------------------------------- photo
?>