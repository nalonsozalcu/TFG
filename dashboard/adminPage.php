<?php require_once '../config.php';?>
<!DOCTYPE html>
<html>
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	

	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/main.css">

	<title>PlanWays</title>
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<link
	href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
	rel="stylesheet"
	/>
	<title>PlanWays</title>
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">

	<style>
	:root {
		--header-height: 3rem;
		--nav-width: 68px;
		--first-color: #4723d9;
		--first-color-light: #afa5d9;
		--white-color: #f7f6fb;
		--body-font: "Nunito", sans-serif;
		--normal-font-size: 1rem;
		--z-fixed: 100;
	}

	*,
	::before,
	::after {
		box-sizing: border-box;
	}

	body {
		position: relative;
		margin: var(--header-height) 0 0 0;
		padding: 0 1rem;
		font-family: var(--body-font);
		font-size: var(--normal-font-size);
		transition: 0.5s;
	}

	a {
		text-decoration: none;
	}

	.header {
		width: 100%;
		height: var(--header-height);
		position: fixed;
		top: 0;
		left: 0;
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 0 1rem;
		background-color: var(--white-color);
		z-index: var(--z-fixed);
		transition: 0.5s;
	}

	.header_toggle {
		color: var(--first-color);
		font-size: 1.5rem;
		cursor: pointer;
	}

	.l-navbar {
		position: fixed;
		top: 0;
		left: -30%;
		width: var(--nav-width);
		height: 100vh;
		background-color: var(--first-color);
		padding: 0.5rem 1rem 0 0;
		transition: 0.5s;
		z-index: var(--z-fixed);
	}

	.nav {
		height: 100%;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		overflow: hidden;
	}

	.nav_logo,
	.nav_link {
		display: grid;
		grid-template-columns: max-content max-content;
		align-items: center;
		column-gap: 1rem;
		padding: 0.5rem 0 0.5rem 1.5rem;
	}

	.nav_logo {
		margin-bottom: 2rem;
	}

	.nav_logo-icon {
		font-size: 1.25rem;
		color: var(--white-color);
	}

	.nav_logo-name {
		color: var(--white-color);
		font-weight: 700;
	}

	.nav_link {
		position: relative;
		color: var(--first-color-light);
		margin-bottom: 1.5rem;
		transition: 0.3s;
	}

	.nav_link:hover {
		color: var(--white-color);
	}

	.nav_icon {
		font-size: 1.25rem;
	}

	.show {
		left: 0;
	}

	.body-pd {
		padding-left: calc(var(--nav-width) + 1rem);
	}

	.active {
		color: var(--white-color);
	}

	.active::before {
		content: "";
		position: absolute;
		left: 0;
		width: 2px;
		height: 32px;
		background-color: var(--white-color);
	}

	.height-100 {
		height: 100vh;
	}

	@media screen and (min-width: 768px) {
		body {
		margin: calc(var(--header-height) + 1rem) 0 0 0;
		padding-left: calc(var(--nav-width) + 2rem);
		}

		.header {
		height: calc(var(--header-height) + 1rem);
		padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
		}

		.l-navbar {
		left: 0;
		padding: 1rem 1rem 0 0;
		}

		.show {
		width: calc(var(--nav-width) + 156px);
		}

		.body-pd {
		padding-left: calc(var(--nav-width) + 188px);
		}
	}
	</style>
</head>
<body id="body-pd">
	<header class="header" id="header">
		<div class="header_toggle">
			<i class="bx bx-menu" id="header-toggle"></i>
		</div>
		<div class="text-end">
			<img src="../assets/img/<?php echo($_SESSION['avatar']) ?>" width="42" height="42" class="rounded-circle">
		</div>
	</header>
	<div class="l-navbar" id="nav-bar">
	<nav class="nav">
		<div>
		<a href="index.php" class="nav_logo">
			<i class="bx bx-layer nav_logo-icon"></i>
			<span class="nav_logo-name">PlanWays</span>
		</a>
		<div class="nav_list">
			<a href="adminPage.php" class="nav_link <?php if(!isset($_GET["content"])) echo('active')?>">
			<i class="bx bx-grid-alt nav_icon"></i>
			<span class="nav_name">Home</span>
			</a>
			<a href="adminPage.php?content=users" class="nav_link <?php if(isset($_GET["content"]) && $_GET["content"] == 'users') echo('active')?>">
			<i class="bx bx-user nav_icon"></i>
			<span class="nav_name">Users</span>
			</a>
			<a href="adminPage.php?content=data" class="nav_link <?php if(isset($_GET["content"]) && $_GET["content"] == 'data') echo('active')?>">
				<i class="bx bx-bar-chart-alt-2 nav_icon"></i>
				<span class="nav_name">Data</span>
			</a>
		</div>
		</div>
	</nav>
	</div>
	<div class="height-100">
	<?php if(isset($_GET["content"])):?>
		<?php if($_GET["content"] == 'users'):?>
			<main>
				<div class="vh-80 d-flex justify-content-center align-items-center">
					<div class="container">
						<div class="row mt-3 mb-5 d-flex justify-content-start">
							<h4>Administrador de usuarios</h4>
						</div>
						<div class="row d-flex justify-content-end">
						<?php
							if(isset($_GET['ok'])){
								if($_GET['ok'] == "true")
									echo '<div class="w-25 p-3 alert alert-success alert-dismissible fade show" role="alert"><i class="bi bi-check-lg"></i> Se ha eliminado correctamente el usuario
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
								else
									echo '<div class="w-25 p-3 alert alert-danger alert-dismissible fade show" role="alert"><i class="bi bi-exclamation-triangle"></i> No se ha eliminado el usuario
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

							}
						?>
						</div>
						<div class="row d-flex justify-content-center">
							<table class="table">
								<thead>
									<tr>
									<th scope="col"></th>
									<th scope="col">Rol</th>
									<th scope="col">Username</th>
									<th scope="col">Email</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$users = Usuario::get_all_users();
									foreach ($users as $i => $value) {
										echo('<tr>');
										echo('<th scope="row">'.($i + 1).'</th>');
										echo('<td>'.$users[$i]["rol"].'</td>');
										echo('<td>'.$users[$i]["username"].'</td>');
										echo('<td>'.$users[$i]["email"].'</td>');
										echo('<td><a href="../api/deleteUser.php?id='.$users[$i]["id"].'" class="btn"><i class="bi bi-trash3"></i></a></td>');
										echo('</tr>');
									}?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>
		<?php endif;?>
		<?php if($_GET["content"] == 'data'):?>
			<h4>Aministrador de datos</h4>
		<?php endif;?>
	<?php else: ?>
		<h4>Panel de administración</h4>
	<?php endif;?>
	</div>

	<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function (event) {
		const showNavbar = (toggleId, navId, bodyId, headerId) => {
		const toggle = document.getElementById(toggleId),
			nav = document.getElementById(navId),
			bodypd = document.getElementById(bodyId),
			headerpd = document.getElementById(headerId);

		// Validate that all variables exist
		if (toggle && nav && bodypd && headerpd) {
			toggle.addEventListener("click", () => {
			// show navbar
			nav.classList.toggle("show");
			// change icon
			toggle.classList.toggle("bx-x");
			// add padding to body
			bodypd.classList.toggle("body-pd");
			// add padding to header
			headerpd.classList.toggle("body-pd");
			});
		}
		};

		showNavbar("header-toggle", "nav-bar", "body-pd", "header");

		/*===== LINK ACTIVE =====*/
		const linkColor = document.querySelectorAll(".nav_link");

		function colorLink() {
		if (linkColor) {
			linkColor.forEach((l) => l.classList.remove("active"));
			this.classList.add("active");
		}
		}
		linkColor.forEach((l) => l.addEventListener("click", colorLink));

		// Your code to run since DOM is loaded and ready
	});
	</script>
</body>
</html>