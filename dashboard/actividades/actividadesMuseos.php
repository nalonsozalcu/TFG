<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<?php 
        if(isset($_GET["busqueda"])){
          $nombre =  $_GET["busqueda"];
          $museo = Museo::get_all_museos_by_nombre($nombre);
        }else if(isset($_GET["categoria"])){
          $nombre =  $_GET["categoria"];
          $museo = Museo::get_all_museos_by_categoria($nombre);
        }else{
          $museo = Museo::get_all_museos();
        }
    
    ?> 
<div class="input-group ">
<form class="row row-cols-lg-auto g-3 align-items-center" action="actividadesPage.php?table=museos&buscar=<?php isset($_GET["busqueda"]) ? print $_GET["busqueda"]: "";?>" method="get">
    <div class="col-12">
        
        <div class="input-group">
          <input type="submit" style="float: right;" class="btn btn-outline-secondary" value="Buscar">
          <input type="text" name="busqueda" class="form-control" aria-label="Text input with segmented dropdown button">
        </div>
      </div>
     
    
        <div class="col-auto">
        <div class="input-group-append">
          
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Filtrar por categoria</button>
          <ul class="dropdown-menu dropdown-menu-end">
  
            <?php
              $conn = Aplicacion::getConexionBD();
              $query = sprintf("SELECT * FROM categorias_museos");
              $rs = $conn->query($query);
              $categorias = $rs->fetch_all(MYSQLI_ASSOC);?>
                
                <?php foreach ($categorias as $i => $value):?>
                  <li><a class="dropdown-item" href="actividadesPage.php?table=museos&categoria=<?php echo($categorias[$i]["categoria"])?>"><?php echo($categorias[$i]["categoria"])?></a></li>
                  <?php endforeach;?>
          </ul>        
          
      
        </div>  
        </div> 
    </form>
          
        </div>
		<table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
            <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php
              
              if($museo):
                $i = 0;
                
                while($i < count($museo)):
                  $j = 0;
                 ?>
                <tr>
					        <td>
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    
                  <?php while ($j < 3):
                    if($i < count($museo)):?>
      
                    <div class="col">
                    <div class="card h-100">
                      <p class="card-header"><?php echo("Museo  ")?><i class="bi bi-megaphone"></i></p>
                      
                     
                      <div class="card-body">
                      <h5><a href="#" class="card-link" style="text-decoration:none" style="color:#000000;"><?php echo($museo[$i]["nombre"])?></a></h5>
                      
                        <p class="card-text"><?php echo($museo[$i]["direccion"])?></p>
                        
                      </div>
                    </div>
                  </div>
                  
                  <?php
                  $i = $i+1;
                endif;
                if($i >= count($museo)):
                  $j = 5;
                endif;
                
                $j = $j+1;
              endwhile;
                ?>
                </div>
                </div>
                  </td>
            
				        </tr>
                  
                <?php
                 endwhile; 
              endif;?>

          
         
            
          
       
        </tbody>
    </table>