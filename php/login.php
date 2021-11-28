<?php

    /**
	 * Este if vai verificar se está recebenedo informações via POST. Se sim. então deverá tentar se conectar.
	 * @param array
	 * @return bool
	*/

    // Recebe os campos do formulário
    include "../php/sql/sql.php";

    $sql = new SQL();

    $query = "SELECT * FROM tb_usuarios WHERE username = :username";
    $params = array(
        ':username' => $_POST['username']
    );
    $res = $sql->select($query, $params);

    if( isset($res[0]) == false){
        echo "Username inválido!";
        echo "<button><a href='../html/login.html'>Página de login</a></button>";
        exit;
    }

    else if(isset($res[0]) == true)
    {
        if( password_verify($_POST['senha'], $res[0]['senha_cript']) == false ){ 
            echo "Senha inválida!";
            exit;
        }
        else{ 
            include $_SERVER['DOCUMENT_ROOT']."/src/_php/usuario.php";
            $user = new usuario();
            $user->set($results[0]);
            Header("Location: ../html/index.php");
            exit;
        }


    }
	
?>