<!DOCTYPE html>
<html>
<head>
	<title>31 Virgiawan Dejan XI RPL 3 | BELAJAR GIT</title>
</head>
<body>
<?php
	include 'lib/library.php';	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nis			   = @$_POST['nis'];
		$nama_lengkap	   = @$_POST['nama_lengkap'];
		$jenis_kelamin	   = @$_POST['jenis_kelamin'];
		$kelas   		   = @$_POST['id_kelas'];
		$jurusan		   = @$_POST['jurusan'];
		$alamat		       = @$_POST['alamat'];
		$golongan_darah    = @$_POST['golongan_darah'];
		$nama_ibu_kandung  = @$_POST['nama_ibu_kandung'];
		$foto			   = @$_FILES['foto'];

	if (empty($nis)) {
		flash('error', 'Mohon masukkan NIS dengan benar');
	} else if (empty($nama_lengkap)) { 
		flash('error', 'Mohon masukkan Nama Lengkap dengan benar');
	} else {

	 if (!empty($foto) && $foto['error'] == 0) {
		$path = "./assets/images/";
		$upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

		if (!$upload) {
			flash('error', "Upload file gagal");
			header('location:index.php');
		}
		$file = $foto['name'];
	}

		
		//ini juga
		$sql = "INSERT INTO siswa (nis, nama_lengkap, jenis_kelamin, id_kelas, jurusan, alamat, golongan_darah, nama_ibu_kandung, file) VALUES
          ('$nis', '$nama_lengkap', '$jenis_kelamin', '$kelas', '$jurusan', '$alamat', '$golongan_darah', '$nama_ibu_kandung', '$file')"; 	

		$mysqli->query($sql) or die ($mysqli->error);

		header('location: index.php');
	}//ini untuk menutup else
}
	//tambahkan juga ini
	$success = flash('success');
	$error	 = flash('error');

	//Ambil data kelas
		$sql ="SELECT * FROM t_kelas";
		$dataKelas = $mysqli->query($sql) or die($mysqli->error);

	include 'views/v_tambah.php';

?>
</body>
</html>