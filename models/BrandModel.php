<?php
class BrandModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Truy vấn lấy danh sách thương hiệu
    public function getAll()
    {
        $sql = "
                SELECT * FROM brands
                ";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
