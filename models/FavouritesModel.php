<?php
class FavouritesModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function isFavorite($product_id)
    {
        if (empty($_SESSION['user_id'])) {
            return false; // Chưa đăng nhập, không thể có sản phẩm yêu thích
        }
        $stmt = $this->conn->prepare("
        SELECT * FROM favourite WHERE user_id = :user_id AND product_id = :product_id
        ");
        $stmt->execute([':user_id' => $_SESSION['user_id'], ':product_id' => $product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    public function toggleFavorite($product_id)
    {
        if (empty($_SESSION['user_id'])) {
            return false; // Chưa đăng nhập, không thể có sản phẩm yêu thích
        }
        $user_id = $_SESSION['user_id'];
        // Kiểm tra đã thích chưa
        $stmt = $this->conn->prepare("
        SELECT * FROM favourite WHERE user_id = :user_id AND product_id = :product_id
        ");
        $stmt->execute([':user_id' => $user_id, ':product_id' => $product_id]);
        $fav = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fav) {
            // Nếu đã thích → xóa
            $stmt = $this->conn->prepare("DELETE FROM favourite WHERE id = :id");
            $stmt->execute([':id' => $fav['id']]);
            return false;
        } else {
            // Nếu chưa thích → thêm
            $stmt = $this->conn->prepare("INSERT INTO favourite (user_id, product_id) VALUES(:user_id, :product_id)");
            $stmt->execute([':user_id' => $user_id, ':product_id' => $product_id]);
            return true;
        }
    }

    public function getFavoritesByUserId($userId)
    {
        $stmt = $this->conn->prepare("
        SELECT p.* FROM favourite f
        JOIN products p ON f.product_id = p.id
        WHERE f.user_id = :user_id ORDER BY f.created_at DESC
        ");
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
