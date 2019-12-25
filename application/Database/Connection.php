<?php


namespace Database;


use PDO;
use PDOException;

class Connection
{

    const devmode = true;

    private $DATA = CONFIG_GLOBAL['Database'];

    private $conn;

    public $error;

    public function __construct()
    {

        $this->create_connection();

    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        if (!empty($this->error))
            return false;

        return $this->conn;
    }

    private function create_connection() : void
    {

        try
        {

            $dsn = "mysql:host={$this->DATA['host']};port={$this->DATA['port']};dbname={$this->DATA['dbname']}";

            $this->conn = new PDO($dsn, $this->DATA['username'], $this->DATA['password']);

            if (self::devmode)
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            else
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

        }
        catch (PDOException $e)
        {
            $this->error = $e->getMessage();
        }

    }

    private static function drivers_are_ok() : bool
    {

        if (extension_loaded('pdo'))
            return true;

        return false;

    }

}