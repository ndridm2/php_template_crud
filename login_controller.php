<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config/koneksi.php';
 
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai 
	if($data['role']== "1"){
		// buat session login dan username
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "1";
		// alihkan ke halaman dashboard 
		header("location:index.php?halaman=dashboard");

	// cek jika user login sebagai
	}else if($data['role']== "2"){
		// buat session login dan email
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "2";
		// alihkan ke halaman dashboard 
		header("location:user/index.php?halaman=dashboard");
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}