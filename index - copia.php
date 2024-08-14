<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jornadas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-RG9XwC16cr4CNAzk6eNYv2Xy6RqtGbL/2kUKLxZnC4JjYNaPyAtzHx3JK9IhYSl35eOcKLG2n3OuLvA8R44gcQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #FF7F00;
        }
        nav {
            background-color: #FF7F00;
        }
        nav .navbar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        nav .navbar-nav .nav-link {
            color: white;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        footer ul {
            list-style-type: none;
            padding: 0;
        }
        footer ul li {
            margin-bottom: 10px;
        }
        footer .footer-social a {
            color: #007bff;
            margin-right: 10px;
            text-decoration: none;
        }
        footer .footer-social a:hover {
            color: #0056b3;
        }
        .carousel-item img {
            object-fit: cover;
            height: 400px;
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
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Jornadas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container content my-4">
        <ul class="nav justify-content-center">
        <?php
            

        // Consulta SQL para seleccionar los años de la tabla 'año jornada'
        $sql = "SELECT año FROM `jornadass`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
            <li class="nav-item" style="padding-right: 10px;">
                <form action="cronograma.php" method="get">
                    <input type="hidden" name="año" value="<?php echo $row['año']; ?>">
                    <button type="submit" class="btn btn-primary"><?php echo $row['año']; ?></button>
                </form>
            </li>
        <?php
            }
        } else {
            echo "No se encontraron años";
        }
        mysqli_close($conn);
        ?>
        </ul>
    <div class="container content pt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="descarga (6).jfif" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="descarga (7).jfif" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="descarga (8).jfif" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="footer mt-auto py-3" id="Contacto">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li><strong>Teléfono:</strong> +3518182536</li>
                        <li><strong>Correo Electrónico:</strong> jornadasnewtonianas@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Redes Sociales</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.instagram.com/jornadasnewtonianas/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="https://x.com/jornadasnewton" target="_blank"><i class="fab fa-twitter"></i> X (Twitter)</a></li>
                        <li><a href="https://web.facebook.com/profile.php?id=61560411578730" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
