<?php
require_once '../config/connection.php';
$db = new Conexion();
$db=$db->Conexion();

$id = $_POST['id'];
$stmt = $db->prepare("SELECT * FROM productos WHERE id = :id;");
$stmt->execute([':id' => $id]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);

if($stmt->rowCount()){

    if($row['stock'] == 0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h3>No es posible realizar la venta, el producto se encuentra sin stock</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="../Views/storeView.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
<?php
    }else{
        $stock = $row['stock']-$_POST['stock'];

        $stmt = $db->prepare("INSERT INTO ventas (id_producto,cantidad_vendida) VALUES(:id,:cantidadVendida);");
        $stmt->execute([':id'=>$id,':cantidadVendida'=>$_POST['stock']]);
        if($stmt->rowcount()){
            $stmt = $db->prepare("UPDATE productos SET stock =:stock WHERE id = :id;");
            $stmt->execute([':stock'=>$stock,':id'=>$id]);
            $response = array('state'=>1,'msj'=>'Producto ha sido vendido correctamente.');
        }else{
            $response = array('state' =>0, 'msj'=> 'No se pudo vender el producto correctamente, intenta nuevamente.');
        }


        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender</title>
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
                    <?php } else{ ?>
                        <h3><?php echo $response['msj'] ;?></h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="../Views/storeView.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
<?php
    }
    
}else{


    $response = array('state'=>2,'msj'=>'El pedido que tratas vender estar presentando un fallo en la base de datos, intenta nuevamente.');

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($response['state']==2) { ?>
                        <h3> <?php echo $response['msj']; ?></h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="../Views/storeView.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>

<?php
}
?>

