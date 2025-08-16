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
}
