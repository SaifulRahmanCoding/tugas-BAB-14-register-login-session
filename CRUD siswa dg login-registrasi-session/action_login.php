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
	echo "kesalahan email";
}

if (isset($_POST['password'])) {
	$password=$_POST['password'];
}
else{
	$error=1; //status error
	echo "kesalahan password";
}

// mengatasi jika terdapat error pada data inputan
if ($error==1) {
	echo "Terjadi kesalahan pada proses input data  <a href='login.php'>Kembali</a>";
	exit();
}

// hasing password
$password=hash("sha256", $password);

// menyiapkan Query MySQL untuk dieksekusi
$query="SELECT * FROM petugas WHERE email='{$email}'";

// mengekesekusi MySQL Query
$result=mysqli_query($mysqli,$query);

// karena pemanggilan data hanya satu, maka menggunakan syntax di bawah ini. (intinya tidak menggunkan perulangan foreach)
$data=mysqli_fetch_assoc($result);

if (is_null($data)) {
	echo "Email tidak terdaftar <a href='login.php'>Kembali</a>";
	exit();
}
else if( $data['password'] != $password){
	echo "password salah <a href='login.php'>Kemblai</a>";
	exit();
}
else{
	// memulai fungsi SESSION, session hanya dapat digunakan setelah fungsi ini
	session_start();

	$_SESSION['status']=true;
	$_SESSION['name']=$data['nama'];
	$_SESSION['email']=$data['email'];

	header("Location: index.php");
}

?>