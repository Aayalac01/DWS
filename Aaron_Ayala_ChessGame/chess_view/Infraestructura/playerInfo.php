<?php

class PlayerInfo
{
    function __construct()
    {}

    function data()
    {
        $conexion = mysqli_connect('localhost', 'root', 'sanicculurs2gs');
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
        }
        mysqli_select_db($conexion, 'chess_game');
        $consulta = mysqli_prepare($conexion, "SELECT ID, name FROM T_Players");
        $consulta->execute();
        $result = $consulta->get_result();

        $players = array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($players,$myrow);

        }
		return $players;
    }
}