<?

// menegcek dan mendapatkan data session
require_once('session_check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registrasi Petugas</title>
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
				
				<div class="col col-8 p-4 bg-light">
					
					<h2 class="mb-4">Buat Akun</h2>

					<form action="action_register.php" method="POST">
						
						<div class="from-group mb-2">
							
							<label for="email">Alamat Email</label>
							<input name="email" id="email" type="email" class="form-control" placeholder="xxxx@mail.xx" required>

						</div>

						<div class="from-group mb-2">
							
							<label for="name">Nama Lengkap</label>
							<input name="name" id="name" type="text" class="form-control" placeholder="Nama Lengkap" required>

						</div>

						<div class="from-group mb-2">
							
							<label for="password">Password</label>
							<input name="password" id="password" type="password" class="form-control" placeholder="ketikkan password" required>

						</div>

						<div class="from-group mb-2">
							
							<label for="re-password">Konfirmasi Password</label>
							<input name="re-password" id="re-password" type="password" class="form-control" placeholder="ketikkan ulang password" required>

						<input name="submit" type="submit" value="Kirim" class="btn btn-primary mt-4">

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>
</body>
</html>