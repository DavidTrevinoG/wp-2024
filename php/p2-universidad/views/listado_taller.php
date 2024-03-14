<?php

    //Conexión de la base de datos
    include "../config/db.php";

    //Consulta para obtener el listado de taller 
    $query = "SELECT T.id_taller, T.fecha_ingreso, V.marca, V.submarca, V.modelo, V.num_serie, S.nombre, S.costo FROM prestacion_taller AS T 
    INNER JOIN servicios AS S ON T.id_servicio = S.id_servicios INNER JOIN vehiculos AS V ON T.id_vehiculo = V.id_vehiculo";
    $result = $conn->query($query);
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
        <title>Listado Taller</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>
    <div class="container-lg md-5">
        <h2>Entrada a Taller</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID TALLER</th>
                    <th>FECHA_INGRESO</th>
                    <th>VEHÍCULO</th>
                    <th>SERVICIO</th>
                    <th>TOTAL</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Recorrer tabla
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['id_taller']."</td>";
                        echo "<td>".$row['fecha_ingreso']."</td>";
                        echo "<td>".$row['num_serie']." ".$row['marca']." ".$row['submarca']." ".$row['modelo']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['costo']."</td>"; 
                    ?>
                    <td>
                        <a href="editar_taller.php?id_taller=<?php echo $row['id_taller']; ?>" class="btn btn-secondary">
                            Editar
                        </a>
                        <button onclick="mostrarSweet(<?php echo $row['id_taller']; ?>)" class="btn btn-danger">Eliminar</button>
                
                    </td>
                    </tr>
                    <?php
                    }

                ?>
            </tbody>

        </table>
        <a href="agregar_taller.php" class="btn btn-primary">Agregar a Taller</a>
        <a href="../index.php" class="btn btn-info">Regresar</a>
    </div>
    <script>
        function mostrarSweet(id_taller){
            Swal.fire({
                title: "¿Estás seguro?",
                text: "No podrás revertirlo!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Delete"
                }).then((result) => {
                if (result.isConfirmed) { 
                    window.location.href = "../models/crud.php?eliminar_id_taller=" + id_taller;
                }
            });
        }
    </script>
</body>
</html>