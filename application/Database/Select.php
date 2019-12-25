<?php


namespace Database;


use PDO;

class Select implements DbTemplate
{

    private $conn;
    private $attr;
    private $query;

    public $error;
    public $table;
    public $data;
    public $where;
    public $limit;

    public function __construct()
    {

        $_ = new Connection();
        $this->conn = $_->conn;

    }

    public function get()
    {

        $this->generateQuery();

        $stmt = $this->conn->prepare($this->query);

        foreach ($this->attr as $key => $value)
        {
            $stmt->bindParam($key, $value);
        }

        if ($stmt->execute())
            return $stmt->fetch(PDO::FETCH_ASSOC);

        return false;

    }

    public function setAttribute(string $attr, string $value)
    {
        // TODO: Implement setAttribute() method.

        $this->attr[$attr] = $value;
    }

    public function generateQuery()
    {
        // TODO: Implement generateQuery() method.

        if (empty($this->data))
            $this->data = '*';

        $query = 'SELECT ' . $this->data . ' FROM ';

        if (empty($this->table))
        {
            $this->error = 'Empty table';
            return false;
        }

        $query .= $this->table . ' ';

        if (!empty($this->where))
            $query .= 'WHERE ' . $this->where . ' ';

        if (empty($this->limit))
        {
            if (!is_int($this->limit))
                $this->limit = 10;

            $this->limit = 10;
        }

        $query .= 'LIMIT ' . $this->limit;

         $this->query = $query;

    }
}