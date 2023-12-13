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
}
    
