
<div class="col-xs-12">

	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Thông tin</h3><br />				  
				           	
				</div><!-- /.box-header -->
                <div class="box-body">
				
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        
        
        <th width="9%" style="width:30%;">Ảnh banner</th>
       
        <th width="9%" style="width:6%;">Sửa</th>
        <!--<th width="9%" style="width:6%;">Xóa</th>-->
    </tr>
</thead>
    
	<tbody>
    <?php for ($i = 0, $count = count($items); $i < $count; $i++) { ?>
        <tr>
           
            <td style="width:12%;" align="center"><img src="<?= _upload_sl . $items[$i]['photo'] ?>" width="500" title="Ảnh minh họa" alt="Chưa cập nhật hình"> </td>
            

            <td style="width:6%;" align="center"><a href="index.php?com=bannertren&act=edit&id=<?= $items[$i]['id'] ?>"><img src="media/images/edit.png"  border="0"/></a></td>
           
        </tr>
<?php } ?>

	</tbody>
</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
</div>