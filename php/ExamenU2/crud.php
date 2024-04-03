<?php

include 'bd.php';

if(isset($_POST['AltaEditorial'])){
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO editoriales (nombre) VALUES ('$nombre')";
    $conn->query($sql);
    header('Location: listadoEditoriales.php');
}

if(isset($_POST['AltaLibro'])){
    $nombre = $_POST['nombre'];
    $editorial = $_POST['editorial'];
    $hojas = $_POST['hojas'];
    $tema = $_POST['tema'];
    $autor = $_POST['autor'];
    $sql = "INSERT INTO libros (nombre, id_editorial, hojas, tema, autor) VALUES ('$nombre', $editorial, $hojas, '$tema', '$autor')";
    $conn->query($sql);
    header('Location: listadoLibros.php');
}

?>