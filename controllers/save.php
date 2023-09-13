<?php

require_once '../config/connection.php';

$db = new Conexion();
$db=$db->Conexion();

$nombre=strtoupper($_POST['nombre']);

$stmt = $db->prepare("SELECT * FROM productos WHERE nombre = :nombre;");
$stmt->execute([':nombre' => $nombre]);
if ($stmt->rowCount()){
    $response = array('state'=>2,'msj'=>"Producto ya existe en la base de datos");
}else{
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = strtoupper($_POST['categoria']);
    $stock = $_POST['stock'];

    $stmt = $db->prepare("INSERT INTO productos (nombre,peso,precio,categoria,stock,fecha_creacion) VALUES (:nombre,:peso,:precio,:categoria,:stock, NOW());");
    $stmt->execute([':nombre'=>$nombre,':peso'=>$peso,':precio'=>$precio,':categoria'=>$categoria,':stock'=>$stock]);

    if($stmt->rowcount()){
        $response = array('state'=>1,'msj'=>'Producto ingresado correctamente.');
    }else{
        $response = array('state' =>0, 'msj'=> 'No se pudo ingresar el producto a base de datos, intenta nuevamente.');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
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
