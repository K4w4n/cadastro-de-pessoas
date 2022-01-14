<?php
define('HOSTNAME', 'localhost');
define('BANCODEDADOS', 'db_kawan');
define('USUARIO', 'app');
define('SENHA', 'z&Y2pyUvys4fIAy*r$AFgbPnZSD');

function conectarBd()
{
    return new mysqli(HOSTNAME, USUARIO, SENHA, BANCODEDADOS);
}
function desenharConexao($conexaoDb)
{
    if ($conexaoDb->connect_errno) : ?>
        <div id="status-conexao" class="erro">
            Banco de dados não conectado
        </div>
    <?php else : ?>
        <div id="status-conexao" class="sucesso">
            Banco de dados conectado
        </div>
<?php
    endif;
}
