<?php
define('HOSTNAME', 'localhost');
define('BANCODEDADOS', 'db_kawan');
define('USUARIO', 'app');
define('SENHA', 'z&Y2pyUvys4fIAy*r$AFgbPnZSD');

$mysqli = new mysqli(HOSTNAME, USUARIO, SENHA, BANCODEDADOS);
if ($mysqli->connect_errno) {
    echo 'houve um erro na conexão do banco de dados';
}
