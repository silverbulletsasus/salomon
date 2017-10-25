     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
	include "dbconnect.php";
	if(isset($_GET['lsp_ma']))
	{

		$lsp_ma = $_GET['lsp_ma'];
		$sql = "select * from loaisanpham where lsp_ma = $lsp_ma ";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$ten = $row['lsp_ten'];
		$mota = $row['lsp_mota'];
/*			$sql= "select * from loaisanpham where lsp_ten = '$ten'";
			$result =mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) != 0)
			{
				$sql = "update loaisanpham set lsp_mota = '$mota' where lsp_ten = '$ten' ";
				mysqli_query($conn, $sql);
				echo '<meta http_equiv = "refresh" content="0; URL=quanly_loaisanpham.php" />';
			}
			else 
				echo "<li>	ten da ton tai";*/
		
?>
<div class="container">
	<h2>Cập nhật sản phẩm</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo $ten; ?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Mô tả(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Mô tả" value='<?php echo $mota; ?>'>
							</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='index.php'" />                              	
						</div>
					</div>
				</form>
</div>
<?php
	}
	else
	{
		echo '<meta http-equiv = "refresh" content="0; URL=quanly_loaisanpham.php" />';
	}
	if( isset($_POST['btnCapNhat']))
	{
		$tenloai = $_POST['txtTen'];
		$noidung = $_POST['txtMoTa'];
		$loi = "";
		if($tenloai == "")
		{
			$loi .= "vui long nhap ten loai";
		}
		if($loi != "")
		{
			echo $loi;
		}
		else
		{
			$sql = "update loaisanpham set lsp_ten = '$tenloai', lsp_mota = '$noidung' where lsp_ma = $lsp_ma ";
			mysqli_query($conn, $sql);
			header ('location: quanly_loaisanpham.php');
		}
	}
?>
