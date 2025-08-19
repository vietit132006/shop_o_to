<?php
require_once './commons/env.php';

class OrderModel
{
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USERNAME,
                DB_PASSWORD
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            die("Kết nối DB thất bại: " . $e->getMessage());
        }
    }

    // ✅ Lấy danh sách đơn hàng của user
    public function getOrdersByUserId($userId)
    {
        $sql = "SELECT o.*, p.name, p.image, p.price AS product_price
            FROM orders o
            JOIN products p ON o.product_id = p.id
            WHERE o.user_id = :user_id
            ORDER BY o.created_at DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ✅ Thêm đơn hàng mới (tự động lấy giá sản phẩm làm total_price)
    public function addOrder($userId, $productId)
    {
        $sql = "
            INSERT INTO orders (user_id, product_id, total_price, status, created_at)
            SELECT :user_id, :product_id, p.price, 0, NOW()
            FROM products p
            WHERE p.id = :product_id
        ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'user_id'   => $userId,
            'product_id' => $productId
        ]);
    }
}
