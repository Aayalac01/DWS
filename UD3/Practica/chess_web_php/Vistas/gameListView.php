<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de partidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    ini_set('display_errors', 'Off');
    ini_set('html_errors', 0);
    include 'header.php';
    include 'nav.php';
    require("../Negocio/game.php");
    ?>

    <main class="container-fluid text-center mt-2 mb-2 vh-100">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h1>Listado de partidas</h1>
            </div>
            <div class="col-2"></div>
        </div>
        <form action="" method="post" id="filtros">
            <div class="row">
                <div class="col-2">
                    <label for="orden">Ordenar por:</label>
                </div>
                <div class="col-2">
                    <select name="orden" id="orden" class="form-select">
                        <option value="empty">Selecciona</option>
                        <option value="startDate">Fecha inicio desc</option>
                        <option value="endDate">Fecha fin desc</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="estado">Estado</label>
                </div>
                <div class="col-2">
                    <select name="estado" id="estado" class="form-select">
                        <option value="empty">Selecciona</option>
                        <option value="Jaque mate">Jaque Mate</option>
                        <option value="En curso">En curso</option>
                        <option value="Tablas">Tablas</option>
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" value="ordenar" class="btn btn-success">
                </div>
            </div>
        </form>
        <div class="row ">
            <div class="col-1"></div>
            <div class="col-10 ">
                <div class="row p-1">
                    <div class="col p-1">
                        ID
                    </div>
                    <div class="col-3 p-1">
                        Descripción
                    </div>
                    <div class="col p-1">
                        Fecha inicio
                    </div>
                    <div class="col p-1">
                        Hora Inicio
                    </div>
                    <div class="col p-1">
                        Estado
                    </div>
                    <div class="col p-1">
                        Ganador
                    </div>
                    <div class="col p-1">
                        Fecha fin
                    </div>
                    <div class="col p-1">
                        Hora fin
                    </div>
                    <div class="col p-1">
                        Piezas blancas
                    </div>
                    <div class="col p-1">Piezas negras</div>
                </div>
                <?php

                $orden = $_POST['orden'];
                $estado = $_POST['estado'];
                

                $game = new Game();
                $games = $game->getGame($orden,$estado);
                $count = 2;
                foreach ($games as $gam) {
                    if ($count % 2 == 0) {
                        echo "<div class='row p-1 border-top border-success bg-success bg-opacity-50'>";
                    }else{
                        echo "<div class='row p-1 border-top border-success'>";
                    }
                    echo "<div class='col p-1'>" . $gam->getID() . "</div>";
                    echo "<div class='col-3 p-1'> <a href='boardView.php?game=".$gam->getID()."'>" . $gam->getName() . "</a></div>";
                    echo "<div class='col p-1'>" . $gam->getStartDate() . "</div>";
                    echo "<div class='col p-1'>" . $gam->getStartTime() . "</div>";
                    echo "<div class='col p-1'>" . $gam->getState() . "</div>";
                    echo "<div class='col p-1'>" . $gam->getWinner() . "</div>";
                    echo "<div class='col p-1'>" . $gam->getEndDate() . "</div>";
                    echo "<div class='col p-1'>" . $gam->getEndTime() . "</div>";
                    echo "<div class='col p-1'>" . $gam->getWhite() . "</div>";
                    echo "<div class='col p-1'>" . $gam->getBlack() . "</div>";
                    echo "</div>";
                    $count++;
                }
                ?>
            </div>
            <div class="col-1"></div>
        </div>
    </main>

    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>

</html>