<link rel="stylesheet" type="text/css" href="style.css"/>
<?php
if (isset($_POST['btnLogin'])) {
    $tendangnhap = $_POST["txtTenDangNhap"];
    $matkhau = $_POST["txtMatKhau"];
    
    $loi = "";
   	if(trim($tendangnhap)==""){
		$loi .= "Vui lòng nhập tên đăng nhập!<br/>";
	}
	if(trim($matkhau)==""){
		$loi .= "Vui lòng nhập mật khẩu!<br/>";
	}

	if($loi != ""){
		echo "<span class=\"cssLoi\">".$loi."</span>";
	}
	else{
		include_once "dbconnect.php";
        $tendangnhap = mysqli_real_escape_string($conn, $tendangnhap);
        $matkhau = md5($matkhau);
        $sql = "select * from khachhang where kh_tendangnhap='$tendangnhap' and kh_matkhau = '$matkhau'";
        $result = mysqli_query($conn, $sql);
        $kq = mysqli_num_rows($result);
        echo $kq;
        if($kq == 1)
        {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['tendangnhap'] = $tendangnhap;
            $_SESSION['quantri'] = $row['kh_quantri'];
            echo "<script language='javascript'>window.location='index.php'</script>";
            /*echo "<span class = \"cssloi\">Dang nhap thanh cong </span>";*/   
            
        }
        else
        {
            echo "<span class = \"cssloi\">Dang nhap khong thanh cong </span>"; 
        }

	}
}
?>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="TableContainer">
    <tr>
        <td class="Header">ĐĂNG NHẬP
        </td>
    </tr>
    <tr>
        <td>
            <form id="form1" name="form1" method="post" action="">
                <table width="100%" border="1" cellpadding="5" cellspacing="0" class="TableForm">	  
                    <tr>
                        <td width="35%" class="Left">Tên đăng nhập: </td>
                        <td>
                            <input name="txtTenDangNhap" type="text" id="txtTenDangNhap" />
                        </td>
                    </tr>
                    <tr>
                        <td class="Left">Mật khẩu: </td>
                        <td><input name="txtMatKhau" type="password" id="txtMatKhau" /></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td ><input name="btnLogin" type="submit" class="Button" id="btnLogin" value="Đăng nhập"/>
                            <input name="chkRemember" type="checkbox" id="chkRemember" value="1" />
                            Ghi nhớ đăng nhập</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" class="Bottom"><a href="#">Quên mật khẩu?</a> </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>