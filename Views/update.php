<?php 
require_once '../config/connection.php';
$db = new Conexion();
$db=$db->Conexion();

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM productos WHERE id = :id;");
$stmt->execute([':id' => $id]);
if($stmt->rowcount()){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Actualizar producto</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                <form class="row g-3" method="POST" action ="../controllers/edit.php" autocomplete="off">
                        <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">

                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id ="nombre" name="nombre" class="form-control" value="<?php echo $row['nombre']?>" required autofocus>
                        </div>

                        <div class="col-md-4">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id ="precio" min="1" name="precio" class="form-control" value="<?php echo $row['precio']?>" required >
                        </div>

                        <div class="col-md-4">
                            <label for="peso" class="form-label">Peso</label>
                            <input type="number" id ="peso" min="1" name="peso" class="form-control" value="<?php echo $row['peso']?>" required >
                        </div>

                        <div class="col-md-4">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" id ="categoria" name="categoria" class="form-control" value="<?php echo $row['categoria']?>"required >
                        </div>

                        <div class="col-md-4">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" id ="stock" min="0" name="stock" class="form-control" value="<?php echo $row['stock']?>"required >
                        </div>

                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="../index.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Actualizar</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </main>

</body>

</html>