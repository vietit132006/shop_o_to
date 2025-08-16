<?php

class ClientController
{
    public $brandModel;
    public $colorModel;
    public $productModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
        $this->colorModel = new ColorModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $keyword = $_GET['keyword'] ?? ''; // Tên sản phẩm
        $sort = $_GET['sort'] ?? '';       // ASC / DESC / ''
        $status = $_GET['status'] ?? '';   // 1, 2 hoặc ''
        $brandIds = $_GET['brand_id'] ?? []; // Mảng brand_id
        $colorIds = $_GET['color_id'] ?? []; // Mảng color_id

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

        $title = "Chi tiết sản phẩm";
        $view = "clients/product_detail";
        require_once PATH_VIEW_MAIN;
    }
}
