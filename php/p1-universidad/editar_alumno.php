<?php
    include 'db.php';
?>

<html>
    <head>
        <title>Editar Alumno</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2>Editar Alumno</h2>
            <form action="crud.php" method="POST">
                <input type="hidden" value="<?php echo $_GET['id']; ?>">
                <?php 
                $result = $conn->query("SELECT * FROM alumnos WHERE id = ".$_GET['id']);
                $result = $result->fetch_assoc();
                ?>
                <div class="form-group">
                    <label for="matricula">Matrícula: </label>
                    <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $result['matricula']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $result['nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad: </label>
                    <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $result['edad'];?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $result['email'];?>" required>
                </div>

                <div class="form-group">
                    <label for="id_carrera">Carrera:</label>
                    <select class="form-control" name="id_carrera" required>
                        <?php
                      
                            $sql = "SELECT * FROM carrera";
                            $re = $conn->query($sql);
                            while ($row = $re->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id_carrera'];?>"<?php
                        
                        if($row['id_carrera'] == $result['id_carrera']){
                            echo 'selected';
                        }
                        
                        ?>><?php echo $row['nombre'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="cambio_alumno">Editar Alumno</button>
        </div>
    </body>
</html>