<?php
require_once './models/OrderModel.php';

class OrderController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    // ✅ Hiển thị danh sách đơn hàng của user
    public function index()
    {
        // Lấy user_id từ session (khi đăng nhập)
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login");
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Gọi model lấy danh sách đơn hàng
        $orders = $this->orderModel->getOrdersByUserId($userId);

        $view = "clients/orders";
        require_once PATH_VIEW_MAIN;
    }

    // ✅ Thêm đơn hàng (gọi khi ấn nút đặt hàng)
    public function add($productId = null)
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login");
            exit;
        }

        if (!$productId || !is_numeric($productId)) {
            $_SESSION['error'] = "ID sản phẩm không hợp lệ!";
            header("Location: ?act=orders");
            exit;
        }

        $userId = $_SESSION['user_id'];

        $result = $this->orderModel->addOrder($userId, $productId);

        if ($result) {
            $_SESSION['success'] = "✅ Đặt hàng thành công!";
        } else {
            $_SESSION['error'] = "❌ Đặt hàng thất bại!";
        }
        header("Location: ?act=orders");
        exit;
    }
}
