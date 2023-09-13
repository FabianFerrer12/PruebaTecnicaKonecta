<?php
require_once '../config/connection.php';

$db = new Conexion();
$db=$db->Conexion();

$stmt = $db->query("SELECT * FROM productos ORDER BY id;");

$stmt->execute();

$result =$stmt->fetchAll(PDO::FETCH_ASSOC);
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
    
    <main class="container">
        <div class="row">
            <div class="col">
                <h4>Vender Cafeteria KONECTA</h4>
                <a href="../index.php" class="btn btn-primary float-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
</svg></a>
                <a href="create.php" class="btn btn-success float-right">Agregar productos</a>
                <a href="storeView.php" class="btn btn-secondary float-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>&nbsp;&nbsp;Vender productos</a>
            </div>

            <div class="row py-3">
                <div class="col"></div>
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Peso</th>
                                <th>Categoria</th>
                                <th>Stock</th>
                                <th>Fecha de creación</th>
                                <th>Vender</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            foreach($result as $row){
                            ?>
                            <tr>
                                <td> <?php echo $row['nombre']?></td>
                                <td> <?php echo $row['precio']?></td>
                                <td> <?php echo $row['peso']?></td>
                                <td> <?php echo $row['categoria']?></td>
                                <td> <?php if($row['stock']>0){echo $row['stock'];}else{ echo 'Producto sin stock';}?></td>
                                <td> <?php echo $row['fecha_creacion']?></td>
                                <td><a href="store.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Vender</a></td>
                            </tr>
                            <?php } ?>
                        
                        </tbody>
                    </table>
            </div>
        </div>
    </main>
</body>
</html>