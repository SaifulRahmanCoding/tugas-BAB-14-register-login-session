<?
// menmapilkan file koneksi
require_once('connection.php');

// menegcek dan mendapatkan data session
require_once('session_check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP dan MySQL</title>
	<?

	require('config/style.php');
	require('config/script.php');

	?>

	<!-- javascript -->
	<script type="text/javascript">
		function confirm_delete(){
			return confirm("Anda Yakin ?");
		}
	</script>

</head>
<body>
	<!-- header -->
	<?
	require('navbar/navbar.php');
	?>

	<!-- list siswa -->
	<div id="student-list">
		
		<div class="container">

			<? if ($sessionStatus) : ?>
			
			<div class="row mb-4 mt-2">
				
				<div class="col">
					
					<h2>Daftar Siswa</h2>

				</div>

				<div class="col text-end">
					
					<a href="form_siswa.php" class="btn btn-primary" role="button">Tambah Siswa</a>

				</div>

			</div>

			<div class="row">
				
				<div class="col">
					
					<table class="table table-striped responsive-utilities jambo_table bulk_action">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama</th>
								<th scope="col">Jenis Kelamin</th>
								<th scope="col">Alamat</th>
								<th scope="col">Usia</th>
								<th scope="col">Telepon</th><!-- 
								<th scope="col">ID Jurusan</th>
								<th scope="col">Nilai</th> -->
								<th scope="col">Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?

							// pemanggilan data dari tabel Siswa
							$query= "SELECT * FROM siswa";
							$result=mysqli_query($mysqli, $query);

							// menampilkan list data pada tabel siswa dengan mengginakan pengulangan foreach
							$i=1;
							foreach ($result as $siswa) {

								// penjelasan explode (dipecah menjadi array)

								// Explode("-","2001-10-22");
								// Array(2001, 10, 22);

								//janga  lupa index array dimulai dari 0 bukan 1. untuk data index 0 berarti 2001 dari contoh

								// membuat Usia dengan menggunakan selisih
								$tglLahir=explode("-",$siswa['tgl_lahir']);
								$tahunSekarang=date("Y");

								$selisihTahun=$tahunSekarang-$tglLahir[0];

								echo '
									<tr>
										<th scope="row">'.$i++.'</th>
										<td>'.$siswa['nama'].'</td>
										<td>'.$siswa['jk'].'</td>
										<td>'.$siswa['alamat'].'</td>
										<td>'.$selisihTahun.'</td>
										<td>'.$siswa['telepon'].'</td> <!--
										<td>'.$siswa['id_jurusan'].'</td>
										<td>'.$siswa['nilai'].'</td> -->
										<td>
											<a href="form_edit.php?nis='.$siswa['nis'].'" class="btn btn-success">Edit</a>
											<a href="delete.php?nis='.$siswa['nis'].'" onclick="return confirm_delete()" class="btn btn-danger">Delete</a>
										</td>
									</tr>
									';
							}

							?>

						</tbody>
					</table>

				</div>

			</div>

		<?  else : ?>
			<div class="container">

				<div class="row d-flex justify-content-center">

					<div class="col col-5 pt-4 mt-5 mb-5 bg-warning">
						<div class="form-group mb-3 d-flex justify-content-center">
							<label for="warning"><h5>Silahkan Login Terlebih Dahulu !</h5></label>
						</div>
					</div>

				</div>

			</div>

		<? endif; ?>

		</div>

	</div>
</body>
</html>