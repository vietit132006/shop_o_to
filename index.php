<?php
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common

require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ClientController.php';
require_once './controllers/AuthController.php';
require_once './controllers/AdminController.php';
require_once './controllers/OrderController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/BrandModel.php';
require_once './models/ColorModel.php';
require_once './models/UserModel.php';
require_once './models/FavouritesModel.php';
require_once './models/OrderModel.php';

// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new ClientController())->index(),

    // Trang chi tiết sản phẩm
    'product-detail' => (new ClientController())->detail(),

    // Thêm/xóa sản phẩm yêu thích
    'toggle-favorite' => (new ClientController())->toggleFavorite(),

    // Trang sản phẩm yêu thích
    'favourite' => (new ClientController())->favourite(),

    // Trang đăng nhập
    'login' => (new AuthController())->login(),

    // Trang đăng xuất
    'logout' => (new AuthController())->logout(),

    // Trang đăng ký
    'sign_up' => (new AuthController())->signUp(),

    // Trang đơn hàng (dùng OrderController)
    'orders' => (new OrderController())->index(),

    // Thêm đơn hàng (gọi khi ấn nút đặt hàng)
    'add-order' => (new OrderController())->add($_GET['product_id'] ?? null),



    //Trang dashboard
    'dashboard' => (new AdminController())->index(),

    // Trang quản lý sản phẩm
    'manage_products' => (new AdminController())->manageProducts(),
};
