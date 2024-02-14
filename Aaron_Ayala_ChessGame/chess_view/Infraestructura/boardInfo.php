<?php

class BoardInfo
{
    function __construct()
    {

    }

    function boardStates($game)
    {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
        $san_game = mysqli_real_escape_string($conexion,$game);
        $consulta = mysqli_prepare($conexion, "SELECT ID,IDGame,board FROM T_Board_Status WHERE IDGame = $san_game;");
        $consulta->execute();
        $res = $consulta->get_result();

        $moves = array();

        while ($myrow = $res->fetch_assoc()) {
            array_push($moves, $myrow);

        }
        return $moves;
    }

    function insertBoardState($idGame, $state)
    {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
        $san_bState = mysqli_real_escape_string($conexion, $state);
        $consulta = mysqli_prepare($conexion, "insert into T_Board_Status(board,IDGame) value(?,$idGame)");
        $consulta->bind_param("s", $san_bState);
        $res = $consulta->execute();

        return $res;
    }
    function insertStartingBoard($idGame, $state)
     {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
        $san_bState = mysqli_real_escape_string($conexion, $state);
        $consulta = mysqli_prepare($conexion, "insert into T_Board_Status(IDGame,board) value($idGame,?);");
        $consulta->bind_param("s", $san_bState);
        $res = $consulta->execute();

        return $res;
     }
    function getCurBoardState($idGame)
    {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
        $san_game = mysqli_real_escape_string($conexion,$idGame);
        $consulta = mysqli_prepare($conexion, "SELECT board FROM T_Board_Status where IDGame = $san_game ORDER BY ID DESC limit 1;");
        $consulta->execute();
        $res = $consulta->get_result();

        $curBoard = array();

        while ($myrow = $res->fetch_assoc()) {
            array_push($curBoard, $myrow);

        }
        return $curBoard;
    }
}
    
