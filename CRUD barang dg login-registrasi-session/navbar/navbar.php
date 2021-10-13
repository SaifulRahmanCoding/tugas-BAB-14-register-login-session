<nav class="navbar navbar-expand-lg navbar-light bg-light">

	<div class="container">

		<!-- navbar brand -->
		<a href="#" class="navbar-brand">

			<img src="img/jong_koding_logo.png" />

		</a>

		<!-- navbar toggler -->
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

			<span class="navbar-toggler-icon"></span>

		</button>

		<!-- navbar collapse -->
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">

				<li class="nav-item">
					<a href="index.php" class="nav-link" aria-current="page">Daftar Barang</a>
				</li>

				<? if ($sessionStatus == false) : ?>

				<li class="nav-item">
					<a href="login.php" class="nav-link" aria-current="page">Login</a>
				</li>

			<? else : ?>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="logout.php">Logout</a>
				</li>

			<? endif; ?>

				<li class="nav-item">
					<a href="registration.php" class="nav-link" aria-current="page">Registrasi</a>
				</li>
				
			</ul>

		</div>

	</div>

</nav>