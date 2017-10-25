    <!-- Bootstrap -->
    <?php
      require_once "dbconnect.php";
    ?>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<?php
  if(isset($_POST['btnThemMoi']))
  {
    $tensp = $_POST['txtTen'];
    $lsp = $_POST['lsp'];
    $nsx = $_POST['nsx'];
    $gia = $_POST['txtGia'];
    $mota = $_POST['txtMoTaNgan'];
    $motachitiet = $_POST['txtMoTaChiTiet'];
    $soluong = $_POST['txtSoLuong'];
    $loi = "";
    if($tensp == "" || $mota == "" || $lsp == '0' || $nsx == '0')
    {
       echo "Vui Lòng Nhập Đầy Đủ các Thông Tin !";
    }
    if($loi != "")
    {
      echo $loi;
    }
    else 
    {
       $sql = "insert into sanpham(sp_ten, sp_gia, sp_mota_ngan, sp_mota_chitiet, sp_ngaycapnhat, sp_soluong, lsp_ma, nsx_ma) values('$tensp', '$gia', '$mota', '$motachitiet', '".date('Y-m-d H:i:s')."', '$soluong', '$lsp', '$nsx')";
       mysqli_query($conn, $sql);
       echo "<meta http-equiv='refresh' content='0; URL=?khoatrang=sanpham'>";
    }
  }
?>
<div class="container">
	<h2>Thêm sản phẩm</h2>

	 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value=''/>
							</div>
                      </div>   
                      <div class="form-group">   
                             <label for="" class="col-sm-2 control-label">Loại sản phẩm(*):  </label>
							<div class="col-sm-10">
                    <select name = "lsp">
                    <option value="0">Chọn Loại Sản Phẩm </option>
							      <?php 
                        $sql = "select * from loaisanpham ";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                    ?>
                        <option value="<?php echo $row['lsp_ma']; ?>"> <?php echo $row['lsp_ten']; ?> </option>
                    <?php
                        }
                    ?>
                    </select>
							</div>
                       </div>
                        
                        <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Hãng sản xuất(*):  </label>
							<div class="col-sm-10">
							      <select name = "nsx">
                    <option value="0"> Chọn Nhà Sản Xuất </option>
                    <?php 
                        $sql = "select * from nhasanxuat ";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                    ?>
                        <option value="<?php echo $row['nsx_ma']; ?>"> <?php echo $row['nsx_ten']; ?> </option>
                    <?php
                        }
                    ?>
                    </select>
							</div>
                        </div>   
                          
                          <div class="form-group">  
                            <label for="lblGia" class="col-sm-2 control-label">Giá(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtGia" id="txtGia" class="form-control" placeholder="Giá" value=''/>
							</div>
                            </div>   
                            
                            <div class="form-group">   
                            <label for="lblMoTa_Ngan" class="col-sm-2 control-label">Mô tả ngắn(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTaNgan" id="txtMoTaNgan" class="form-control" placeholder="Mô tả ngắn" value=''/>
							</div>
                            </div>
                            
                             <div class="form-group">  
                            <label for="lblMoTaChiTiet" class="col-sm-2 control-label">Mô tả chi tiết(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtMoTaChiTiet" rows="4" class="ckeditor"></textarea>
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
							      <input type="text" name="txtSoLuong" id="txtSoLuong" maxlength="10" class="form-control" placeholder="Số lượng" value=""/>
							</div>
                        </div>
 
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='index.php'" />
                              	
						</div>
					</div>
				</form>
		</div>


<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>