<?php 
require_once '../config/connection.php';
$db = new Conexion();
$db=$db->Conexion();

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM productos WHERE id = :id;");
$stmt->execute([':id' => $id]);
if($stmt->rowcount()){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

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
                    <a class="btn btn-primary" href="storeView.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
<?php
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                    <h4>Vender producto</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                <form class="row g-3" method="POST" action ="../controllers/store.php" autocomplete="off">
                        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id ="nombre" name="nombre" disabled class="form-control" value="<?php echo $row['nombre']?>" required autofocus>
                        </div>

                        <div class="col-md-4">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id ="precio" min="1" name="precio" disabled class="form-control" value="<?php echo $row['precio']?>" required >
                        </div>

                        <div class="col-md-4">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" id ="stock" min="1" max = "<?php echo $row['stock']; ?>"name="stock" class="form-control" required >
                        </div>

                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="storeView.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Vender</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </main>

</body>

</html>

<?php
    }
}
?>


