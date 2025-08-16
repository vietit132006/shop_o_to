<!-- Xem 1 chi tiết 1 sản phẩm -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/clients/product_detail.css">

    <title>Document</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Car Auto</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">SẢN PHẨM ƯA THÍCH</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container-fluid pt-4 vh-100 vw-100 bg-dark text-white">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-5 px-4">
                <h1><?= $product['name'] ?></h1>
                <h4 class="fw-semibold mb-3"><?= $product['description'] ?></h4>
                <p class="fw-semibold">Giá: <?= $product['price'] ?> VNĐ</p>
                <p class="fw-semibold">Trạng thái: <?= $product['status'] ? 'Còn hàng' : 'Hết hàng' ?></p>
                <p class="fw-semibold">Màu sắc: <?= $product['color_name'] ?></p>
                <p class="fw-semibold">Thương hiệu: <?= $product['brand_name'] ?></p>
                <p class="fw-semibold">Số lượng: <?= $product['quantity'] ?></p>
            </div>
            <div class="col-md-6 col-lg-5 text-center">
                <img class="img-fluid" src="<?= $product['image'] ?>" alt="">
            </div>
        </div>
    </div>
    <div class="content">


        <img src="https://www.lexus.com.vn/content/dam/lexus-v3-blueprint/models/sedan/es/es-300h/my22/navigation/lexus-es300h.jpg" alt="" class="img-fluid">
        <div class="info">
            <div>
                <h6><?= $product['name'] ?></h6>
                <p>Giá xe từ <?= $product['price'] ?> VNĐ</p>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <h6>204 HP</h6>
                    <p>Công suất cực đại</p>
                </div>
                <div>
                    <h6>9.1 sec</h6>
                    <p>Khả năng tăng tốc</p>
                </div>
                <div>
                    <h6>6.8 L/ 100km</h6>
                    <p>Mức tiêu thụ nhiên liệu</p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center mt-3 gap-2">
            <button type="button" class="btn btn-secondary">Đăng Ký Lái Thử</button>
            <button type="button" class="btn btn-secondary">Thêm Vào Mục Yêu Thích</button>
        </div>

    </div>
    <footer>
        <p>Copyright © Lexus 2025 <br>Thông số kỹ thuật có thể thay đổi tùy theo thị trường.
            Vui lòng liên hệ đại lý gần nhất để biết thêm chi tiết.</p>
    </footer>
</body>

</html>