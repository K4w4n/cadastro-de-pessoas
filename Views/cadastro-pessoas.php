<?php
global $haveErro;
global $idOrError;

global $name;
global $surname;
global $gender;
global $age;
global $phrase;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar pessoas</title>
    <link rel="stylesheet" href="http://localhost/cadastro-de-pessoas/css/style.css">
    <link rel="stylesheet" href="http://localhost/cadastro-de-pessoas/css/style-criar-usuario.css">
    <link rel="shortcut icon" href="http://localhost/cadastro-de-pessoas/img/estudando.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0">
    <script src="http://localhost/cadastro-de-pessoas/javascript/script.js" defer></script>
</head>

<body>

    <?php include 'menu.php'; ?>

    <?php if ($haveErro) : ?>
        <div id="status-conexao" class="erro">
            <?= $idOrError->description ?>
        </div>
    <?php endif ?>

    <div id="voltar" class="btn-flutuante"></div>

    <h1 id="pg-titulo">Cadastrar pessoas</h1>

    <form id="form-criar-usuario" action="/cadastro-de-pessoas/pessoa/cadastro" method="post" class="cartao-flutuante">

        <input type="text" name="nome" id="nome" placeholder="Nome" required value="<?= $name ?>">

        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required value="<?= $surname ?>">

        <select name="genero" id="genero" required>
            <option value="" disabled <?= $gender == '' ? 'selected' : '' ?>>Genêro</option>
            <option value="masculino" <?= $gender == 'masculino' ? 'selected' : '' ?>>Masculino</option>
            <option value="feminino" <?= $gender == 'feminino' ? 'selected' : '' ?>>Feminino</option>
            <option value="outro" <?= $gender == 'outro' ? 'selected' : '' ?>>Outro</option>
            <option value="nao dizer" <?= $gender == 'nao dizer' ? 'selected' : '' ?>>Prefiro não dizer</option>
        </select>

        <input type="number" name="idade" id="idade" min="0" max="150" placeholder="idade" required value="<?= $age ?>">

        <input type="text" name="frase" id="frase" placeholder="Frase" required value="<?= $phrase ?>">

        <input type="submit" name="submit" value="Let's go" id="submit">
    </form>
</body>

</html>