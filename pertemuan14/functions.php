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

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2= mysqli_real_escape_string($conn,$data["password2"]);

	$result=mysqli_query($conn,"SELECT username FROM user where username = '$username'");

	if (mysqli_fetch_assoc($result)){
		echo " <script>
			alert('username sudah terdaftar');
		</script>"; 
		return false;
	}
	//cek password
	if ($password!== $password2){
		echo"<script>
			alert('konfirmasi password tidak sesuai');
		</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password,PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES('','$username' , '$password')");

	return mysqli_affected_rows($conn);
}

 ?>