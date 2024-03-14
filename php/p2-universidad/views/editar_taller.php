<?php
    include '../config/db.php';

    $id_taller = $_GET['id_taller'];

    $res = $conn->query("SELECT * FROM prestacion_taller WHERE id_taller = ".$id_taller);
    $res = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Editar Taller</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Editar entrada</h2>
            <form action="../models/crud.php" method="POST">
                <input type="hidden" name="id_taller" value="<?php echo $id_taller; ?>">
                <div class="form-group">
                    <label for="fecha">Fecha de Ingreso: </label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $res['fecha_ingreso']; ?>" required>
                </div>
                <div class="form-group">
                    <select name="id_servicio">
                        <option value="0">Selecciona un servicio</option>
                        <?php
                            $query = "SELECT * FROM servicios";
                            $result = $conn->query($query);
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row['id_servicios']."'";
                                if($row['id_servicios'] == $res['id_servicio']){
                                    echo "selected";
                                }
                                echo ">".$row['nombre']."</option>";
                                
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="id_vehiculo">
                        <option value="0">Selecciona un vehículo</option>
                        <?php
                            $query = "SELECT * FROM vehiculos";
                            $result = $conn->query($query);
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row['id_vehiculo']."'";
                                if($row['id_vehiculo'] == $res['id_vehiculo']){
                                    echo "selected";
                                }
                                echo ">".$row['num_serie']." ".$row['marca']." ".$row['submarca']." ".$row['modelo']."</option>";
                            }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="editar_taller">Editar entrada</button>
        </div>
</html>