<?php
    session_start();
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }
    if(isset($_SESSION["senha_cript"])){
        $senha_cript = $_SESSION["senha_cript"];
    }
    if(empty($username) OR empty($senha_cript)){
        echo "Você não fez o login!";
        echo "<p><a href='ligin.html'>Página de login</a></p>";
        exit;
    }
    else{
        include "conecta_mysql.inc";
        $sql = "SELECT * FROM usuarios WHERE username = '$username';";
        $res = mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($res) != 1){
            unset($_SESSION["username"]);
            unset($_SESSION["senha_cript"]);
            echo "Você não fez o login!";
            echo "<p><a href='ligin.html'>Página de login</a></p>";
            mysqli_close($mysqli);
            exit;
        }
        else{
            $usuario = mysqli_fetch_array($res);
            if(!hash_equals($usuario["senha_cript"], $senha_cript)){
                unset($_SESSION["username"]);
                unset($_SESSION["senha_cript"]);
                echo "Você não fez o login!";
                echo "<p><a href='ligin.html'>Página de login</a></p>";
                mysqli_close($mysqli);
                exit;
            }
        }
        mysqli_close($mysqli);
    }
?>