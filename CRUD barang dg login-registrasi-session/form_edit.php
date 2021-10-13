<?

// menmapilkan file koneksi
require_once('koneksi.php');

// menegcek dan mendapatkan data session
require_once('session_check.php');

if ($sessionStatus== false) {
	header("Location: index.php");
}


// status tidak error
$error=0;

//mendapatkan data NIS
if (isset($_GET['id_barang'])) {
	$idBarang=$_GET['id_barang'];
}
else {
	echo "ID Barang tidak ditemukan! <a href='index.php'>Kembali</a>";
	exit();
}

$query="SELECT * FROM barang WHERE id_barang='$idBarang'";
$result=mysqli_query($mysqli,$query);

foreach($result as $barang){
	$idBarang=$barang['id_barang'];
	$namaBarang=$barang['nama_barang'];
	$harga=$barang['harga'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Edit Barang</title>
	<?

	require('config/style.php');
	require('config/script.php');

	?>
</head>
<body>
	<!-- header -->
	<?
	require('navbar/navbar.php');
	?>

	<div id="form" class="pt-5">
		
		<div class="container">

			<div class="row d-flex justify-content-center">

				<div class="col col-8 p-5 mb-5 bg-light">

					<form action="action_edit.php" method="POST">

						<div class="form-group mb-3">
							<label for="idBarang" class="mb-2">ID Barang</label>
							<input name="idBarang" id="idBarang"  class="form-control" type="text" placeholder="IDBxxx" value="<?=$idBarang?>" required>
						</div>

						<div class="form-group mb-3">
							<label for="namaBarang" class="mb-2">Nama Barang</label>
							<input name="namaBarang" id="namaBarang"  class="form-control" type="text" value="<?=$namaBarang?>" placeholder="Nama Barang" required>
						</div>

						<div class="form-group mb-3">
							<label for="harga" class="mb-2">Harga</label>
							<input name="harga" id="harga"  class="form-control" type="number" value="<?=$harga?>" placeholder="Harga Barang" required>
						</div>

						<input type="submit" name="submit" value="kirim" class="btn btn-primary">

					</form>

				</div>

			</div>

		</div>

	</div>
</body>
</html>