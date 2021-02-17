<?php

require_once('./bd/config.php');
require_once('./bd/conect.php');

//query BD
if (isset($_POST['enviar'])){
    $connect=dbo();

    $nombreAlbum=$_POST['nombreAlbum'];
    $duracion=$_POST['duracion'];
    $nombreArtista=$_POST['nombreArtista'];
    $epoca=$_POST['epoca'];
    $genero=$_POST['genero'];
    
    //UPDATE
    if (isset($_POST['id']) && $_POST['id']!=0){
        $id=$_POST['id'];
        $stmt = $connect->prepare("UPDATE linaplaylist SET nombreAlbum=?, duracion=?,nombreArtista=?, epoca=?, genero=? WHERE id=?");
        $stmt->bind_param('sisisi', $nombreAlbum,$duracion,$nombreArtista,$epoca,$genero, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        dbc($connect);
        die("Actualizado");
        
    //CREAR
    }else{
        $stmt = $connect->prepare("INSERT INTO linaplaylist (nombreAlbum, duracion, nombreArtista, epoca, genero) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sisis', $nombreAlbum,$duracion,$nombreArtista, $epoca, $genero);
        $stmt->execute();
        $result = $stmt->get_result();
        dbc($connect);
         die("CREADO");
    }    
}

//Sin datos BD
if (isset($_GET['id']) && $_GET['id']!=''){
    $id=$_GET['id'];
}else{
  die("FALTAN PARAMETROS");
}

//Consulta por params
$connect=dbo();
$stmt = $connect->prepare("SELECT * FROM linaplaylist WHERE id=?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

//Renderizado de datos
$nombreAlbum='';
$duracion=0;
$nombreArtista="";
$epoca=1900;
$genero="";

while($fila = $result->fetch_assoc()){ 
    
    $id=$fila['id'];
    $nombreAlbum=$fila['nombreAlbum'];
    $duracion=$fila['duracion'];
    $nombreArtista=$fila['nombreArtista'];
    $epoca=$fila['epoca'];
    $genero=$fila['genero'];
}

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
                <div class="cover"></div>
            </div>
        </section>
        <section class="container">
            <nav class="nav-bar nav-bar-ligth">
                <ul>
                    <li class="list-unstyled">
                        <a class="nav-link" href="index.php"> Volver a inicio</a>
                    </li>
                </ul>
            </nav>
        </section>
    </header>
    <main>
        <section class="container" style="padding-top: 1em;">
            <div class="row justify-content-xxl-center">
                <div class="col-xxl-auto">
                    <form method="POST" action="crear.php" class="form">
                        <input type="hidden" name="id" value="<?php echo $id;?>"/> 
                        <div class="col-md-12">
                            <label for="nombreAlbum">Álbum</label>
                            <input class="form-control" type="text" name="nombreAlbum" placeholder="Nombre del Album" value="<?php echo $nombreAlbum ?>" />
                        </div>
                         <div class="col-md-12">
                             <label for="nombreArtista">Artista</label>
                            <input class="form-control" type="text" name="nombreArtista" placeholder="Nombre del Artista" value="<?php echo $nombreArtista ?>" />
                        </div>
                        <div class="col-sm-9">
                            <label for="duracion">Duración en minutos</label>
                            <input class="form-control" type="number" name="duracion" placeholder="Minutos de duración" value="<?php echo $duracion ?>" />
                        </div>
                        <div class="col-sm-9">
                            <label for="epoca">Año de estreno</label>
                            <input class="form-control" type="number" name="epoca" placeholder="YYYY" min="1900" max="2100" value="<?php echo $epoca ?>" />
                        </div>
                        <div class="col-md-12">
                            <label for="genero">Género</label>
                            <input class="form-control" type="text" name="genero" placeholder="Género músical" value="<?php echo $genero?>" />
                        </div>
                        <input class="btn btn-success" style="margin-top:10px; margin-bottom:10px;" type="submit" name="enviar" value="Enviar"/>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>