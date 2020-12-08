<?php
class Excise
{
    // Connection
    public $conn;

    // Columns
    public $column_8;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getExcise62()
    {
        $sql = "SELECT * FROM excise_62";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // $data = $stmt->fetchAll();
        return $stmt;
    }
    public function getExcise62One()
    {
        $sql = 'SELECT * FROM excise_62 WHERE column_8 LIKE ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('%' . $this->column_8 . '%'));
        return $stmt;
    }
    public function getExcise63One()
    {
        $sql = 'SELECT * FROM excise_63 WHERE column_8 LIKE ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('%' . $this->column_8 . '%'));
        return $stmt;
    }
    public function getExcise63()
    {
        $sql = "SELECT * FROM excise_63";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // $data = $stmt->fetchAll();
        return $stmt;
    }

}
