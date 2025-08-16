<?php
class ClientHomepageModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Truy vấn lấy danh sách thương hiệu
    public function getAllBrands() {}
}
