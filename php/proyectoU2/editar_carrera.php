<?php
    include 'bd.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM carrera WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<html lang="en">
    <head>
        <title>Editar Carrera</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <style>
        body {
            background-size: 100%;
    
            background-image: url('pexel.jpg');
      
            background-repeat: no-repeat;
           
            background-position: center;
        
            background-size: cover;
        
            background-color: #f0f0f0; /
        }
    </style>
    <style>

        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 30px; 
        }
    </style>
    <body>
        <?php include 'menu.php'; ?>

        <div class="container mt-5">
            <h2>Editar Carrera</h2>
            <form action="crud.php" method="post">
                
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $row['nombre'] ?>" required>
                </div>

                <button type="submit" class="btn btn-primary" name="cambios_carrera">Guardar cambios</button>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    </body>
</html>
