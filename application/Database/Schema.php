<?php


namespace Database;


use Exception;
use PDOException;

class Schema extends Connection
{

    public $error;

    public function __construct()
    {
        parent::__construct();
    }

    public function drop(string $tableName) : bool
    {

       $stmt = $this->conn->exec("DROP TABLE $tableName");

       return !$stmt ? false : true;

    }

    public function create_table(string $tableName, array $columns) : bool
    {

        $opts = '';

        try
        {
            foreach ( $columns as $name => $type ):
                if (empty($type) || !is_string($name) || !is_string($type))
                {
                    $this->error = 'Invalid column in "create table"';

                    return false;
                }

                $opts .= "$name $type";
            endforeach;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();

            return false;
        }

        if (empty($opts))
            return false;

        $query = "CREATE TABLE $tableName ( $opts )";

        try
        {
            $stmt = $this->conn->exec($query);

            return !$stmt ? false : true;
        }
        catch (PDOException $e)
        {
            $this->error = $e->getMessage();

            return false;
        }

    }

    public static function create_trigger(string $command)
    {
        // TODO
    }

    public static function get_all_tables()
    {
        // TODO
    }

}