<?php
    require_once '../classes/Restaurante.php';
	if(isset($_GET["id"])){
		$id =  $_GET["id"];
		$restaurante = Restaurante::get_restaurante_by_id($id);
	}
?>
<section style="background-color: #eee;">
	<div class="container py-5">
		<div class="row">
		<div class="col-lg-4">
			<div class="card mb-4">
			<div class="card-body text-center">
				<img src="../assets/img/restaurante_icon.png" alt="icon"
				class="img-fluid" style="width: 150px;">
				<h5 class="my-3"><?php echo($restaurante->nombre()) ?></h5>
				<p class="text-muted mb-1">Valoración: </p>
					<i class="bi bi-star-fill text-warning ms-1"></i>
					<i class="bi bi-star-fill text-warning ms-1"></i>
					<i class="bi bi-star-fill text-warning ms-1"></i>
					<i class="bi bi-star-fill ms-1"></i>
					<i class="bi bi-star-fill ms-1"></i>
				<div class="d-flex justify-content-end mt-2 mb-2">
				<a href="../api/favoritos.php?action=new&tipo=restaurante&id_actividad=<?php echo($restaurante->id()) ?>" class="btn ms-1"><i class="bi bi-suit-heart" style="color: red;"></i></a>
				<a href="../api/favoritos.php?action=new&tipo=restaurante&id_actividad=<?php echo($restaurante->id()) ?>" class="btn ms-1"><i class="fa-solid fa-share"></i></a>
				</div>
			</div>
			</div>
			<div class="card mb-4 mb-lg-0">
			<div class="card-body p-0">
				<ul class="list-group list-group-flush rounded-3">
				<li class="list-group-item d-flex justify-content-start align-items-center p-3">
					<i class="fas fa-globe fa-lg text-primary"></i>
					<p class="ms-3 mb-0"><a href=<?php echo($restaurante->url()) ?> class="link" target="_blank">Link a la web</a></p>
				</li>
				<li class="list-group-item d-flex justify-content-start align-items-center p-3">
					<i class="bi bi-geo-alt-fill"></i>
					<p class="ms-3 mb-0"><?php echo($restaurante->direccion()." ".$restaurante->codpostal()) ?></p>
				</li>
                <li class="list-group-item d-flex justify-content-start align-items-center p-3">
                    <i class="bi bi-telephone-fill"></i>
					<p class="ms-3 mb-0"><?php echo($restaurante->telefono()) ?></p>
				</li>
                <li class="list-group-item d-flex justify-content-start align-items-center p-3">
                    <i class="fa-solid fa-envelope"></i>
					<p class="ms-3 mb-0"><?php echo($restaurante->email()) ?></p>
				</li>
				<li class="list-group-item d-flex justify-content-start align-items-center p-3">
					<i class="bi bi-star-fill text-warning"></i>
					<p class="mb-0 ms-2">Valorar:</p>
					<div class="form ms-2" style="width: 4rem;">
						<input min="0" max="5" type="number" id="typeNumber" class="form-control" />
					</div>
					<button type="button" class="btn ms-2">Enviar</button>
				</li>
                <li class="list-group-item d-flex justify-content-start align-items-center p-3">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-2">Ubicación:</h5>
                        <?php if($restaurante->longitud() != "" && $restaurante->latitud() != ""){?>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2055.4280999275275!2d<?php echo($restaurante->longitud()) ?>!3d<?php echo($restaurante->latitud()) ?>!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1668630382615!5m2!1ses!2ses" width="380" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <?php }else{
                                    echo("No disponible.");
                                }?>
                        </div>
				    </div>
                </li>
				</ul>
			</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card mb-4">
			<div class="card-body">
                <div class="row">
					<div class="col">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                            <?php
                                $images= Restaurante::get_images_by_id($id);?>
                                <div class="carousel-item active">
                                <img src="<?php echo($images[0]["imagen"]) ?>" class="d-block w-100" alt="...">
                                </div>
                            <?php for ($i = 1; $i < sizeof($images); $i++) {?>
                                    <div class="carousel-item">
                                    <img src="<?php echo($images[$i]["imagen"]) ?>" class="d-block w-100" alt="...">
                                    </div>
                                <?php }?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<h5 class="mb-2">Descripción:</h5>
						<p class="text-muted mb-0"><?php echo($restaurante->descripcion() != ""? $restaurante->descripcion(): "No disponible.") ?></p>
					</div>
				</div>
				<hr>
                <div class="row">
					<div class="col">
						<h5 class="mb-2">Horario:</h5>
						<p class="text-muted mb-0"><?php echo($restaurante->horario() != ""? $restaurante->horario(): "No disponible.") ?></p>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>