<?php 

//Creación del archivo PDF
header("Pragma: public");
header("Expires: 0");
$filename = "ListadoCarreras.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

// Conexión a la base de datos
include 'db.php';

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = 'SELECT * FROM carrera';
$result = $conn->query($sql);

?>
<table class="table" id="table">
    <thead>
        <th>Id Carrera</th>
        <th>Nombre</th>
    </thead>
    <tbody>
        <?php 

            // Recorrido en la tabla de carreras para obtener los registros
            while ($row = $result->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $row['id_carrera']; ?></td>
        <td><?php echo $row['nombre'];?></td>
        </tr>
        <?php } ?>

    </tbody>
</table>