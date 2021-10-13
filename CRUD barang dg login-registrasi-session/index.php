<?
// menmapilkan file koneksi
require_once('koneksi.php');

// menegcek dan mendapatkan data session
require_once('session_check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Barang</title>
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

	<!-- List Barang -->
	<div id="daftar-barang">
		
		<div class="container">

			<? if ($sessionStatus) : ?>
			
			<div class="row mb-4 mt-5">
				
				<div class="col">
					
					<h2>Daftar Barang</h2>

				</div>

				<div class="col text-end">
					
					<a href="form_barang.php" class="btn btn-primary" role="button">Tambah Data Barang</a>

				</div>

			</div>

			<div class="row">
				
				<div class="col">
					
					<table class="table table-striped responsive-utilities jambo_table bulk_action">
						
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">ID Barang</th>
								<th scope="col">Nama Barang</th>
								<th scope="col">Harga</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>

						<tbody>
							
							<?

							// pemanggilan data dari tabel Siswa
							$query= "SELECT * FROM barang";
							$result=mysqli_query($mysqli, $query);

							// menampilkan list data pada tabel siswa dengan mengginakan pengulangan foreach
							$i=1;
							foreach ($result as $barang) {
								echo '<tr>

								<th scope="row">'.$i++.'</th>
								<td>'.$barang['id_barang'].'</td>
								<td>'.$barang['nama_barang'].'</td>
								<td>'.$barang['harga'].'</td>
								<td>
								<a href="form_edit.php?id_barang='.$barang['id_barang'].'" class="btn btn-success"><i class="fa fa-edit"></i></a>
								<a href="delete.php?id_barang='.$barang['id_barang'].'" onclick="return confirm_delete()" class="btn btn-danger"><i class="fa fa-remove"></i></a>
								</td>

								</tr>';

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