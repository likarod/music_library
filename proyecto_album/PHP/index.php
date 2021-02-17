<?php
require_once('./bd/config.php');
require_once('./bd/conect.php');

$connect=dbo();
$stmt = $connect->prepare("SELECT * FROM linaplaylist");
$stmt ->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--CSS-->
    <link rel="stylesheet" href="./style.css" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>MUSIC</title>
</head>
<body>
    <header>
        <section class="container-fluid">
            <div class="row">
                <div class="cover">
                    <!--<h1 class="display-1 text-danger font-weight-bold" style="aling-text:center">MUSIC</h1>-->
                </div>
            </div>
        </section>
        <section class="container">
            <nav class="nav-bar nav-bar-ligth">
               <ul>
                    <li class="list-unstyled"> 
                        <a class="nav-link" href="crear.php?id=0">
                            Añadir nueva canción
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
    </header>
    <main>
        <section class="container" style="padding-top: 20px;">
            <?php while($fila = $result->fetch_assoc()){ ?>
            <div class="row">
                <div class="col-3" id="list-example" class="list-group">
                  <h3 class="list-group-item list-group-item-action" href=<?php echo $fila['id'];?>> 
                  <?php echo $fila['nombreAlbum'];?>
                  </h3>
                </div>
                <div class="col-3" data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                    <h4 id=<?php echo $fila['id'];?>>
                      <?php echo $fila['nombreArtista'];?>
                    </h4>
                    <p> <?php echo $fila['genero'];?></p>
                    <p> <?php echo $fila['duracion'];?> mnts.</p>
                    <p> <?php echo $fila['epoca'];?></p>
                </div>
                <div class="col-3">
                    <a href="borrar.php?id=<?php echo $fila['id'];?>" class="btn btn-outline-secondary btn-sm">Borrar</a> 
                    <a href="crear.php?id=<?php echo $fila['id'];?>" class="btn btn-outline-secondary btn-sm">Actualizar</a>
                </div>
                <div class="line"></div>
            </div>
            <?php } ?>
        </section>
        
    </main>
    <footer>
        
    </footer>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>