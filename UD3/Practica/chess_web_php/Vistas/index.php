<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    include 'header.php';
    include 'nav.php';
    ?>
    <main>
        <div class="container-fluid g-0">
            <div id="carouselExampleCaptions" class="carousel slide h-10 slideInFade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/ajedrez.jpg" class="d-block w-100" alt="ajedrez">
                        <div class="carousel-caption d-none d-md-block m-1">
                            <h5>Juega ajedrez</h5>
                            <p>Juega ajedrez con tus amigos.</p>
                            <button type="button" class="btn btn-success">
                                <a href="new_gameView.php"
                                    class="link-light link-underline link-underline-opacity-0">Jugar</a>
                            </button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../images/lista.jpg" class="d-block w-100" alt="lista">
                        <div class="carousel-caption d-none d-md-block m-1">
                            <h5>Lista</h5>
                            <p>Mira la lista de partidas que están en curso o ya han acabado.</p>
                            <button type="button" class="btn btn-success">
                                <a href="gameListView.php"
                                    class="link-light link-underline link-underline-opacity-0">Lista</a>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main>

    <?php
    include 'footer.php'
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>