<?php

class myconnnection
{
    private $host = "localhost";
    private $dbname = "newdata";
    private $username = "root";
    private $password = "";

    private $con;

    public function connect()
    {
        $this->con = null;

        try
        {
            $this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);//open connection
        }
        catch(PDOException $exception)
        {
            echo "Connection:Error". $exception->getMessage();
        }

        return $this->con;

    }

    public function disconnect()
    {
        $this->con = null;

        return $this->con;
    }

}

?> 