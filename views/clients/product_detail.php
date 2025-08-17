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
            <a class="navbar-brand" href="<?= BASE_URL ?>">Car Auto</a>
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
    <div class="container-fluid pt-4 vh-100 vw-100 text-white" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.78));">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5  ">
                <p class="fw-bold fs-1" style="color: rgb(155, 155, 155)"><?= $product['name'] ?></p>
                <p class="fs-6 fst-italic">- <?= $product['description'] ?> -</p>
                <p class="fs-5 fw-normal">Trạng thái: <?= $product['status'] ? 'Còn hàng' : 'Hết hàng' ?></p>
                <p class="fs-5 fw-normal">Màu sắc: <?= $product['color_name'] ?></p>
                <p class="fs-5 fw-normal">Thương hiệu: <?= $product['brand_name'] ?></p>
                <p class="fs-5 fw-normal">Số lượng: <?= $product['quantity'] ?></p>
                <p class="fst-italic fw-bold fs-5 text-danger">Giá: <?= number_format($product['price'], 0, ',', '.') ?> VNĐ</p>

                <p class="fs-6 fst-italic">- <?= $product['brand_description'] ?> -</p>

                <div class="d-flex align-items-center mt-3 gap-3">
                    <button type="button" class="btn btn-secondary fs-6">Đăng Ký Lái Thử</button>
                    <a href="#" class=" btn-outline-danger btn-sm"><i class="fa-regular fa-heart"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 text-center">
                <img class="img-fluid mt-80" src="<?= $product['image'] ?>" alt="">
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright © Lexus 2025 <br>Thông số kỹ thuật có thể thay đổi tùy theo thị trường.
            Vui lòng liên hệ đại lý gần nhất để biết thêm chi tiết.</p>
    </footer>
</body>

</html>