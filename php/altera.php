<?php
    include "../php/sql/sql.php";
    $cod_usuario = $_GET["cod_usuario"];
    $sql = "SELECT * FROM tb_usuarios WHERE cod_usuario = $cod_usuario;";
    $res = mysqli_query($mysqli,$sql);
    $usuario = mysqli_fetch_array($res);
?>
<html>
    <head>
        <title>Formulário</title>
    </head>
	<body>
        <p><strong>Atualização de Usuário</strong></p>
        <form action="recebe_dados.php" method="POST">
            <input type="hidden" name="operacao" value="atualizar">
            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario?>">
            <p>Username: <input type="text" name="username" size="15" value="<?php echo $usuario["username"]?>"> </p>
            <p>Senha: <input type="password" name="senha" size="15" value="<?php echo $usuario["senha"]?>"> </p>
            <p>Nome: <input type="text" name="nome" size="30" value="<?php echo $usuario["nome"]?>"> </p>
            <p>Data de Nascimento: <input type="date" name="data_nascimento" id="data_nascimento" required value="<?php echo $usuario["data_nascimento"]?>"> </p>
            <p>E-mail: <input type="text" name="email" size="30" value="<?php echo $usuario["email"]?>"></p> 
            <p><input type="submit" value="Enviar!"></p>
        </form>
	<body>
</html>
<?php
    mysqli_close($mysqli);
?>