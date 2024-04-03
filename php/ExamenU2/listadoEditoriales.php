<html>
    <head>
        <title>Listado de Editoriales</title>
    </head>
    <body>
        <h1>Listado de Editoriales</h1>
           <table>
                <ul>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                    </tr>
                    <?php
                        include 'bd.php';
                        
                        $sql = "SELECT * FROM editoriales";
                        $resultado = $conn->query($sql);
                        while ($libro = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$libro['id_editorial']."</td>";
                            echo "<td>".$libro['nombre']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </ul>
           </table>
        <a href="altaEditoriales.php" >Alta editorial</a>
        <a href="listadoLibros.php" >Listado libros</a>
    </body>
</html>