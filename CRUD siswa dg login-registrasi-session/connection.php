<?
$mysqli=new mysqli("localhost","root","","coba_sekolah");

// cek koneksi
if ($mysqli->connect_error) {
	echo "Gagal menyambungkan ke MySQL : ".$mysqli->connect_error;
	exit();
}
?>