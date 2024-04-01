<?php
    include 'bd.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM asesoria WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

?>

<html lang ="en">
    <head>
        <title>Editar Asesoría</title>
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

        <div class = "container mt-5"> 
        <h2>Editar Asesoría</h2>
        <form action = "crud.php" method = "post">
        <div class = "form-group">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <label for="carrera">Carrera</label>
                <select class = "form-control" name = "id_carrera" required>
                    <?php
                        include 'bd.php';
                        //Consulta de id_carrea
                        $sql_carrera = "SELECT * FROM carrera";
                        $result_carrera = $conn->query($sql_carrera);
                        while ($row_carrera = $result_carrera -> fetch_assoc()):
                    ?>
                        <option value="<?php echo $row_carrera['id'] ?>" -?
                        <?php
                            if($row_carrera['id'] == $row['id_carrera']){
                                echo "selected";
                            }
                        ?>
                        >
                            <?php echo $row_carrera['nombre'] ?>
                        </option>
                        <?php endwhile ?>
                </select>
            </div>
            <div class = "form-group">
                <label for="materia">Materia</label>
                <select class = "form-control" name = "id_materia" required>
                    <?php
                        include 'bd.php';
                        $sql_materia = "SELECT * FROM materia";
                        $result_materia = $conn->query($sql_materia);
                        while ($row_materia = $result_materia -> fetch_assoc()):
                    ?>
                        <option value="<?php echo $row_materia['id'] ?>"
                    <?php

                        if($row_materia['id'] == $row['id_materia']){
                            echo "selected";
                        }
                    
                    ?>>
                            <?php echo $row_materia['nombre'] ?>
                        </option>
                        <?php endwhile ?>
                </select>
            </div>

            <div class = "form-group">
                <label for="alumno ">Alumno</label>
                <select class = "form-control" name = "id_alumno" required>
                    <?php
                        include 'bd.php';
                        $sql_alumno = "SELECT * FROM alumno";
                        $result_alumno = $conn->query($sql_alumno);
                        while ($row_alumno = $result_alumno -> fetch_assoc()):
                    ?>
                        <option value="<?php echo $row_alumno['id'] ?>" -?
                        <?php 

                            if($row_alumno['id'] == $row['id_alumno']){
                                echo "selected";
                            }
                        ?>>
                            <?php echo $row_alumno['nombre'] ?>
                        </option>
                        <?php endwhile ?>
                </select>
            </div>
            
            <div class = "form-group">
                <label for="asesor">Asesores</label>
                <select class = "form-control" name = "id_asesor" required>
                    <?php
                        include 'bd.php';
                        //Consulta de id_carrea
                        $sql_carrera = "SELECT * FROM tutor";
                        $result_carrera = $conn->query($sql_carrera);
                        while ($row_carrera = $result_carrera -> fetch_assoc()):
                    ?>
                        <option value="<?php echo $row_carrera['id'] ?>"
                        <?php 
                            if($row_carrera['id'] == $row['id_tutor']){
                                echo "selected";
                            }
                        ?>>
                            <?php echo $row_carrera['nombre'] ?>
                        </option>
                        <?php endwhile ?>
                </select>
            </div>

            <div class = "form-group">
                <label for="observaciones">observaciones</label>
                <input type = "text" class = "form-control" name = "observaciones" value = "<?php

                    $obcheck = $conn->query("SELECT observaciones FROM asesoria WHERE id = $id");
                    $ob = $obcheck->fetch_assoc();
                    echo $ob['observaciones'];
                
                ?>" required>
            </div>

            <div class = "form-group">
                <label for="fecha">fecha</label>
                <input type = "date" class = "form-control" name = "fecha" value="<?php
                
                    $fecheck = $conn->query("SELECT fecha FROM asesoria WHERE id = $id");
                    $fe = $fecheck->fetch_assoc();
                    echo $fe['fecha'];
                
                ?>" required>
            </div>


            <button type = "submit" class = "btn btn-primary" name = "cambios_asesoria">Guardar cambios</button>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    </body>
</html>