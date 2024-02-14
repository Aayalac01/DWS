<?php

require("Infraestructura/usuarioAccesoDatos.php");

ini_set('display_errors', 'On');
ini_set('html_errors', 0);
function test_alta_usuario()
{
    $u = new UsuarioAccesoDatos();
    return $u->insertar('aaron', 'aaron@mail.com', 'premium', 'passwordaaron');
}

function test_verificar_usuario_encontrado()
{
    $perfil_esperado = 'jugador';
    $u = new UsuarioAccesoDatos();
    $perfil = $u->verificar('aaron', 'passwordaaron');
    return $perfil === $perfil_esperado;
}
var_dump(test_alta_usuario());
var_dump(test_verificar_usuario_encontrado());
