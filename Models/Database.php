<?php
class Database
{
    public $connection;
    private $host;
    private $name;
    private $user;
    private $pass;

    public function __construct()
    {
        $this->host = getEnv('DB_HOST');
        $this->name = getEnv('DB_NAME');
        $this->user = getEnv('DB_USER');
        $this->pass = getEnv('DB_PASS');

        $this->connect();
    }

    public function connect()
    {
        echo '_______________________________<br>';
        echo $this->host.'<br><br>';
        echo $this->name.'<br><br>';
        echo $this->user.'<br><br>';
        echo $this->pass.'<br><br>';
        echo '_______________________________<br>';
        $this->connection = new mysqli($this->host,  $this->user, $this->pass, $this->name);
        return $this->connection;
    }
}
