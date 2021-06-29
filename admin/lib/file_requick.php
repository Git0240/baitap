<?php

$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$d = new database($config['database']);//Goi CSDL

switch($com){
      
    case 'addcart':
        $source = 'addcart';
        $template = 'addcart'; // phai co template no moi chay dc 
        break;
    case 'ds1':
		$source = 'ds1';
        $template = 'ds1'; // phai co template no moi chay dc 
        break;
    
	
	case 'ds2':
		$source = 'ds2';
        $template = 'ds2'; // phai co template no moi chay dc 
        break;
		
	
    case 'gioithieu':
        $source = "gioithieu";
        $template = "gioithieu";
        break;
    
    case 'cart2':
        $source = "cart2";
        $template = "cart2";
        break;
    case 'search':
        $source = "chitiet_kiem";
        $template = "chi_tiet_tim_kiem";
        break;
    
    case 'thong-tin':
        $source = "chitiet_tt";
        $template = "chitiet_tt";
        break;
    
    case 'gui_hang':
        $source = 'gui_hang';
        $template = 'gui_hang';
        break;
    
    
    case 'cart':
        //$source = 'cart';
        $template = "cart";
        break;
    
  
    
    case 'delcart':
        $source = 'delcart';
        break;
    
    case 'hangsx':
        $source = 'chitiet_hang';
        $template = 'chitiet_hang';
        break;
    case 'kg':
        $source = 'chitiet_kg';
        $template = 'chitiet_kg';
        break;
    case 'hdh':
        $source = 'chitiet_dhd';
        $template = "chitet_dhd";
        break;
    case 'nlk':
        $source = 'chitiet_nlk';
        $template = 'chitiet_nlk';
        break;
    case 'nt':
        $source = 'chitiet_nt';
        $template = 'chitiet_nt';
        break;
    
    case 'ctsp':
        $source = "chitiet_sp";
        $template = "chitiet_sp";
        break;
    case 'ctlk':
        $source = "chitiet_lk";
        $template = "chitiet_lk";
        break;
    
    
     //case 'tinmenu':
//        $source = "tinmenu";
//        $template = isset($_GET['id']) ? "menu_detail" : "menu";
//        break;
//   
    

    
   
    
   
    
    case 'lienhe':
        $source = "lienhe";
        $template = "lienhe";
        break;

   

 
//    case 'timkiem':
//        if(!empty($_POST)){
//            $source = "timkiem";
//            $template = "timkiem";
//        }else{
//            $source = "index";
//            $template = "index";
//        }
//        break;


    default:
        $source = "index"; // trong source phai co file index.php
        $template = "index"; // con trong template phai co index_tpl.php
        break;
}



?>