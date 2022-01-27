<?php
class Environment
{
    public function __construct($dir = '')
    {
        $this->load($dir);
    }

    static function load($dir)
    {
        $dirEnv = $dir . '.env';

        if (!file_exists($dirEnv) || getEnv('DB_HOST')) return;


        $lines = file($dirEnv);
        foreach ($lines as $line) {
            putenv(trim($line));
        }
    }
}
