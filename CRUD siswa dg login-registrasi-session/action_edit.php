<?

require_once('connection.php');

//mendapatkan data NIS
if (isset($_POST['nis'])) {
	$nis=$_POST['nis'];
}
else {
	echo "NIS tidak ditemukan! <a href='index.php'>Kembali</a>";
	exit();
}

// Query Get Data Siswa
$query="SELECT * FROM siswa WHERE nis='$nis'";

// eksekusi Query
$result=mysqli_query($mysqli,$query);

// fetching data
foreach ($result as $siswa) {
	$nis=$siswa['nis'];
	$name=$siswa['nama'];
	$address=$siswa['alamat'];
	$placeOfBirth=$siswa['tmp_lahir'];
	$dateOfBirth=$siswa['tgl_lahir'];
	$phone=$siswa['telepon'];
	$idJurusan=$siswa['id_jurusan'];
	$nilai=$siswa['nilai'];

	$maleChecked="";
	$femaleChecked="";
}

// inputan
if (isset($_POST['nis'])) {
	$nis=$_POST['nis'];
}
if (isset($_POST['name'])) {
	$name=$_POST['name'];
}
if (isset($_POST['gender'])) {
	$gender=$_POST['gender'];
}
if (isset($_POST['address'])) {
	$address=$_POST['address'];
}
if (isset($_POST['placeOfBirth'])) {
	$placeOfBirth=$_POST['placeOfBirth'];
}
if (isset($_POST['dateOfBirth'])) {
	$dateOfBirth=$_POST['dateOfBirth'];
}
if (isset($_POST['phone'])) {
	$phone=$_POST['phone'];
}
if (isset($_POST['idJurusan'])) {
	$idJurusan=$_POST['idJurusan'];
}
if (isset($_POST['nilai'])) {
	$nilai=$_POST['nilai'];
}
// menyiapkan Query MySQL untuk dieksekusi

$query="UPDATE siswa SET 
	  nama= '$name',
	  jk= '$gender',
	  alamat= '$address',
	  tmp_lahir= '$placeOfBirth',
	  tgl_lahir= '$dateOfBirth',
	  telepon = '$phone',
	  id_jurusan = '$idJurusan',
	  nilai = '$nilai'
	WHERE nis='$nis'";

// mengeksekusi MySQL Query
$insert=mysqli_query($mysqli,$query);

// menangani ketika error pada saat eksekusi query
if ($insert == false) {
	echo "Error dalam mengubah data. <a href='index.php'>Kembali</a>";
}
else{
	header("Location: index.php");
}
?>