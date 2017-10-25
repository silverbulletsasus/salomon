<?php
	include("dbconnect.php");

	mysqli_query($conn, "insert into hinhthucthanhtoan(httt_ten) values('tien mat')") or die(mysqli_connect_error());
	mysqli_query($conn, "insert into hinhthucthanhtoan(httt_ten) values('chuyen khoan')") or die(mysqli_connect_error());
	mysqli_query($conn, "insert into hinhthucthanhtoan(httt_ten) values('Paypal')") or die(mysqli_connect_error());
?>