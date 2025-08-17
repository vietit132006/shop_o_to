<!-- Hiện thị danh sách các xe mà người dùng ấn thích -->
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
                        <a class="nav-link " aria-current="page" href="?act=/">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Xe ưa thích</a>
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

    <div class="col-md-9 col-lg-9">
        <div class="container">
            <?php if (!empty($products)): ?>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($products as $product):
                        $isFavorius = $favoriusModel->isFavorite($product['id']);
                    ?>
                        <div class="col" id="product-<?= $product['id'] ?>">
                            <div class="card h-100 shadow-sm">
                                <img src="<?= $product['image'] ?>" class="card-img-top img-fluid" alt="<?= $product['name'] ?>" style="height:200px; object-fit:cover;cursor:pointer;"
                                    onclick="window.location.href='?act=product-detail&id=<?= $product['id'] ?>'">
                                <div class="card-body">


                                    <div class='mb-3' style="cursor:pointer;" onclick="window.location.href='?act=product-detail&id=<?= $product['id'] ?>'">
                                        <span class="badge rounded-pill text-bg-primary"><?= ($product['quantity'] > 0) ? "Còn hàng" : "Đã hết hàng"; ?></span>
                                        <span class="badge rounded-pill text-bg-danger"><?= ($product['status'] == 1) ? "New" : "Old"; ?></span>
                                        <h5 class="card-title mt-2"><?= $product['name'] ?></h5>
                                        <p class="card-text text-danger fw-bold"><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-primary btn-sm ">Liên hệ ngay</a>
                                        <a href="?act=toggle-favorite&product_id=<?= $product['id'] ?>&redirect=<?= urlencode($_SERVER['REQUEST_URI']) ?>#product-<?= $product['id'] ?>" class=" btn-outline-danger btn-sm">
                                            <i class="<?= ($isFavorius) ? "fa-solid" : "fa-regular" ?>  fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            <?php else: ?>
                <h4 class="text-center mt-3">Không có sản phẩm ưa thích</h4>
            <?php endif; ?>
        </div>
    </div>
</div>