<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva partida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);
    include 'header.php';
    include 'nav.php';
    require('../Negocio/player.php');

    $player = new Player();
    $players = $player->getPlayer();

    ?>

    <main class="container text-center vh-100">
        <form action="boardView.php" method="post">
            <div class="row g-2 m-1">
                <div class="col">
                    <h1>
                        Jugador 1
                    </h1>
                </div>
            </div>
            <div class="row g-2 m-4">
                <div class="col-4"></div>
                <div class="col-4">
                    <select name="j1" id="j1" class="form-select">
                        <?php
                        foreach ($players as $play) {
                            echo "<option value='" . $play->getID() . "'>";
                            echo $play->getName();
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row g-2 m-4">
                <div class="col">
                    <h1>
                        Jugador 2
                    </h1>
                </div>
            </div>
            <div class="row g-2 m-4">
                <div class="col-4"></div>
                <div class="col-4">
                    <select name="j2" id="j2" class="form-select">
                        <?php
                        foreach ($players as $play) {
                            echo "<option value='" . $play->getID() . "'>";
                            echo $play->getName();
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row g-2 m-4">
                <div class="col"></div>
                <div class="col form-floating">
                    <input type="text" name="gName" id="gName" class="form-control" placeholder="Partida">
                    <label for="gName">Nombre de la partida</label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row g-2 m-4">
                <div class="col">
                    <button type="submit" class="btn btn-success">
                        Jugar
                    </button>
                </div>
            </div>
        </form>
    </main>

    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>