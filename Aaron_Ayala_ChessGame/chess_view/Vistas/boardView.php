<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    ini_set('display_errors', 'on');
    ini_set('html_errors', 0);
    include 'header.php';
    session_start(); // reanudamos la sesión
    if (!isset($_SESSION['usuario']))
    {
        header("Location: login.php");
    }
    if ($_SESSION['perfil'] != "premium") {
        include 'nav.php';
    }else{
        include 'navPre.php';
    }
    if($_POST['j1'] != null)
    {
        $_SESSION['J1'] = $_POST['j1'];
        $_SESSION['J2'] = $_POST['j2'];
        $_SESSION['gameName'] = $_POST['gName']; 
    }else{
        $_SESSION['J1'];
        $_SESSION['J2'];
        $_SESSION['gameName']; 
    }
    require_once("../Negocio/game.php");
    require_once("../Negocio/board.php");
    require_once("../Negocio/scoreTBL.php");
    require_once("../Negocio/movement.php");

    $J1 = $_SESSION['J1'];
    $J2 = $_SESSION['J2'];
    $gameName = $_SESSION['gameName'];
    $noNewGame = $_GET['noNewGameInsert']??null;
    $startingBoard = "RW,NW,BW,QW,KW,BW,NW,RW,PW,PW,PW,PW,PW,PW,PW,PW,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,p,p,p,p,p,p,p,p,r,n,b,q,k,b,n,r";
    $startedGameId=0;
    $showMovementForm = false;
    if ($J1 != null & $J2 != null & $gameName != null) {
        $game = new Game();
        if($noNewGame == null)
        {
            $game->init($gameName, $J1, $J2);
            $game->insert();
        }

        $games = $game->getGame(null, null);
        $max = count($games) - 1;

        if ($noNewGame == null) {
            $defaultBoardState = new Board();
            $defaultBoardState->insertSartingBoard($games[$max]->getId());
        }
        $title = $games[$max]->getName();
        $white = $games[$max]->getWhite();
        $black = $games[$max]->getBlack();
        $state = $games[$max]->getState();
        $date = $games[$max]->getStartDate();
        $_SESSION['gameId'] = $games[$max]->getId();
        $showMovementForm = true;
    }
    $fromRow = $_GET['fromRow'];
    $fromCol = $_GET['fromCol'];
    $toRow = $_GET['toRow'];
    $toCol = $_GET['toCol'];
    $curBoard = new Board();
    $curBoardState = $curBoard->getCurBoardState($_SESSION['gameId']);
    $score = new scoreTBL();
    $scoreTable = $score->infoMarcador(strval($curBoardState[0]['board']));
    $warning=" ";
    $newBoardState="empty";
    if((!is_numeric($fromRow) | !is_numeric($toRow) | !is_numeric($fromCol) | !is_numeric($toCol))) 
    {
        $warning = "<div class='row'>
                        <div class='col text-center'>
                        <p>Introduce un valor válido a las filas y las columnas</p>
                        </div>
                    </div>";
    }
    else{

        $warning = "";
        $executeMovement = new Movement();
        $movementExecution = $executeMovement->movePieceValidation(strval($curBoardState[0]["board"]),$fromRow,$fromCol,$toRow,$toCol);
        if($movementExecution->getStatus())
        {
            $newBoardState = $movementExecution->getBoard();
            $curBoard->insertNewBoardState($_SESSION['gameId'],$newBoardState);
        }
    }

    $gameID = $_GET['game'];
    $value = $_GET['but'];
    $value = (int) $value;

    if ($gameID != null) {
        $showMovementForm = false;
        $board = new Board();
        $boards = $board->getBoardStat($gameID);
        $max = count($boards) - 1;
        if ($value < 0) {
            $value = 0;
        } else if ($value > $max) {
            $value = $max;
        }
        $boardState = $boards[$value]->getBoard();
        $gameInfo = new Game();
        $gamesInf = $gameInfo->getGInfo($gameID);
        foreach ($gamesInf as $game) {
            $title = $game->getName();
            $white = $game->getWhite();
            $black = $game->getBlack();
            $state = $game->getState();
            $date = $game->getStartDate();
        }

    }

    ?>

    <main class="container-fluid text-center mt-2 mb-2">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="row">
                    <div class="col-12">
                        <h2>Partida</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p><?php echo $scoreTable->getMsg();
                        var_dump($curBoardState)?></p>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h3>Game info</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h4>
                                <?php echo $title ?>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Blancas:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $white ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Negras:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $black ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Estado de la partida:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $state ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Inicio de la partida:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $date ?>
                            </p>
                        </div>
                    </div>
                    <?php 
                    if ($showMovementForm) {
                        echo '<form action="boardView.php" method="get">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2>Mueve pieza</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>Desde</h4>
                                </div>
                                <div class="col">
                                    <label for="fromRow">Fila</label>
                                </div>
                                <div class="col">
                                    <input type="number" name="fromRow" id="fromRow" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col offset-4">
                                    <label for="fromCol">Columna</label>
                                </div>
                                <div class="col">
                                    <input type="number" name="fromCol" id="fromCol" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <h4>Hasta</h4>
                                </div>
                                <div class="col">
                                    <label for="toRow">Fila</label>
                                </div>
                                <div class="col">
                                    <input type="number" name="toRow" id="toRow" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col offset-4">
                                    <label for="toCol">Columna</label>
                                </div>
                                <div class="col">
                                    <input type="number" name="toCol" id="toCol" class="form-control">
                                    <input type="hidden" name="noNewGameInsert" id="noNewGameInsert" value="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Mover</button>
                                </div>
                            </div>
                            <?php echo $warning ?>
                        </form>';
                    }
                        
                    ?>
                     </div>
            </div>
            <div class="col-4 ">
                <table>
                    <?php
                    function DrawChessGame($board)
                    {
                        $pieces = explode(",", $board);
                        $piece = 0;
                        $pos = 64;
                        for ($i = 0; $i < 2; $i++) {
                            echo "<tr>";
                            for ($f = 0; $f < 8; $f++) {
                                echo "<td class='dead'>";
                                if ($pieces[$pos] !== "NP") {
                                    echo '<div class="piece">';
                                    echo '<img src="../images/' . $pieces[$pos] . '.png">';
                                    echo '</div>';
                                }
                                echo "</td>";
                                $pos++;
                            }
                            echo "</tr>";
                        }
                        for ($i = 0; $i < 8; $i++) {
                            echo "<tr>";
                            for ($f = 0; $f < 8; $f++) {

                                if (($i + $f) % 2 == 0) {
                                    echo '<td class="white">';
                                } else {
                                    echo '<td class="black">';
                                }
                                if ($pieces[$piece] !== "NP") {
                                    echo '<div class="piece">';
                                    echo '<img src="../images/' . $pieces[$piece] . '.png">';
                                    echo '</div>';
                                }
                                echo '</td>';
                                $piece++;
                            }
                            echo "</tr>";
                        }

                        for ($i = 0; $i < 2; $i++) {
                            echo "<tr>";
                            for ($f = 0; $f < 8; $f++) {
                                echo "<td class='dead'>";
                                if ($pieces[$pos] !== "NP") {
                                    echo '<div class="piece">';
                                    echo '<img src="../images/' . $pieces[$pos] . '.png">';
                                    echo '</div>';
                                }
                                echo "</td>";
                                $pos++;
                            }
                            echo "</tr>";
                        }
                    }
                    if ($boardState == null &  $newBoardState == "empty") {
                        DrawChessGame($startingBoard.",NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP");
                    } else if($newBoardState != "empty"){
                        DrawChessGame($newBoardState.",NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP");
                    }else{
                        DrawChessGame($boardState.",NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP,NP");
                    }

                    ?>
                </table>
            </div>
            <div class="col-4">
                <?php

                if ($gameID != null) {
                    echo "<div class='row'>
                    <div class='col'>
                        <h3>Controles</h3>
                    </div>
                </div>
                <form action='boardView.php' method='get'>
                    <div class='row'>
                        <div class='col'>
                            <button type='submit' name='but' value='0' class='btn btn-success'>
                                <i class='bi bi-caret-left-square'></i>
                            </button>
                        </div>
                        <div class='col'>
                            <button type='submit' name='but' value='" . $value - 1 . "' class='btn btn-success'>
                                <i class='bi bi-caret-left-fill'></i>
                            </button>
                        </div>
                        <div class='col'>
                            <button type='submit' name='but' value='" . $value + 1 . "' class='btn btn-success'>
                                <i class='bi bi-caret-right-fill'></i>
                            </button>
                        </div>
                        <div class='col'>
                            <button type='submit' name='but' value='" . $max . "' class='btn btn-success'>
                                <i class='bi bi-caret-right-square'></i>
                            </button>
                            <input type='hidden' name='game' value ='" . $gameID . "'>
                        </div>
                    </div>
                </form>";
                }

                ?>
            </div>
        </div>
    </main>

    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>