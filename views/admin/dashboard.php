<!-- Quản lý danh sách xe của showroom -->
<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('https://images.pexels.com/photos/2054144/pexels-photo-2054144.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
<div>
    <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary bg-success p-2 text-dark bg-opacity-75">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-car"></i></a>
            <div class="d-flex gap-2">
                <?php if (isset($_SESSION['name'])): ?>
                    <span class="navbar-text text-secondary">
                        Xin chào, <?= htmlspecialchars($_SESSION['name']) ?>
                    </span>
                <?php endif; ?>
                <a href="?act=/" class="btn btn-secondary"><i class="fa-solid fa-shop mx-2"></i>Shop ô tô</a>
                <a href="?act=logout" class="btn btn-outline-secondary ms-2"><i class="fa-solid fa-arrow-right-from-bracket mx-2"></i> Đăng xuất</a>

            </div>
    </nav>

    <div class='d-flex flex-column align-items-center '>
        <h4 class="text-center mb-3 mt-3 fs-2">Danh sách sản phẩm</h4>
        <div class="d-flex justify-content-between w-100 mb-3">
            <a href="?act=add-product" class="btn btn-success"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>

        </div>
        <table class="table table-dark table-hover table-bordered align-middle rounded-2 table-responsive overflow-hidden" style="max-width:1200px">

            <thead>
                <tr>
                    <th scope="col" style="width: 80px;">ID</th>
                    <th scope="col" class="w-10 text-center" style="width: 100px;">Hình ảnh</th>
                    <th scope="col" class="flex-grow-1">Sản phẩm</th>
                    <th scope="col" class="w-10 text-center" style="width: 80px;">Cài đặt</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <th scope="row"><?= $product['id'] ?></th>
                        <td class='text-center'><img class="rounded-2 img-fluid" src="<?= $product['image'] ?>" alt="" width="80" height="60"></td>
                        <td>
                            <div>
                                <h5><?= $product['name'] ?></h5>
                                <span>Giá: <?= number_format($product['price'], 0, ',', '.') ?> VNĐ</span>
                            </div>
                        </td>
                        <td class="w-10 text-center"><span><a href="?act=manage-product&id=<?= $product['id'] ?>" type="button" class="btn btn-outline-info"><i class="fa-solid fa-gear"></i></a></span></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>