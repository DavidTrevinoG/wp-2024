<?php 

//Creación del archivo PDF
header("Pragma: public");
header("Expires: 0");
$filename = "listadoMaterias.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

// Conexión a la base de datos
include '../config/db.php';

// Consulta SQL para obtener todos los registros de la tabla materias
$sql = 'SELECT * FROM materias';
$result = $conn->query($sql);

?>
<html lang="es">
    <head>
        <title>Listado de Materias</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2> Listado de Materias</h2>   
            <table class="table" id="table">
            <thead>
                <th>ID Materia</th>
                <th>Nombre</th>
                <th>Unidades</th>
            </thead>
    <tbody>
        <?php 

            // Recorrido en la tabla de carreras para obtener los registros
            while ($row = $result->fetch_assoc()){
              
        ?>
        <tr>
        <td><?php echo $row['id_materia']; ?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['unidades'];?></td>
        </tr>
        <?php } ?>

    </tbody>
</table>
</html>