<?php

// mengaktifkan session php

session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from akun_user where username='$username' and passwd='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$data_profil = mysqli_query($conn,"select * from tbl_profile where username='$username'");
	$row_akun = mysqli_fetch_array($data_profil);
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION["name"] = $row_akun["name"];
	$_SESSION["website"] = $row_akun["website"];
	$_SESSION["bio"] = $row_akun["bio"];
	$_SESSION["email"] = $row_akun["email"];
	$_SESSION["no_hp"] = $row_akun["no_hp"];
	$_SESSION["gender"] = $row_akun["gender"];
	header("location:feed.php");
}else{
	header("location:index.php");

}

?>