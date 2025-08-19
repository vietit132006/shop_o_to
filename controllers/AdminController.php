<?php

class AdminController
{
    public function index()
    {
        // Logic for admin dashboard

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $productModel = new ProductModel();

        $products = $productModel->getProductByUserId($_SESSION['user_id']);
        $title = "Quản lý sản phẩm";
        $view = "admin/dashboard";
        require_once PATH_VIEW_MAIN;
    }

    public function manageProducts()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: ?act=dashboard");
            exit;
        }
        $productModel = new ProductModel();
        $colorModel = new ColorModel();
        $brandModel = new BrandModel();

        $isCreate = false;
        $brands = $brandModel->getAll();
        $colors = $colorModel->getAll();
        $product = $productModel->getProductById($id);
        if (!$product) {
            header("Location: ?act=dashboard");
            exit;
        }

        $title = "Thay đổi sản phẩm";
        $view = "admin/manage_products";
        require_once PATH_VIEW_MAIN;
    }

    public function deleteProduct()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: ?act=dashboard");
            exit;
        }
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);
        if (!$product) {
            header("Location: ?act=dashboard");
            exit;
        }

        $productModel->deleteProductById($id);
        header("Location: ?act=dashboard");
        exit;
    }

    public function saveProduct()
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            header("Location: ?act=dashboard");
            exit;
        }

        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);
        if (!$product) {
            header("Location: ?act=dashboard");
            exit;
        }



        $name = $_POST['name'] ?? '';
        $status = $_POST['status'] ?? '';
        $brand_id = $_POST['brand_id'] ?? '';
        $color_id = $_POST['color_id'] ?? '';
        $price = $_POST['price'] ?? 0;
        $quantity = $_POST['quantity'] ?? 0;
        $description = $_POST['description'] ?? '';

        //  Xử lý ảnh của cập nhật sản phẩm
        if (isset($_FILES['image'])  && $_FILES['image']['error'] == 0) {
            $imagePath = uploadFile($_FILES['image'], 'uploads/');
            if (!$imagePath) {
                $imagePath = $product['image']; // Nếu upload lỗi thì giữ ảnh cũ
            }
        } else {
            $imagePath = $product['image']; // Giữ ảnh cũ nếu không upload mới
        }

        // Update product
        $productModel->updateProduct($id, $name, $status, $brand_id, $color_id, $price, $quantity, $description, $imagePath);

        header("Location: ?act=dashboard");
        exit;
    }

    public function addProduct()
    {
        $brandModel = new BrandModel();
        $colorModel = new ColorModel();

        $brands = $brandModel->getAll();
        $colors = $colorModel->getAll();
        $isCreate = true;
        $title = "Thêm sản phẩm mới";
        $view = "admin/manage_products";
        require_once PATH_VIEW_MAIN;
    }

    public function createProduct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $productModel = new ProductModel();

        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'] ?? '';
        $status = $_POST['status'] ?? '';
        $brand_id = $_POST['brand_id'] ?? '';
        $color_id = $_POST['color_id'] ?? '';
        $price = $_POST['price'] ?? 0;
        $quantity = $_POST['quantity'] ?? 0;
        $description = $_POST['description'] ?? '';

        // Xử lý ảnh của tạo sản phẩm
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $imagePath = uploadFile($_FILES['image'], 'uploads/');
            if (!$imagePath) {
                $imagePath = 'uploads/default.png'; // Nếu upload lỗi thì dùng ảnh mặc định
            }
        } else {
            $imagePath = 'uploads/default.png'; // Nếu không upload thì dùng ảnh mặc định
        }

        // Create product
        $productModel->createProduct($name, $status, $brand_id, $color_id, $price, $quantity, $description, $imagePath, $user_id);

        header("Location: ?act=dashboard");
        exit;
    }
}
