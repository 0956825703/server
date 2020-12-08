<?php
class Auth
{
    // Connection
    public $conn;

    // Table
    public $db_table = "users";

    // Columns
    public $id;
    public $name;
    public $email;
    public $password;
    public $passworded;
    public $phone;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register()
    {
        $data = [];
        $sql = "SELECT * FROM " . $this->db_table . " WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':email' => $this->email));

        if ($stmt->rowCount() > 0) {
            $msg = [
                'success' => false,
                'msg' => 'มีผู้ใช้ Username นี้แล้ว',
            ];
        } else {

            $pass_hash = password_hash($this->password, PASSWORD_DEFAULT);

            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $pass_hash,
                'phone' => $this->phone,
            ];

            $sql = "INSERT INTO  " . $this->db_table . " (name, email, password, phone) VALUES (:name, :email, :password, :phone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);

            $msg = [
                'success' => true,
                'msg' => 'ลงชื่อเข้าใช้เสร็จสิ้น',
            ];
        }
        return $msg;
    }

    public function login()
    {
        $msg = [];
        $sql = "SELECT * FROM  " . $this->db_table . " WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':email' => $this->email));

        if ($stmt->rowCount() > 0) {
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->password, $dataRow['password'])) {
                return $dataRow;
            } else {
                $msg = [
                    'success' => false,
                    'msg' => 'Email | password ไม่ถูกต้อง',
                ];
                return $msg;
            }
        } else {
            $msg = [
                'success' => false,
                'msg' => 'Email | password ไม่ถูกต้อง',
            ];
            return $msg;
        }
    }
    public function updatePassword()
    {
        $msg = [];
        $sql = "SELECT * FROM  " . $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':id' => $this->id));
        if ($stmt->rowCount() > 0) {
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->password, $dataRow['password'])) {
                // echo "id ==>" . $this->id ;
                $pass_hash = password_hash($this->passworded, PASSWORD_DEFAULT);
                $dataed = [
                    'password' => $pass_hash,
                    'id' => $this->id,
                ];
                $sqlQuery = "UPDATE  users  SET  password=:password   WHERE id=:id";
                $top = $this->conn->prepare($sqlQuery);
                if ($top->execute($dataed)) {
                    $msg = [
                        'success' => true,
                        'msg' => 'เปลี่ยนรหัสผ่านสำเร็จ !!',
                    ];
                } else {
                    $msg = [
                        'success' => false,
                        'msg' => 'เกิดข้อผิดพลาด !!',
                    ];
                }

            } else {
                $msg = [
                    'success' => false,
                    'msg' => 'รหัสผ่านไม่ถูกต้อง !!',
                ];
            }
        } else {
            $msg = [
                'success' => false,
                'msg' => 'ไม่พบข้อมูล !!',
            ];
        }
        return $msg;
    }
    public function check()
    {
        $sql = "SELECT * FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // $data = $stmt->fetchAll();
        return $stmt;
    }
}
