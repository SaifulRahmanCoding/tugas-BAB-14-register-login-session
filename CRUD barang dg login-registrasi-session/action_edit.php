<?

require_once('koneksi.php');

// mendapatkan data id barang dari Form
if (isset($_POST['idBarang'])) {
	$idBarang=$_POST['idBarang'];
}
else {
	echo "ID Barang tidak ditemukan! <a href='index.php'>Kembali</a>";
	exit();
}

// Query Get Data barang
$query="SELECT * FROM barang WHERE id_barang='{$idBarang}'";

// eksekusi Query
$result=mysqli_query($mysqli,$query);

// fetching data
foreach($result as $barang){
	$idBarang=$barang['id_barang'];
	$namaBarang=$barang['nama_barang'];
	$harga=$barang['harga'];

}

//inputan dari Form

if (isset($_POST['idBarang'])){
	$idBarang=$_POST['idBarang'];
}

if (isset($_POST['namaBarang'])){
	$namaBarang=$_POST['namaBarang'];
}

if (isset($_POST['harga'])){
	$harga=$_POST['harga'];
}


// menyiapkan Query MySQL untuk dieksekusi

$query="UPDATE barang SET 
		nama_barang = '{$namaBarang}', 
		harga = '{$harga}' 
		WHERE id_barang = '{$idBarang}'";

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
