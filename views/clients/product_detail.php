<?php
$user_id = $_SESSION['user_id'] ?? null;
?>
<div>
    <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="?act=/"><i class="fa-solid fa-car"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?act=/">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?act=favourite">Xe ưa thích</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Xe đã đặt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex gap-2">
                <?php if (isset($_SESSION['name'])): ?>
                    <span class="navbar-text text-secondary">
                        Xin chào, <?= htmlspecialchars($_SESSION['name']) ?>
                    </span>
                <?php endif; ?>
                <a href="<?= (isset($_SESSION['username'])) ? "?act=register" : "?act=login" ?>" class="btn btn-secondary"><i class="fa-solid fa-shop mx-2"></i>Cửa hàng của bạn</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="?act=logout" class="btn btn-outline-secondary ms-2"><i class="fa-solid fa-arrow-right-from-bracket mx-2"></i> Đăng xuất</a>
                <?php else: ?>
                    <a href="?act=login" class="btn btn-outline-secondary me-2">
                        <i class="fa-solid fa-user mx-2"></i> Đăng nhập
                    </a>
                <?php endif; ?>

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
                    <a href="?act=toggle-favorite&product_id=<?= $product['id'] ?>&redirect=<?= urlencode($_SERVER['REQUEST_URI']) ?>#product-<?= $product['id'] ?>" class=" btn-outline-danger btn-sm">
                        <i class="<?= ($isFavorius) ? "fa-solid" : "fa-regular" ?>  fa-heart"></i>
                    </a>
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