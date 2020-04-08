<!DOCTYPE html>
<html>
<head>
	<title>31 Virgiawan Dejan XI RPL 3</title>
</head>
<body>
<?php
		include 'lib/library.php';

		$nis = $_GET['nis'];
		$mysqli -> query ("DELETE FROM siswa WHERE nis = '$nis' ") or die(mysql_error());

		if(!empty($nis)) {
			echo 1;
		} else {
			echo 0;
		}

		if (empty($siswa)) header('location: index.php');
			
		include 'views/v_tambah.php';
		
?>
</body>
</html>