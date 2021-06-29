<?php include('../ketnoi.php'); ?>
<h3>Thông tin</h3>

<form name="frm" method="post" enctype="multipart/form-data" class="nhaplieu">
<div style="display:none;">	
    
	<b>Chọn album:(<span style="color:#FF0000;">*</span>)</b>
    
    <?php  
    echo "<select name=\"id_menu\" id=\"id_menu\">";
    print '<option value ="' . @$item['id_menu'] . '">lựa chọn album</option>';
    for ($i = 0, $count = count($item_nhomtin); $i < $count; $i++) {
        print '<option value="' . $item_nhomtin[$i]['id'] . '">' . $item_nhomtin[$i]['ten'] . '</option><br/>';
    }
	print '<option value ="0">Không chọn</option>';
    echo "</select>";
    ?>
	

	 <br><br />
	<b>Chọn chủ đề con cấp 1:(<span style="color:#FF0000;">*</span>)</b>
    <select name="id_tintuc" id="id_tintuc" class="quoc_ola">
        <?php 
            $sql = "select * from #_doitac ";
            $d->query($sql);
            $result = $d->result_array();
            foreach ($result as $value) {
                if ($value['parentid'] == 0) {
                    
        ?>
        <optgroup label="<?php echo $value['ten']; ?>">
            <option value="<?= @$item['id_tintuc'] ?>"></option>
            <?php 
                $id = $value['id'];
                foreach ($result as $value2) {
                    if ($value2['parentid'] == $id) {
                        ?>
                        <option value="<?php echo $value2['id']; ?>"><?php  echo $value2['ten']; ?></option>
            <?php
                    }
                }
            ?>
            
            <?php } ?>
        </optgroup>
        <?php
            }
        ?>
		<option value ="0">Không chọn</option>
    </select>
    <br>
	<br />	
</div>	
	
	
	<br /><br />
    <b></b>
		<br />
    <br>
	
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh:(<span style="color:#FF0000;">*</span>) </label>
                      <div class="col-sm-10">
						<input type="file" name="files[]" class="form-control" multiple="multiple"  accept="image/*" >
                      </div>
                    </div>
	
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=albumkh&act=man'" class="btn" />
	
<?php

function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}


$valid_formats = array("jpg", "png", "gif", "zip", "bmp","JPG");
$max_file_size = 1024*1000; //1MB
$path = "../media/upload/albumkh/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){


$k=0;
	// Loop $_FILES to execute all files
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "<b style='float:none; width:inherit;'>$name quá kích cỡ cho phép!. </b>";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name không đúng định dạng file hình";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
				 $result = '';
				for ($i = 0; $i < 8; $i++) {
					$result.=rand(0, 9);
				}
				
				$filename = stripslashes($name);
				$extension = getExtension($filename);
				$extension = strtolower($extension);
				
				$result = '';
				for ($i = 0; $i < 8; $i++) {
					$result.=rand(0, 9);
				}
				$name2 = $result.'.'.$extension;
				$id_tin = $_POST['id_tintuc'];
				$id_menu = $_POST['id_menu'];
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name2)) {
														
							$sql = mysqli_query($con,"insert into table_albumkh(hinh,id_tintuc,id_menu) values('$name2','$id_tin','$id_menu') ");
							
						if(isset($sql)){$k=1;}
						
	            	$count++; // Number of successfully uploaded files
	          	 }
	      	 }
	   	 }
		}
	if($k=1){echo "Thêm thành công";}
}
?>	

<?php
		# error messages
		if (isset($message)) {
			foreach ($message as $msg) {
				printf("<p class='status'>%s</p></ br>\n", $msg);
			}
		}
		# success message
		if($count !=0){
			printf("<p class='status'>thêm %d file hình thành công!</p>\n", $count);
		}
	?>

</form>