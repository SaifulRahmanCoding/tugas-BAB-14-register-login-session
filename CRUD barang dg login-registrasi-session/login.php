<?

// menegcek dan mendapatkan data session
require_once('session_check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Petugas</title>
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

					<h2 class="mb-4">Login Admin</h2>

					<form action="action_login.php" method="POST">
						
						<div class="from-group mb-2">
							
							<label for="email">Alamat Email</label>
							<input name="email" id="email" type="email" class="form-control" placeholder="xxxx@mail.xx" required>

						</div>

						<div class="from-group mb-2">
							
							<label for="password">Password</label>
							<input name="password" id="password" type="password" class="form-control" placeholder="ketikkan password" required>

						</div>
						
						<p class="mt-4 mb-2" style="color:red; font-size: 12px;">
							*jika tidak memiliki akun, silahkan <a href="registration.php">Registrasi</a>
						</p>

						<input name="submit" type="submit" value="Kirim" class="btn btn-primary mt-4">

					</form>

				</div>

			</div>

		</div>

	</div>
</body>
</html>