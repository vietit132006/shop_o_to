<?php

class ClientController
{
    public $brandModel;
    public $colorModel;
    public $productModel;
    public $favoriusModel;
    public $orderModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
        $this->colorModel = new ColorModel();
        $this->productModel = new ProductModel();
        $this->favoriusModel = new FavouritesModel();
        $this->orderModel   = new OrderModel();
    }

    public function index()
    {
        $keyword = $_GET['keyword'] ?? ''; // Tên sản phẩm
        $sort = $_GET['sort'] ?? '';       // ASC / DESC / ''
        $status = $_GET['status'] ?? '';   // 1, 2 hoặc ''
        $brandIds = $_GET['brand_id'] ?? []; // Mảng brand_id
        $colorIds = $_GET['color_id'] ?? []; // Mảng color_id


        $favoriusModel = $this->favoriusModel;
        $brands = $this->brandModel->getAll();
        $colors = $this->colorModel->getAll();
        $products = $this->productModel->getProducts($keyword, $sort, $status, $brandIds, $colorIds);
        $title = "Trang chủ";
        $view = "clients/homepage";
        require_once PATH_VIEW_MAIN;
    }

    public function detail()
    {
        $id = $_GET['id'] ?? null; // Lấy id từ query string
        if (!$id) {
            header("Location: ?act=/");
            exit;
        }

        $product = $this->productModel->getProductById($id);
        if (!$product) {
            header("Location: ?act=/");
            exit;
        }

        $isFavorius = $this->favoriusModel->isFavorite($id);

        $title = "Chi tiết sản phẩm";
        $view = "clients/product_detail";
        require_once PATH_VIEW_MAIN;
    }

    public function toggleFavorite()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login");
            exit;
        }
        $product_id = $_GET['product_id'];
        $this->favoriusModel->toggleFavorite($product_id);
        $redirect = $_GET['redirect'] ?? '?act=/';
        header("Location: $redirect");
        exit;
    }

    public function favourite()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login");
            exit;
        }
        $userId = $_SESSION['user_id'];
        $products = $this->favoriusModel->getFavoritesByUserId($userId);
        $favoriusModel = $this->favoriusModel;
        $title = "Sản phẩm yêu thích";
        $view = "clients/favourite";
        require_once PATH_VIEW_MAIN;
    }
    public function order()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login");
            exit;
        }
        $userId = $_SESSION['user_id'];
        $orders = $this->orderModel->getOrdersByUserId($userId);
        $title = "Đơn hàng của bạn";
        $view = "clients/order";
        require_once PATH_VIEW_MAIN;
    }
    public function dashboard()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ?act=login");
            exit;
        }
        $userId = $_SESSION['user_id'];
        $orders = $this->orderModel->getOrdersByUserId($userId);
        $title = "Dashboard";
        $view = "clients/dashboard";
        require_once PATH_VIEW_MAIN;
    }
}
