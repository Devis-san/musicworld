<?php
    include "../php/sql/sql.php";
    $operacao = $_POST["operacao"];

    if($operacao == "inserir"){
        $username = $_POST["username"];
        $senha = $_POST["senha"];
        $nome = $_POST["nome"];
        $idade = $_POST["data_nascimento"];
        $email = $_POST["email"];
        $erro = 0;

        if(strlen($username) < 5 OR strlen($username) > 15){
            echo "O username deve possuir no mínimo 5 e no máximo 15 caracteres.<br>";
            $erro = 1;
        }
        if(strlen($senha) < 5 OR strlen($senha) > 15){
            echo "A senha deve possuir no mínimo 5 e no máximo 15 caracteres.<br>";
            $erro = 1;
        }
        if($username == $senha){
            echo "O username e a senha devem ser diferentes.<br>";
            $erro = 1;
        }
        if(empty($nome) OR strstr($nome,' ') == FALSE){
            echo "Por Favor digitar seu nome corretamente. <br>";
            $erro = 1;
        }
        if(strlen($nome) > 30){
            echo "O nome deve possuir no máximo 30 caracteres.<br>";
            $erro = 1;
        }
        if($data_nascimento = $_POST["data_nascimento"]);
        if(strlen($email) < 8 || strstr($email,'@') == FALSE){
            echo "Favor digitar seu email corretamente. <br>";
            $erro = 1;
        }
        if(strlen($email) > 30){
            echo "O email deve possuir no máximo 30 caracteres.<br>";
            $erro = 1;
        }
        
        if($erro == 0) {

            $sql = new Sql();
            $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
            $query = "INSERT INTO tb_usuarios (username, senha_cript, nome, data_nascimento, email) VALUES ('$username','$senha_cript','$nome', '$data_nascimento','$email');";
            $sql->QuerySQL($query);
            echo "<br>Usuário cadastrado com sucesso!";
            
        }

        header("Location: ../html/index.php");
    }
    
    /*elseif($operacao == "exibir"){
        $sql = "SELECT * FROM tb_usuarios;";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            echo "Username: ".$usuario["username"]."<br>";
            echo "Senha: ".$usuario["senha_cript"]."<br>";
            echo "Nome: ".$usuario["nome"]."<br>";
            echo "data_nascimento: ".$data_nascimento["data_nascimento"]."<br>";
            echo "Email: ".$usuario["email"]."<br>";
            echo "<a href='altera.php?cod_usuario=".$usuario["cod_usuario"]."'>Alterar usuário</a>";
            echo "<br>----------------------------------<br>";
        }
    }*/

    /*elseif($operacao == "buscar"){
        $username = $_POST["username"];
        $sql = "SELECT * FROM tb_usuarios WHERE username like '%$username%';";
        $res = mysqli_query($mysqli,$sql);
        $linhas = mysqli_num_rows($res);
        for($i=0; $i < $linhas; $i++){
            $usuario = mysqli_fetch_array($res);
            echo "Username: ".$usuario["username"]."<br>";
            echo "Senha: ".$usuario["senha_cript"]."<br>";
            echo "Nome: ".$usuario["nome"]."<br>";
            echo "data_nascimento: ".$usuario["data_nascimento"]."<br>";
            echo "Email: ".$usuario["email"]."<br>";
            echo "----------------------------------<br>";
        }
    }*/

    /*elseif($operacao == "atualizar"){
        $cod_usuario = $_POST["cod_usuario"];
        $username = $_POST["username"];
        $senha_atual = $_POST["senha_atual"];
        $senha_nova = $_POST["senha_nova"];
        $senha_nova_rep = $_POST["senha_nova_rep"];
        $nome = $_POST["nome"];
        $data_nascimento = $_POST["data_nascimento"];
        $email = $_POST["email"];
        $erro = 0;

        $sql = "SELECT * FROM tb_usuarios WHERE cod_usuario = $cod_usuario;";
        $res = mysqli_query($mysqli,$sql);
        $usuario = mysqli_fetch_array($res);

        if(strlen($username) < 5 OR strlen($username) > 15){
            echo "O username deve possuir no mínimo 5 e no máximo 15 caracteres.<br>";
            $erro = 1;
        }
        if(!password_verify($senha_atual,$usuario["senha_cript"])){
            echo "A senha atual está errada.<br>";
            $erro = 1;
        }
        if(strlen($senha_nova) < 5 OR strlen($senha_nova) > 15){
            echo "A senha nova deve possuir no mínimo 5 e no máximo 15 caracteres.<br>";
            $erro = 1;
        }
        if($senha_nova != $senha_nova_rep){
            echo "A senha nova não foi repetida corretamente.<br>";
            $erro = 1;
        }
        if($username == $senha_nova){
            echo "O username e a senha nova devem ser diferentes.<br>";
            $erro = 1;
        }
        if(empty($nome) OR strstr($nome,' ') == FALSE){
            echo "Favor digitar seu nome corretamente. <br>";
            $erro = 1;
        }
        if(strlen($nome) > 30){
            echo "O nome deve possuir no máximo 30 caracteres.<br>";
            $erro = 1;
        }
        if($data_nascimento = $_POST["data_nascimento"]);
        if(strlen($email) < 8 || strstr($email,'@') == FALSE){
            echo "Por Favor digitar seu email corretamente. <br>";
            $erro = 1;
        }
        if(strlen($email) > 30){
            echo "O email deve possuir no máximo 30 caracteres.<br>";
            $erro = 1;
        }
        
        if($erro == 0) {
            $senha_cript = password_hash($senha_nova, PASSWORD_DEFAULT);
            $sql = "UPDATE tb_usuarios SET username = '$username', senha_cript = '$senha_cript', nome = '$nome',";
            $sql .= "idade = $idade, email = '$email'";
            $sql .= "WHERE cod_usuario = $cod_usuario;";  
            mysqli_query($mysqli,$sql);  
            echo "<br>O usuário foi atualizado com sucesso!"; 
            echo "<br><br><a href='index.php'>Tela Inicial</a>"; 
        }
        else{
            echo "<br><a href='altera.php?cod_usuario=".$usuario["cod_usuario"]."'>Voltar para Alterar usuário</a>";
        }

    }*/
?>