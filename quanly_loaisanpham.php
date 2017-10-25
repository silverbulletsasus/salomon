    <!-- Bootstrap --> 
  <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Jquery -->
  <script src="js/jquery-3.2.0.min.js"/></script>
  <script src="js/jquery.dataTables.min.js"/></script>
  <script src="js/dataTables.bootstrap.min.js"/></script>
  <script language="javascript">
    $(document).ready(function(){
      var table = $('#tablesalomon').DataTable({
        responsive: true,
        "language": {
            "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
            "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
            "infoEmpty": "Dữ liệu rỗng",
            "emptyTable": "Chưa có dữ liệu nào",
            "processing": "Đang xử lý...",
            "search": "Tìm kiếm:",
            "loadingRecords": "Đang load dữ liệu...",
            "zeroRecords": "không tìm thấy dữ liệu",
            "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu)",
            "paginate": {
              "first": "|<",
              "last": ">|",
              "next": ">>",
              "previous": "<<"
            }
        },
        "lengthMenu": [[2, 5, 10, 15, 20, 25, 30, -1], [2, 5, 10, 15, 20, 25, 30, "Tất cả"]]
      });
      new $.fn.dataTable.FixedHeader( table );
    });
  </script>

        <form name="frmXoa" method="post" action="">
        <h1>Danh sách loại sản phẩm</h1>
        <p>
        <a href="quanly_loaisanpham_themmoi.php"><img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới </a>
        </p>
        <table id="tablesalomon" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Số thứ tự</strong></th>
                    <th><strong>Tên loại sản phẩm</strong></th>
                     <th><strong>Mô tả</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>

            <?php
        include "dbconnect.php";
				$stt=1;
				$result = mysqli_query($conn, "SELECT * FROM loaisanpham");
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
			?>
			<tr>
              <td class="cotCheckBox"><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php echo $row['lsp_ma']; ?>"></td>
              <td class="cotCheckBox"><?php echo $stt; ?></td>
              <td><?php echo $row["lsp_ten"] ?></td>
              <td><?php echo $row["lsp_mota"] ?></td>
             
              <td align='center' class='cotNutChucNang'><a href="?khoatrang=loaisanphamcapnhat&lsp_ma=<?php echo $row['lsp_ma']; ?>"><img src='images/edit.png' border='0'  /></a></td>
              <td align='center' class='cotNutChucNang'><a href="?khoatrang=loaisanpham&lsp_ma=<?php echo $row['lsp_ma'];?>" onclick="return deleteForm()"><img src='images/delete.png' border='0' /></a></td>
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
     if(confirm("Ban co chac chan muon xoa !"))
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
    if(isset($_GET['lsp_ma']))
    {
      $lsp_ma = $_GET['lsp_ma'];
      mysqli_query($conn, "delete from loaisanpham where lsp_ma = '$lsp_ma'");
      echo '<meta http-equiv="refresh" content="0; url=quanly_loaisanpham.php">';
    }
  ?>
  <?php
      if(isset($_POST["btnXoa"]) && isset($_POST['checkbox']))
      {
         for($i = 0; $i < count($_POST['checkbox']); $i++)
         {
            $masanpham = $_POST['checkbox'][$i];
            mysqli_query($conn, "delete from loaisanpham where lsp_ma = $masanpham");
         }
         echo '<meta http-equiv="refresh" content="0; URL=quanly_loaisanpham.php">';
      }
  ?>
