    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
<?php include_once "dbconnect.php"; ?>
<?php
  function bindlsp($conn, $selectedvalue)
  {
    $result = mysqli_query($conn, "select * from loaisanpham");
    echo "<select name='lsp'> <option value='0'>Chọn Loại Sản Phẩm </option>" ;
    while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      if($data['lsp_ma'] == $selectedvalue)
      {
        echo "<option value=". $data['lsp_ma']." selected>" .$data['lsp_ten']. "</option>";
      }
      else
      {
        echo "<option value=" .$data['lsp_ma']. ">" .$data['lsp_ten']. "</option>";
      }
    }
    echo "</select>";
  }

  function bindnsx($conn, $selectedvalue)
  {
    $result = mysqli_query($conn, "select * from nhasanxuat");
    echo "<select name='nsx'> <option value='0'>Chọn Nhà Sản Xuất </option>" ;
    while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      if($data['nsx_ma'] == $selectedvalue)
      {
        echo "<option value= ".$data['nsx_ma']." selected> ".$data['nsx_ten']." </option>";
      }
      else
      {
        echo "<option value=" .$data['nsx_ma']. ">" .$data['nsx_ten']. "</option>";
      }
    }
    echo "</select>";
  }
?>
<?php
  if(isset($_GET['sp_ma']))
  {
    $sp_ma = $_GET['sp_ma'];
    $result = mysqli_query($conn, "select * from sanpham where sp_ma = $sp_ma");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $loai = $row['lsp_ma'];
    $nsx = $row['nsx_ma'];
?>
<div class="container">
	<h2>Cập nhật sản phẩm</h2>
		
		
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên sản phẩm" value='<?php echo $row['sp_ten']; ?>'/>
							</div>
                      </div>   
                      <div class="form-group">   
                             <label for="" class="col-sm-2 control-label">Loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <?php bindlsp($conn, $loai);  ?>
							</div>
                        </div>
                        
                        <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Hãng sản xuất(*):  </label>
							<div class="col-sm-10">
							      <?php bindnsx($conn, $nsx);   ?>
							</div>
                          </div>   
                          
                          <div class="form-group">  
                            <label for="lblGia" class="col-sm-2 control-label">Giá(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtGia" id="txtGia" class="form-control" placeholder="Giá" value='<?php echo $row['sp_gia']; ?>'/>
							</div>
                            </div>   
                            
                            <div class="form-group">   
                            <label for="lblMoTa_Ngan" class="col-sm-2 control-label">Mô tả ngắn(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTaNgan" id="txtMoTaNgan" class="form-control" placeholder="Mô tả ngắn" value='<?php echo $row['sp_mota_ngan']; ?>'/>
							</div>
                            </div>
                            
                             <div class="form-group">  
                            <label for="lblMoTaChiTiet" class="col-sm-2 control-label">Mô tả chi tiết(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtMoTaChiTiet" rows="4" class="ckeditor"><?php echo $row['sp_mota_chitiet'];  ?></textarea>
              <script language="javascript">
                                        CKEDITOR.replace( 'txtMoTaChiTiet',
                                        {
                                            skin : 'kama',
                                            extraPlugins : 'uicolor',
                                            uiColor: '#eeeeee',
                                            toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                                ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                                ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                                ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                                ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                                ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                                ['Style','FontFormat','FontName','FontSize'],
                                                ['TextColor','BGColor'],[ 'UIColor' ] ]
                                        });
										
                                    </script> 
                                  
							</div>
                            </div>
                            
                            <div class="form-group">  
                            <label for="lblSoLuong" class="col-sm-2 control-label">Số lượng(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtSoLuong" id="txtSoLuong" maxlength="10" id="txtGia" class="form-control" placeholder="Số lượng" value='<?php echo $row['sp_soluong']; ?>'/>
							</div>
                            </div>
                            
                            
                            
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='?khoatrang=quanlysanpham'" />
                              	
						</div>
					</div>
				</form>
		</div>
<?php
    }
    else
    {
      echo "khong co tham so ";
    }
?>

<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>