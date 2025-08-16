<?php
class ColorModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Truy vấn lấy danh sách màu sắng
    public function getAll()
    {
        $sql = "
                SELECT * FROM colors
                ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
