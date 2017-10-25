    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php
			include_once 'dbconnect.php';
		?>
        <form name="frmXoa" method="post" action="">
        <h1>Quản lý sản phẩm</h1>
        <p>
        	<a href="?khoatrang=sanphamthemmoi"><img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới </a>
        </p>
        <table id="tablesalomon" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Mã sản phẩm</strong></th>
                    <th><strong>Tên sản phẩm</strong></th>
                    <th><strong>Giá</strong></th>
                    <th><strong>Số lượng</strong></th>
                    <th><strong>Loại sản phẩm</strong></th>
                    <th><strong>Nhà sản xuất</strong></th>
                    <th><strong>Hình ảnh</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
					$stt = 1;
				$result = mysqli_query($conn, "SELECT sp_ma, sp_ten, sp_mota_ngan, sp_gia, sp_ngaycapnhat, sp_soluong,lsp_ten, nsx_ten FROM sanpham a JOIN loaisanpham b ON a.lsp_ma = b.lsp_ma JOIN nhasanxuat c ON a.nsx_ma = c.nsx_ma ORDER BY sp_ma DESC");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			?>
			<tr>
              <td><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php echo $row['sp_ma']; ?>"></td>
              <td ><?php echo $stt; ?></td>
              <td><?php echo $row["sp_ten"] ?></td>
              <td><?php echo $row["sp_gia"] ?></td>
               <td ><?php echo $row["sp_soluong"] ?></td>
              <td><?php echo $row["lsp_ten"] ?></td>
              <td><?php echo $row["nsx_ten"] ?></td>
              
              
             <td align='center' class='cotNutChucNang'><a href="?khoatrang=sanphamhinhanh&sp_ma=<?php echo $row['sp_ma']; ?>"><img src='images/image_edit.png' border='0'  /></a></td>
             
              <td align='center' class='cotNutChucNang'>
              <a href="?khoatrang=sanphamcapnhat&sp_ma=<?php echo $row['sp_ma']; ?>"><img src='images/edit.png' border='0'/></a>
              </td>
              
              <td align='center' class='cotNutChucNang'>
              	<a href="?sp_ma=<?php echo $row['sp_ma'] ?>" onclick="return deleteForm()"><img src='images/delete.png' border='0' /></a>
              </td>
            </tr>
            <?php
            $stt++;
				}
				?>
			</tbody>
        </table>  
        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
               <input type="submit" name="btnXoa" id="btnXoa" value="Xóa Mục Chọn" onclick="return deleteForm()" class="btn btn-primary" />
            </div>
        </div><!--Nút chức nang-->

 </form>
 <script type="text/javascript">
    function deleteForm()
    {
      if(confirm("Bạn chắc chắn muốn xóa sản phẩm này ?"))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
 </script>
 <?php
    if(isset($_GET['sp_ma']))
    {
        $sp_ma = $_GET['sp_ma'];
        mysqli_query($conn, "delete from sanpham where sp_ma = $sp_ma");
        echo '<meta http-equiv="refresh" content="0; URL=?khoatrang=sanpham">';
    }
 ?>
 <?php
    if(isset($_POST['btnXoa']) && isset($_POST['checkbox']))
    {
      for($i = 0; $i < count($_POST['checkbox']); $i++)
      {
        $masanpham = $_POST['checkbox'][$i];
        mysqli_query($conn, "delete from sanpham where sp_ma = $masanpham");
      }
      //var_dump($_POST['checkbox']);
      echo '<meta http-equiv="refresh" content="0; URL=?khoatrang=sanpham">';
    }
 ?>
