<?php

    //Conexión de la base de datos
    include "../config/db.php";

    //Consulta para obtener los vehículos
    $query = "SELECT * FROM vehiculos";
    $result = $conn->query($query);
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
        <title>Listado Vehículos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>
    <div class="container-lg md-5">
        <h2>Vehículos</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>N° SERIE</th>
                    <th>MARCA</th>
                    <th>SUBMARCA</th>
                    <th>TIPO</th>
                    <th>MODELO</th>
                    <th>COLOR</th>
                    <th>CAPACIDAD</th>
                    <th>PROCEDENCIA</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    // Recorrer tabla
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['num_serie']."</td>";
                        echo "<td>".$row['marca']."</td>";
                        echo "<td>".$row['submarca']."</td>";
                        echo "<td>".$row['tipo']."</td>";
                        echo "<td>".$row['modelo']."</td>";
                        echo "<td>".$row['color']."</td>";
                        echo "<td>".$row['capacidad']."</td>";
                        echo "<td>".$row['procedencia']."</td>";
                     
                    ?>
                    <td>
                        <a href="editar_vehiculo.php?id_vehiculo=<?php echo $row['id_vehiculo']; ?>" class="btn btn-secondary">
                            Editar
                        </a>
                        <button onclick="mostrarSweet(<?php echo $row['id_vehiculo']; ?>)" class="btn btn-danger">Eliminar</button>
                
                    </td>
                    </tr>
                    <?php
                    }

                ?>
            </tbody>

        </table>
        <a href="agregar_vehiculo.php" class="btn btn-primary">Agregar Vehículo</a>
        <a href="../index.php" class="btn btn-info">Regresar</a>
    </div>
    <script>
        function mostrarSweet(id_vehiculo){
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
                    window.location.href = "../models/crud.php?eliminar_id_vehiculo=" + id_vehiculo ;
                }
            });
        }
    </script>
</body>
</html>