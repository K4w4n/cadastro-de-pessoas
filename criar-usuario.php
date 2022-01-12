<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar pessoas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-criar-usuario.css">
    <link rel="shortcut icon" href="img/estudando.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0">
    <script src="javascript/script.js" defer></script>
</head>

<body>
    <?php include './conexao.php'; ?>
    <div id="voltar" class="btn-flutuante"></div>
    <h1 id="pg-titulo">Cadastrar pessoas</h1>
    <form id="form-criar-usuario" action="criar-usuario.php" method="post" class="cartao-flutuante">
        <input type="text" name="nome" id="nome" placeholder="Nome">

        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome">

        <select name="genero" id="genero">
            <option value="" disabled selected>Genêro</option>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
            <option value="nao dizer">Prefiro não dizer</option>
        </select>

        <input type="number" name="idade" id="idade" min="0" max="150" placeholder="idade">

        <input type="text" name="frase" id="frase" placeholder="Frase">

        <input type="submit" name="submit" value="Let's go" id="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO tb_pessoas (user_nome, user_sobrenome, user_genero, user_idade, user_frase) 
    VALUES (?, ?, ?, ?, ?);";
    $stmt = $conection->prepare($sql);
    $stmt->bind_param('sssis', $_POST['nome'], $_POST['sobrenome'], $_POST['genero'], $_POST['idade'], $_POST['frase']);
    $stmt->execute();
    $result = $stmt->get_result();
    header('Location:/aprendendo php/');
}

?>