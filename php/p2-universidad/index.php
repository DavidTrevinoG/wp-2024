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
            background-color: rgb(0, 0, 68);
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
            color: white;
            text-align: center;
            padding: 20px 30px;
            text-decoration: none;
            font-size: 24px;
        }

        ul.menu li a:hover {
            background-color: rgb(0, 0, 174);
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; font-size: 24px;">Práctica no. 2</h1>

    <ul class="menu">
        <li><a href="views/listado_taller.php">Taller</a></li>
        <li><a href="views/listado_vehiculos.php">Vehículos</a></li>
        <li><a href="views/listado_servicios.php">Servicios</a></li>
    </ul>
</body>
</html>