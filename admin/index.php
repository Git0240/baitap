<?php
session_start();
@define('_template', './templates/');
@define('_source', './sources/');
@define('_lib', './lib/');

include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";

$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$login_name = 'AMTECOL';

$d = new database($config['database']);
/* Link den cac muc trong phan admin, com bien */
switch ($com) {
	
	case 'tailieu':
        $source = "tailieu";
        break;	
	
	case 'tbmang':
        $source = "tbmang";
        break;
		
	case 'popup':
        $source = "popup";
        break;
		
	case 'gamenet':
        $source = "gamenet";
        break;	
		
	case 'chuchay':
        $source = "chuchay";
        $template = "chuchay";
        break;
	
	case 'bannertren':
        $source = "bannertren";
        $template = "bannertren";
        break;
		
	case 'albumkh':
        $source = "albumkh";
        break;
		
	case 'baivietlienhe':
        $source = "baivietlienhe";
        break;	
	
    case 'an':
        $source = "anhnhieu";
        $template = "anhnhieu";
        break;
    case 'menu_doc':
        $source = "menu_doc";
        $template = "menu_doc";
        break;
		
    case 'user':
        $source = "user";
        break;
		
	case 'traodoinoibo':
        $source = "traodoinoibo";
        break;	
		
	 case 'tuvan':
        $source = "tuvan";
        break;	
		
    case 'thanhtich':
        $source = "thanhtich";
        break;
	
    case 'htkd':
        $source = "htkd";
        break;
    
	case 'hinhdaidien':
        $source = "hinhdaidien";
        break;
	
    case 'htkt':
        $source = "htkt";
        break;
		
	case 'htdl':
        $source = "htdl";
        break;
	case 'htbh':
        $source = "htbh";
        break;
	case 'bh':
        $source = "bh";
        break;
	case 'htpg':
        $source = "htpg";
        break;
	
	case 'donhang':
        $source = "donhang";
        break;
		
    case 'hotline':
        $source = "hotline";
        break;
    case 'fter':
        $source = "fter";
        break;
    
    case 'nhomtin':
        $source = "nhomtin";
        break;
    case 'sp':
        $source = "sanpham";
        break;
    case 'hang':
        $source = "hangsx";
        break;
	case 'noidunghangsx':
        $source = "noidunghangsx";
        break;
	
    case 'kg':
        $source = "khoanggia";
        break;
    case 'hdh':
        $source = "hedh";
        break;
    case 'sl':
        $source = "sl";
        break;
    case 'lk':
        $source = 'linhkien';
        break;
    case 'nlk':
        $source = "nhomlk";
        break;
    case 'khachhang':
        $source = "khachhang";
        break;
    case 'dattour':
        $source = "dattour";
        break;
    case 'lienhe':
        $source = "lienhe";
        break;
    case 'loaitour':
        $source = "loaitour";
        break;
    case 'chitiet_dattour':
        $source = "chitiet_dattour";
        break;
    case 'dsachkh_dat_tour':
        $source = "dsachkh_dat_tour";
        break;
    case 'bannerqc':
        $source = "bannerqc";
        break;
    case 'tintuc':
        $source = "tintuc";
        break;
    case 'chuong_trinh_tour':
        $source = "chuong_trinh_tour";
        break;
    case 'doitac':
        $source = "doitac";
        break;
    case 'gioithieu':
        $source = "gioithieu";
        break;
	case 'dichvu':
        $source = "dichvu";
        break;
	case 'congtrinhtieubieu':
        $source = "congtrinhtieubieu";
        break;
	case 'congtrinhhoanthien':
        $source = "congtrinhhoanthien";
        break;
	
    case 'tuyendung':
        $source = "tuyendung";
        break;
	case 'doitac':
        $source = "doitac";
        break;	
	case 'khuyenmai':
        $source = "khuyenmai";
        break;
	case 'quydinhkhuyenmai':
        $source = "quydinhkhuyenmai";
        break;	
		
	case 'chitiet_menu':
        $source = "chitiet_menu";
        break;	
	
	
    case 'khachsan':
        $source = "khachsan";
        break;
    case 'footer':
        $source = "footer";
        break;
    default:
        $source = "";
        $template = "index";
        break;
}

if ((!isset($_SESSION[$login_name]) || $_SESSION[$login_name] == false) && $act != "login") {
    redirect("index.php?com=user&act=login");
}

if ($source != "")
    include _source . $source . ".php";
?>
<?php if (isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)) { ?>

<!DOCTYPE html>
<html>
  <head>

	<?php include('head.php'); ?>
	
	    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	
	<script src="plugins/iCheck/icheck.min.js"></script>
	<!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
  	
  </head>
  <body class="hold-transition skin-blue sidebar-mini">  
  
    <div class="wrapper">

      <?php include('header.php'); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include('content_left.php'); ?>
      <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	
	 <?php include _template . $template . "_tpl.php"; ?>
	
	</div>	
	  <?php include('footer.php'); ?>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    

    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
	

  </body>
</html>

<?php } else {  include _template . $template . "_tpl.php";  } ?>
