<?

require_once('connection.php');

// panggil file session check
require_once('session_check.php');

if ($sessionStatus==false) {
	header("Location: index.php");
}

//mendapatkan data NIS
if (isset($_GET['nis'])) {
	$nis=$_GET['nis'];
}
else{ echo "NIS tidak ditemukan! <a haref='index.php'>Kembali</a>";
	exit();
}

// Query Get data siswa
$query="DELETE FROM siswa WHERE nis='$nis'";

// eksekusi Query
$result=mysqli_query($mysqli,$query);

if (!$result) {
	exit("Gagal Menghapus Data!");
}

header("Location:index.php");

?>