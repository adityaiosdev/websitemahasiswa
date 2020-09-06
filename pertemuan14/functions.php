<?php 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
		global $conn;
		$result= mysqli_query($conn,$query);
		$rows=[];
		while ($row = mysqli_fetch_assoc($result)){
			$rows[]= $row;
		}
		return $rows;
}


function tambah($data){
		global $conn;
		$nim = htmlspecialchars($data["nim"]);
		$nama= htmlspecialchars($data["nama"]);
		$email=htmlspecialchars($data["email"]);
		$jurusan=htmlspecialchars($data["jurusan"]);
		$gambar=htmlspecialchars($data["gambar"]);

		$query = "INSERT INTO Mahasiswa 						VALUES ('','$nama', '$nim', '$email','$gambar', '$jurusan')";
			mysqli_query($conn,$query);
			return mysqli_affected_rows($conn);

}
function hapus($id){
	global $conn;
	mysqli_query($conn,"DELETE FROM mahasiswa where id=$id");
	return mysqli_affected_rows($conn);

}

function ubah($data){
	global $conn;
	$id= $data["id"];
	$nim = htmlspecialchars($data["nim"]);
	$nama= htmlspecialchars($data["nama"]);
	$email=htmlspecialchars($data["email"]);
	$jurusan=htmlspecialchars($data["jurusan"]);
	$gambar=htmlspecialchars($data["gambar"]);

	$query = "UPDATE mahasiswa SET
				nama = '$nama',
				nim= '$nim',
				email= '$email',
				jurusan= '$jurusan',
				gambar= '$gambar'

				where id = $id
				";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}

function cari($keyword){
	$query= "SELECT * FROM Mahasiswa 
			WHERE 
			nama LIKE '%$keyword%' OR
			nim LIKE '%$keyword%' OR
			email LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%' OR
			gambar LIKE '%$keyword%'";
	return query($query);
}

 ?>