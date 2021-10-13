<?

// menmapilkan file koneksi
require_once('connection.php');

// panggil file session check
require_once('session_check.php');
// status tidak error

if ($sessionStatus==false) {
	header("Location: index.php");
}

$error=0;

//mendapatkan data NIS
if (isset($_GET['nis'])) {
	$nis=$_GET['nis'];
}
else {
	echo "NIS tidak ditemukan! <a href='index.php'>Kembali</a>";
	exit();
}

$query="SELECT * FROM siswa WHERE nis='$nis'";
$result=mysqli_query($mysqli,$query);

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

	if ($siswa['jk']=='L') {
		$maleChecked="checked";
	}
	else if($siswa['jk']=='P'){
		$femaleChecked="checked";
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Edit</title>
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
							<label for="nis" class="mb-2">NIS</label>
							<input name="nis" id="nis" value="<?=$nis?>"  class="form-control" type="text" placeholder="Nomor Induk Siswa">
						</div>

						<div class="form-group mb-3">
							<label for="name" class="mb-2">Nama Lengkap</label>
							<input name="name" id="name" value="<?=$name?>" class="form-control" type="text" placeholder="Nama Lengkap" required>
						</div>

						<div class="form-group mb-3">
							<label class="mb-2">Jenis Kelamin</label>
							<div class="form-check">
								<input class="form-check-input" <?=$maleChecked?> type="radio" name="gender" id="male" value="L" required>
								<label class="form-check-label" for="male">Laki-Laki</label>
							</div>
							<div class="form-check disabled">
								<input class="form-check-input" <?=$femaleChecked?> type="radio" name="gender" id="female" value="P" required>
								<label class="form-check-label" for="female">Perempuan</label>
							</div>
						</div>

						<div class="form-group mb-3">
							<label for="address" class="mb-2">Alamat</label>
							<textarea name="address" class="form-control"id="address" rows="3" placeholder="Isikan Alamat Anda" required><?=$address?></textarea>
						</div>

						<div class="form-group mb-3">
							<label for="placeOfBirth" class="mb-2">Tempat Lahir</label>
							<input name="placeOfBirth" id="tmp_lahir" value="<?=$placeOfBirth?>" class="form-control" type="text" placeholder="" required>
						</div>

						<div class="form-group mb-3">
							<label for="dateOfBirth" class="mb-2">Tanggal Lahir</label>
							<input name="dateOfBirth" id="tgl_lahir" value="<?=$dateOfBirth?>" class="form-control" type="date" required>
						</div>

						<div class="form-group mb-3">
							<label for="phone" class="mb-2">Telepon</label>
							<input name="phone" id="phone" value="<?=$phone?>" class="form-control" type="text" placeholder="Nomor Telepon/Handphone" required>
						</div>

						<div class="form-group mb-3">
							<label for="idJurusan" class="mb-2">ID Jurusan</label>
							<input name="idJurusan" id="id_jurusan" value="<?=$idJurusan?>" class="form-control" type="text" placeholder="1 atau 2" required>
						</div>

						<div class="form-group mb-3">
							<label for="nilai" class="mb-2">Nilai</label>
							<input name="nilai" id="nilai" value="<?=$nilai?>" class="form-control" type="number" placeholder="masukkan nilai siswa" required>
						</div>

						<input type="submit" name="submit" value="kirim" class="btn btn-primary">

					</form>

				</div>

			</div>

		</div>

	</div>
</body>
</html>