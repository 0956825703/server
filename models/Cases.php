<?php
class Cases
{
    // Connection
    public $conn;

    // Columns
    public $column_0;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getCase62()
    {
        $sql = "SELECT * FROM case_62";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function getCase62One()
    {
        $sql = 'SELECT * FROM case_62 WHERE column_0 LIKE ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('%' . $this->column_0 . '%'));
        return $stmt;
    }
    public function getCase63One()
    {
        $sql = 'SELECT * FROM case_63 WHERE column_0 LIKE ? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array('%' . $this->column_0 . '%'));
        return $stmt;
    }
    public function getCase63()
    {
        $sql = "SELECT * FROM case_63";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

}
