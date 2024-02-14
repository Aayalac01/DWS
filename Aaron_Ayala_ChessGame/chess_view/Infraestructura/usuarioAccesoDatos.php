<?php

class UsuarioAccesoDatos
{
	
	function __construct()
    {
    }

	function insertar($usuario,$email,$perfil,$clave)
	{
		$conexion = mysqli_connect('localhost','root','sanicculurs2gs');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'chess_game');
		$consulta = mysqli_prepare($conexion, "insert into T_Players(name,email,password,profileType) values (?,?,?,?);");
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $consulta->bind_param("ssss", $usuario,$email,$hash,$perfil);
        $res = $consulta->execute();
        
		return $res;
	}

    function  verificar($usuario,$clave)
    {
        $conexion = mysqli_connect('localhost','root','sanicculurs2gs');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conexion, 'chess_game');
        $consulta = mysqli_prepare($conexion, "select name,password,profileType from T_Players where name = ?;");
        $sanitized_usuario = mysqli_real_escape_string($conexion, $usuario);       
        $consulta->bind_param("s", $sanitized_usuario);
        $consulta->execute();
        $res = $consulta->get_result();


        if ($res->num_rows==0)
        {
            return 'NOT_FOUND';
        }

        if ($res->num_rows>1) //El nombre de usuario debería ser único.
        {
            return 'NOT_FOUND';
        }

        $myrow = $res->fetch_assoc();
        $x = $myrow['password'];
        if (password_verify($clave, $x))
        {
            return $myrow['profileType'];
        } 
        else 
        {
            return 'NOT_FOUND';
        }
    }
}




















