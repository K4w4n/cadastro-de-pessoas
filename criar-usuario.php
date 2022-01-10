<?php
if (isset($_POST['submit'])) {
    include './conexao.php';
    $sql = "INSERT INTO tb_pessoas (user_nome, user_sobrenome, user_genero, user_idade, user_frase) 
    VALUES (?, ?, ?, ?, ?);";
    $stmt = $conection->prepare($sql);
    $stmt->bind_param('sssis', $_POST['nome'], $_POST['sobrenome'], $_POST['genero'], $_POST['idade'], $_POST['frase']);
    $stmt->execute();
    $result = $stmt->get_result();
    header('Location:/aprendendo php/');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar pessoas</title>
    <link rel="shortcut icon" href="img/estudando.png" type="image/x-icon">
</head>

<body>
    <h1>Cadastrar pessoas</h1>
</body>
<form action="criar-usuario.php" method="post">
    <div class="item-form">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
    </div>
    <div class="item-form">
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome">
    </div>
    <div class="item-form">
        <label for="genero">Genero: </label>
        <select name="genero" id="genero">
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
            <option value="nao dizer">Prefiro não dizer</option>
        </select>
    </div>
    <div class="item-form">
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" min="0" max="150">
    </div>
    <div class="item-form">
        <label for="frase">Frase:</label>
        <input type="text" name="frase" id="frase">
    </div>
    <input type="submit" name="submit" value="Let's go">
</form>

</html>