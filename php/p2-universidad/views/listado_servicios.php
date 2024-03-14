<?php

    //Conexión de la base de datos
    include "../config/db.php";

    //Consulta para obtener los servicios
    $query = "SELECT * FROM servicios";
    $result = $conn->query($query);
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
        <title>Listado Servicios</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>
    <div class="container-lg md-5">
        <h2>Servicios</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID SERVICIO</th>
                    <th>NOMBRE</th>
                    <th>COSTO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    // Recorrer tabla
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['id_servicios']."</td>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['costo']."</td>";
                     
                    ?>
                    <td>
                        <a href="editar_servicios.php?id_servicios=<?php echo $row['id_servicios']; ?>" class="btn btn-secondary">
                            Editar
                        </a>
                        <button onclick="mostrarSweet(<?php echo $row['id_servicios']; ?>)" class="btn btn-danger">Eliminar</button>
                
                    </td>
                    </tr>
                    <?php
                    }

                ?>
            </tbody>

        </table>
        <a href="agregar_servicios.php" class="btn btn-primary">Agregar Servicio</a>
        <a href="../index.php" class="btn btn-info">Regresar</a>
    </div>
    <script>
        function mostrarSweet(id_servicio){
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
                    window.location.href = "../models/crud.php?eliminar_id_servicios=" + id_servicio;
                }
            });
        }
    </script>
</body>
</html>