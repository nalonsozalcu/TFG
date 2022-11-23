<?php require_once "modals.html"; ?>
<!doctype html>

<header class="p-3 border-bottom" style = "background-color: #f7f6fb;">
	<div class="container-fluid">
		<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
				<h4>PlanWays</h4>
			</a>

			<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				<li><a href="../dashboard" class="nav-link px-2 link-secondary">Home</a></li>
				<li><a href="../dashboard/actividadesPage.php" class="nav-link px-2 link-dark">Actividades</a></li>
				<li><a href="#" class="nav-link px-2 link-dark">Planes</a></li>
				<?php if (isset($_SESSION['login']) && $_SESSION["esAdmin"]) {
					echo('<li><a href="../dashboard/adminPage.php" class="nav-link px-2 link-dark">Administrar</a></li>');
				}?>
			</ul>
			<?php if (isset($_SESSION['login'])) {?>
				<div class = "col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
					<a href="../dashboard/recomendacionesPage.php" class="btn btn-warning position-relative" style="color: white;">
						<i class="bi bi-chat-square-heart-fill"></i>
						<?php
						$recomendaciones = Usuario::get_num_recomendaciones_by_id($_SESSION["idUsuario"]);
						if($recomendaciones > 0){?>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
							<?php echo($recomendaciones);?>
							</span>
						<?php } ?>
					</a>
				</div>
				<div class = "col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
					<a href="../dashboard/contactsPage.php" class="btn btn-secondary"><i class="bi bi-person-lines-fill"></i></a>
				</div>
				<div class = "col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
					<a href="../dashboard/solicitudPage.php" class="btn btn-primary position-relative">
						<i class="bi bi-people-fill"></i>
						<?php
						$solicitudes = Usuario::get_num_solicitudes_by_id($_SESSION["idUsuario"]);
						if($solicitudes > 0){?>
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
							<?php echo($solicitudes);?>
							</span>
						<?php } ?>
					</a>
				</div>
			<?php } ?>

			<!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
				<input type="search" class="form-control" placeholder="Buscar..." aria-label="Buscar">
			</form> -->
			<div class="text-end">
			<?php if (isset($_SESSION['login'])) {?>
				<div class="dropdown text-end">
					<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="../files/users/<?php echo($_SESSION["username"]) ?>/<?php echo($_SESSION['avatar']) ?>" width="42" height="42" class="rounded-circle">
					</a>
					<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser">
						<li><a class="dropdown-item" href="#">Settings</a></li>
						<li><a class="dropdown-item" href="../dashboard/profilePage.php">Profile</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#SignOutModal">Logout</button></li>
					</ul>
				</div>
			<?php
			}else{
				echo('<a href="loginPage.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>');
				echo('<a href="signupPage.php"><button type="button" class="btn btn-primary">Sign-up</button></a>');
			}
			?>
			</div>
		</div>
	</div>
</header>

</html>