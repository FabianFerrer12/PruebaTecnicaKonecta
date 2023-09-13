<?php

require_once '../config/connection.php';

$db = new Conexion();
$db=$db->Conexion();

$id = $_GET['id'];

$stmt = $db->prepare("SELECT * FROM productos WHERE id = :id;");
$stmt->execute([':id' => $id]);

if($stmt->rowCount()){
    $stmt = $db->prepare("DELETE FROM productos WHERE id=:id");
    $stmt->execute([':id'=>$id]);
    
    if($stmt->rowcount()){
        $response = array('state'=>1,'msj'=>'Producto eliminado correctamente.');
    }else{
        $response = array('state' =>0, 'msj'=> 'No se pudo eliminar el producto a base de datos, intenta nuevamente.');
    }
}else{
    $response = array('state' =>2, 'msj'=> 'No se encuentrar el producto en la base de datos para poder eliminarlo, intenta nuevamente.');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($response['state']==1) { ?>
                        <h3> <?php echo $response['msj']; ?></h3>
                    <?php } else if($response['state']==2){ ?>
                        <h3><?php echo $response['msj'];?></h3>
                    <?php }else { ?>
                        <h3><?php echo $response['msj'] ;?></h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="../index.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>