<?

require_once('koneksi_admin.php');

// status tidak error
$error=0;

// mamvalidasi inputan
if (isset($_POST['email'])) {
	$email=$_POST['email'];
}
else{
	$error=1; //status error
}

if (isset($_POST['name'])) {
	$name=$_POST['name'];
}
else{
	$error=1; //status error
}

if (isset($_POST['password'])) {
	$password=$_POST['password'];
}
else{
	$error=1; //status error
}

if (isset($_POST['re-password'])) {
	$repassword=$_POST['re-password'];
}
else{
	$error=1; //status error
}

// mengatasi jika terdapat error pada data inputan
if ($error==1) {
	echo "Terjadi kesalahan pada proses input data  <a href='registration.php'>Kembali</a>";
	exit();
}

// pengecekan password dan konfirmasi password
if ($password != $repassword) {
	echo "password tidak sama, ulangi mengisi pendaftaran <a href='registration.php'>Kembali</a>";
	exit();
}
else{
	$password=hash("sha256", $password);
}

// menyiapkan Query MySQL untuk dieksekusi
$query= "INSERT INTO petugas (email, nama, password) VALUES ('$email', '$name', '$password')";

// mengeksekusi MySQL Query
$insert=mysqli_query($mysqli, $query);

// menangani ketika error pada saat eksekusi query
if ($insert == false) {
	echo "Error dalam menambah data. <a href='registration.php'>Kembali</a>";
}else{
	header("Location: login.php");
}
?>