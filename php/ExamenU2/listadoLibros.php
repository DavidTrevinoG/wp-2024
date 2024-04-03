<html>
    <head>
        <title>Listado de libros</title>
    </head>
    <body>
        <h1>Listado de libros</h1>
           <table>
                <ul>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Editorial</td>
                        <td>Hojas</td>
                        <td>Tema</td>
                        <td>Autor</td>

                    </tr>
                    <?php
                        include 'bd.php';
                        $sql = "SELECT L.id_libro as id, L.nombre as nombre, E.nombre as editorial, L.hojas as hojas, L.tema as tema, L.autor as autor FROM libros as L INNER JOIN editoriales as E ON L.id_editorial = E.id_editorial";
                        $resultado = $conn->query($sql);
                        while ($libro = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$libro['id']."</td>";
                            echo "<td>".$libro['nombre']."</td>";
                            echo "<td>".$libro['editorial']."</td>";
                            echo "<td>".$libro['hojas']."</td>";
                            echo "<td>".$libro['tema']."</td>";
                            echo "<td>".$libro['autor']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </ul>
           </table>
        <a href="altalibros.php" >Alta líbros</a>
        <a href="listadoEditoriales.php" >Listado Editoriales</a>
    </body>
</html>