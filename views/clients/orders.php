<?php
?>

<div>
    <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary bg-success p-2 text-dark bg-opacity-75">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-car"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="?act=/">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?act=favourite">Xe ưa thích</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Xe đã đặt</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex gap-2">
                <?php if (isset($_SESSION['name'])): ?>
                    <span class="navbar-text text-secondary">
                        Xin chào, <?= htmlspecialchars($_SESSION['name']) ?>
                    </span>
                <?php endif; ?>
                <a href="<?= (isset($_SESSION['user_id'])) ? "?act=dashboard" : "?act=login" ?>" class="btn btn-secondary"><i class="fa-solid fa-shop mx-2"></i>Cửa hàng của bạn</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="?act=logout" class="btn btn-outline-secondary ms-2"><i class="fa-solid fa-arrow-right-from-bracket mx-2"></i> Đăng xuất</a>
                <?php else: ?>
                    <a href="?act=login" class="btn btn-outline-secondary me-2">
                        <i class="fa-solid fa-user mx-2"></i> Đăng nhập
                    </a>
                <?php endif; ?>

            </div>
    </nav>

    <?php if (!empty($orders)): ?>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Tổng tiền (lưu trong đơn)</th>
                    <th>Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>
                            <img src="<?= $order['image'] ?>"
                                alt="<?= $order['name'] ?>"
                                width="120">
                        </td>
                        <td><?= htmlspecialchars($order['name']) ?></td>
                        <td><?= number_format($order['product_price'], 0, ',', '.') ?> VNĐ</td>
                        <td> VNĐ</td>

                        <td><?= $order['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Bạn chưa có đơn hàng nào.</p>
    <?php endif; ?>
</div>