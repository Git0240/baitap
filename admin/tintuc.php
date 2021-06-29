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
		
    case 'sp':
        $source = "sanpham";
        break;
	
    default:
        $source = "";
        $template = "index";
        break;
}

if ($source != "")
    include _source . $source . ".php";
?>

