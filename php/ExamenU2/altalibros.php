<html>
    <head>
        <title>Alta de libros</title>
    </head>
    <body>
        <form method="post" action="crud.php">
            <input type="text" name="nombre" placeholder="Nombre del libro:">
            <br>
            <select name="editorial">
                <?php
                    include 'bd.php';
                    $sql = "SELECT * FROM editoriales";
                    $resultado = $conn->query($sql);
                    while ($editorial = $resultado->fetch_assoc()) {
                        echo "<option value='".$editorial['id_editorial']."'>".$editorial['nombre']."</option>";
                    }
                ?>
            </select>
            <input type="number" name="hojas" placeholder="Número de Hojas:"><br>
            <input type="text" name="tema" placeholder="Tema:"><br>
            <input type="text" name="autor" placeholder="Autor del libro:"><br>
            
            <button type="submit" value="Guardar" name="AltaLibro">Guardar</button>
        </form>
    </body>
</html>