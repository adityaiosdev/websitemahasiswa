<?php 
	//koneksi ke database

require 'functions.php';

$mahasiswa= query ("SELECT * FROM mahasiswa ORDER BY id DESC");
	// ambil data mahasiswa

if  (isset($_POST["cari"])){
	$mahasiswa = cari($_POST["keyword"]);
}

//$mhs= mysqli_fetch_row($result);
//var_dump($mhs[3]);
 ?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<title>Halaman Admin</title>
</head>
<body>
	<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="img/mahasiswa.png " style="width: 50px">
    Halaman Admin
  </a>
</nav>
<h1>Halo, Selamat datang !</h1>
<br>
<br>
<h2 style="font-weight: 500px;">Daftar Mahasiswa</h2>

<a href="tambah.php">Tambah Data Mahasiswa</a>

<form action="" method="post">
	<input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
</form>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
	<?php $i = 1; ?>
	<?php 	foreach ($mahasiswa as $row) : ?> 

	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"];  ?>">ubah</a> |
			<a href ="hapus.php?id=<?= $row["id"]; ?>">hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
</table>

</body>
</html>