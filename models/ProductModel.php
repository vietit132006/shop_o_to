<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getProducts($keyword, $sort, $status, $brandIds, $colorIds)
    {
        $query = "
        SELECT DISTINCT * FROM  products WHERE 1=1
        ";
        $params = [];

        if (!empty($keyword)) {
            $query .= " AND name LIKE :keyword";
            $params[':keyword'] = "%$keyword%";
        }

        if (!empty($status)) {
            $query .= " AND status = :status";
            $params[':status'] = (int)$status;
        }

        if (!empty($brandIds)) {
            $inBrands = implode(',', array_fill(0, count($brandIds), '?'));
            $query .= " AND brand_id IN ($inBrands)";
            $params = array_merge($params, $brandIds);
        }

        if (!empty($colorIds)) {
            $inColors = implode(',', array_fill(0, count($colorIds), '?'));
            $query .= " AND color_id IN ($inColors)";
            $params = array_merge($params, $colorIds);
        }

        if ($sort === 'ASC') {
            $query .= " ORDER BY price ASC";
        } elseif ($sort === 'DESC') {
            $query .= " ORDER BY price DESC";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết sản phẩm theo ID
    public function getProductById($id)
    {
        $query = "
        SELECT
            p.*, 
            b.name AS brand_name,
            b.description AS brand_description,
            c.name AS color_name
        FROM products p
        LEFT JOIN brands b ON p.brand_id = b.id
        LEFT JOIN colors c ON p.color_id = c.id
        WHERE p.id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách sản phẩm theo user_id
    public function getProductByUserId($userId)
    {
        $sql = "
        SELECT id, name, image, price FROM `products` WHERE user_id =:user_id
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa sản phẩm theo ID
    public function deleteProductById($id)
    {
        // Xóa sản phẩm khỏi bảng yêu thích trước
        $sqlFav = "DELETE FROM favourite WHERE product_id = :id";
        $stmtFav = $this->conn->prepare($sqlFav);
        $stmtFav->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtFav->execute();

        // Xóa sản phẩm khỏi bảng đơn hàng trước
        $sqlOrder = "DELETE FROM orders WHERE product_id = :id";
        $stmtOrder = $this->conn->prepare($sqlOrder);
        $stmtOrder->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtOrder->execute();

        // Xóa sản phẩm khỏi bảng products
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    // Cập nhật thông tin sản phẩm
    public function updateProduct($id, $name, $status, $brand_id, $color_id, $price, $quantity, $description, $image)
    {
        $sql = "
        UPDATE products 
        SET name = :name, status = :status, brand_id = :brand_id, color_id = :color_id, price = :price, quantity = :quantity, description = :description, image = :image
        WHERE id = :id
        ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':status' => $status,
            ':brand_id' => $brand_id,
            ':color_id' => $color_id,
            ':price' => $price,
            ':quantity' => $quantity,
            ':description' => $description,
            ':image' => $image
        ]);
    }

    // Thêm sản phẩm mới
    public function createProduct($name, $status, $brand_id, $color_id, $price, $quantity, $description, $image, $user_id)
    {
        $sql = "
        INSERT INTO products (name, status, brand_id, color_id, price, quantity, description, image, user_id)
        VALUES (:name, :status, :brand_id, :color_id, :price, :quantity, :description, :image, :user_id)
        ";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $name,
            ':status' => $status,
            ':brand_id' => $brand_id,
            ':color_id' => $color_id,
            ':price' => $price,
            ':quantity' => $quantity,
            ':description' => $description,
            ':image' => $image,
            ':user_id' => $user_id
        ]);
    }
}
