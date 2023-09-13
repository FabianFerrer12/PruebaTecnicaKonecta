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
    
    <main class="container">
        <div class="row">
            <div class="col">
                <h4>Nuevos productos</h4>
            </div>

            <div class="row">
                <div class="col">
                    
                    <form class="row g-3" method="POST" action ="../controllers/save.php" autocomplete="off">
                        

                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id ="nombre" name="nombre" class="form-control" required autofocus>
                        </div>

                        <div class="col-md-4">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" id ="precio" min="1" name="precio" class="form-control" required >
                        </div>

                        <div class="col-md-4">
                            <label for="peso" class="form-label">Peso</label>
                            <input type="number" id ="peso" min="1" name="peso" class="form-control" required >
                        </div>

                        <div class="col-md-4">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" id ="categoria" name="categoria" class="form-control" required >
                        </div>

                        <div class="col-md-4">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" id ="stock" min="1" name="stock" class="form-control" required >
                        </div>

                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="../index.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>


                    </form>

                </div>
            </div>
</body>
</html>