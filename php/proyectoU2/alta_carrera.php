<html>
    <head>
        <title>Alta de Carreras</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <style>
        body {
            background-size: 100%;
    
            background-image: url('pexel.jpg');
      
            background-repeat: no-repeat;
           
            background-position: center;
        
            background-size: cover;
        
            background-color: #f0f0f0; /
        }
    </style>
    <style>

        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 30px; 
        }
    </style>
    <body>
         <?php include 'menu.php'; ?>

        <div class = "container mt-5">
            <h2>Alta de carreras</h2>
            <form action="crud.php" method = "post">
                <div class = "form-group">
                    <label for="nombre_carrera">Carrera: </label>
                    <input type="text" class = "form-control" name = "nombre" required>
                </div>
                <button type="submit" class = "btn btn-primary" name="alta_carrera">Agregar Carrera</button>
            </form> 
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

    </body>
</html>