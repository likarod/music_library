<?php

require_once('./bd/config.php');
require_once('./bd/conect.php');

// Sin datos en la BD
if (isset($_GET['id']) && $_GET['id']!=''){
    $id=$_GET['id'];
}else{
    die("FALTAN PARAMETROS");
}

// Query BD

$connect=dbo();
$stmt = $connect->prepare("DELETE FROM linaplaylist WHERE id=?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
dbc($connect);

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
            <div class="row">
                <h4 class="col-md-8 bg-success text-white">El álbum ha sido borrado correctamente</h4>
            </div>
        </section>
    </main>
</body>
</html>