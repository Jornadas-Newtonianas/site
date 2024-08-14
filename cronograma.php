<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #eeee;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        nav {
            background-color: #081F75;
            padding: 10px 0;
        }
        nav h1 {
            color: white;
            font-size: 24px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        .container {
            flex: 1;
            padding: 20px;
        }
        .card-header {
            color: white;
            background-size: cover;
            background-position: center;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .card-title {
            font-size: 18px;
            font-weight: bold;
        }
        .card-subtitle {
            font-size: 16px;
            margin-bottom: 10px;
        }
        footer {
            background-color: #081F75;
            padding: 20px 0;
            text-align: center;
        }
        footer ul {
            list-style-type: none;
            padding: 0;
        }
        footer ul li {
            margin-bottom: 5px;
        }
        footer a {
            color: #007bff;
            text-decoration: none;
        }

    .navbar {
        padding: 0.5rem 1rem;
    }

    .navbar-brand {
        font-size: 1.25rem;
    }

    .navbar-nav .nav-item .nav-link {
        font-size: 0.875rem;
    }

    .btn-map {
        margin-left: auto;
    }

    .modal-body img {
        max-width: 100%;
        height: auto;
    }
</style>

</head>
<body>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "coso";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
        $sql = "SELECT DISTINCT Año FROM jornadass"; // Aquí debes ajustar tu consulta SQL según tu estructura de base de datos
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error al ejecutar la consulta: ".mysqli_error($conn));
        }
        $año = $_GET['año'];
    ?>
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">
            <img src="rata.png" alt="Logo" style="height: 60px; margin-right: 25px;">
        </a>
        <?php echo "<h1 class='navbar-brand'>Jornadas Newtonianas</h1>"; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Año
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<a class='dropdown-item' href='cronograma.php?año=".$row['Año']."'>".$row['Año']."</a>";
                            }
                        ?>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#Contacto">Contacto</a></li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary btn-map" style="background-color: #081F75; border-color: #081F75;" data-toggle="modal" data-target="#mapModal">
                        Mapa
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Mapa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class= "row" ><div class="col-md-6">
                <img src="Mapa.png" class="img-fluid" width="600px"  alt="Mapa">
                        </div><div class="col-md-6">
                <p> Azul: Kiosco </p>
                <p> Verde: Aulas </p> 
                <p> Rojo: Comedor  </p> 
                <p> Rosa: Preceptoria</p> 
                <p> Celeste: Baño </p> 
                <p> Amarillo: Biblioteca</p>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
    </div>

</div>


    <div class="container">
    <?php echo "<h1 class='navbar-brand'>Cronograma de ".$año."</h1>"; ?>
        <div class="row">
            <?php
                $sql = "SELECT DISTINCT * FROM `año_jornada` where año=$año order by dia ASC";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Error al ejecutar la consulta: " . mysqli_error($conn));
                }
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card mb-4">';
                        echo '<div class="card-header text-white" style="background-image: url(\'descarga (5).jfif\');">';
                        echo '<h2 class="card-title">' . $row['dia'] . '<br>' . $row['hora'] . '</h2>';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<h3 class="card-title mb-2">' . $row['charla'] . '</h3>';
                        echo '<p class="card-text">' . $row['Descripción'] . '</p>';
                        echo '</div>';
                        echo '<div class="card-footer">';
                        echo '<p class="card-text">' . $row['Titular'] . '<br>' . $row['lugar'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No se encontraron años";
                }
            ?>
        </div>
    </div>
    <footer class= "footer mt-auto py-3 text-white" id="Contacto"> 
        <div class="container-fluid">
            <ul class="list-unstyled">
                <li>Instituto Tecnológico Isaac Newton</li>
                <li><a href="mailto:jornadasnewtonianas@gmail.com">jornadasnewtonianas@gmail.com</a></li>
                <li>&copy; Generisimo Genrico - Todos los derechos reservados</li>
            </ul>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
