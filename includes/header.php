<!doctype html>

<header class="p-3 mb-3 border-bottom">
	<div class="container-fluid">
		<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
				<!-- <img src="../assets/img/logo.png" alt="" width="20" height="26"> -->
				<h4>PlanWays</h4>
			</a>

			<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				<li><a href="../dashboard" class="nav-link px-2 link-secondary">Home</a></li>
				<li><a href="#" class="nav-link px-2 link-dark">Actividades</a></li>
				<li><a href="#" class="nav-link px-2 link-dark">Planes</a></li>
			</ul>

			<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
				<input type="search" class="form-control" placeholder="Buscar..." aria-label="Buscar">
			</form>

			<div class="text-end">
			<?php if (isset($_SESSION['login'])) {?>
				<div class="dropdown text-end">
					<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="../assets/img/<?php echo($_SESSION['avatar']) ?>" width="32" height="32" class="rounded-circle">
					</a>
					<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser">
						<li><a class="dropdown-item" href="#">Settings</a></li>
						<li><a class="dropdown-item" href="../dashboard/profilePage.php">Profile</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="../api/logout.php">Sign out</a></li>
					</ul>
				</div>
			<?php
			}else{
				echo('<a href="loginPage.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>');
				echo('<a href="signupPage.php"><button type="button" class="btn btn-primary">Sign-up</button></a>');
			}
			?>
			</div>

			<!-- <div class="dropdown text-end">
			<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="#">New project...</a></li>
				<li><a class="dropdown-item" href="#">Settings</a></li>
				<li><a class="dropdown-item" href="#">Profile</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="#">Sign out</a></li>
			</ul>
			</div> -->
		</div>
	</div>
</header>

</html>