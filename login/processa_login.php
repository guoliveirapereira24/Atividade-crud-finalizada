<?php

require("../database/conexao.php");

function criarLogin($usuario, $senha, $conexao)
{

    $sql = "SELECT * FROM tbl_usuario WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexao, $sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if (
        isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"])
        && $usuario == $dadosUsuario["usuario"] && $senha == $dadosUsuario["senha"]
    ) {

        $_SESSION["id"] = $dadosUsuario["id"];
        $_SESSION["nome"] = $dadosUsuario["usuario"];


        header("location: ../cadastro/index.php");
    } else {
        session_destroy();
        header("location: index.php");
    }
}

function verificaLogin()
{

    if (empty($_SESSION["id"])) {
        session_destroy();
        header("location: ../login/index.php");
    }
}


