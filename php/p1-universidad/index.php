<!DOCTYPE html>
<html lang="es">
<head>
        <title>Práctica 1</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        ul.menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        ul.menu li {
            float: left;
        }

        ul.menu li a {
            display: block;
            color: #333;
            text-align: center;
            padding: 20px 30px;
            text-decoration: none;
            font-size: 24px;
        }

        ul.menu li a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; font-size: 24px;">Práctica no. 1</h1>

    <ul class="menu">
        <li><a href="views/listado_materias.php">Materias</a></li>
        <li><a href="views/listado.php">Alumnos</a></li>
        <li><a href="views/calificaciones.php">Calificaciones</a></li>
        <li><a href="views/listado_carreras.php">Carreras</a></li>
        <li><a href="views/listado_ac.php">Exportar</a></li>
    </ul>
</body>
</html>