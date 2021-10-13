<?
$mysqli=new mysqli("localhost","root","","admin");

// cek koneksi
if ($mysqli->connect_error) {
	echo "Gagal menyambungkan ke MySQL : ".$mysqli->connect_error;
	exit();
}
?>