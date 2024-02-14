<?php

class GameInfo
{
    function __construct()
    {

    }

    function insert($name, $j1, $j2)
    {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
        $san_name = mysqli_real_escape_string($conexion, $name);
        $san_j1 = mysqli_real_escape_string($conexion, $j1);
        $san_j2 = mysqli_real_escape_string($conexion, $j2);
        $consulta = mysqli_prepare($conexion, "INSERT INTO T_Matches (title,white,black,startDate) VALUE ('$san_name','$san_j1','$san_j2',NOW())");
        $consulta->execute();
    }

    function gInfo($orden, $estado)
    {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
       if (($orden == null & $estado == null)| ($orden == "empty" & $estado == "empty")) {
        $consulta = mysqli_prepare($conexion, "SELECT tm.ID AS ID,title,tp1.name as white,tp2.name as black,
        startDate,endDate,winner,state FROM T_Matches tm INNER JOIN T_Players tp1 ON tp1.ID = tm.white 
        INNER JOIN T_Players tp2 ON tp2.ID = tm.black order by ID;");
       }else if ($orden != "empty" & $estado == "empty") 
        {
            $consulta = mysqli_prepare($conexion, "SELECT 
        tm.ID AS ID,
        title,
        tp1.name AS white,
        tp2.name AS black,
        startDate,
        endDate,
        winner,
        state
    FROM
        T_Matches tm
            INNER JOIN
        T_Players tp1 ON tp1.ID = tm.white
            INNER JOIN
        T_Players tp2 ON tp2.ID = tm.black order by $orden desc");
        } else if ($orden == "empty" & $estado != "empty") 
        {
        $consulta = mysqli_prepare($conexion, "SELECT 
        tm.ID AS ID,
        title,
        tp1.name AS white,
        tp2.name AS black,
        startDate,
        endDate,
        winner,
        state
    FROM
        T_Matches tm
            INNER JOIN
        T_Players tp1 ON tp1.ID = tm.white
            INNER JOIN
        T_Players tp2 ON tp2.ID = tm.black where state like '$estado';");
        } else if($orden != "empty" & $estado != "empty") {
            $consulta = mysqli_prepare($conexion, "SELECT 
        tm.ID AS ID,
        title,
        tp1.name AS white,
        tp2.name AS black,
        startDate,
        endDate,
        winner,
        state
    FROM
        T_Matches tm
            INNER JOIN
        T_Players tp1 ON tp1.ID = tm.white
            INNER JOIN
        T_Players tp2 ON tp2.ID = tm.black where state like '$estado' ORDER BY $orden DESC;");
        }

        $consulta->execute();
        $res = $consulta->get_result();

        $games = array();

        while ($myrow = $res->fetch_assoc()) {
            array_push($games, $myrow);

        }
        return $games;
    }

    function gInfo2($game)
    {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
        $san_game = mysqli_real_escape_string($conexion, $game);
        $consulta = mysqli_prepare($conexion, "SELECT tm.ID as ID,title,tp1.name as white,tp2.name as black,
        startDate,state FROM T_Matches tm INNER JOIN T_Players tp1 ON tp1.ID = tm.white 
        INNER JOIN T_Players tp2 ON tp2.ID = tm.black WHERE tm.ID = $san_game;");
        $consulta->execute();
        $res = $consulta->get_result();

        $games = array();

        while ($myrow = $res->fetch_assoc()) {
            array_push($games, $myrow);

        }
        return $games;
    }
}