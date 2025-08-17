<?php
$user_id = $_SESSION['user_id'] ?? null;
?>


<div>
  <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-car"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#main-content">Sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Xe ưa thích</a>
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

  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://hondaotokuongngan.com.vn/Uploads/images/banner/Cover%20web%20city(1).png" class="d-block w-100 vh-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://hondaotokuongngan.com.vn/Uploads/images/banner/Cover%20web(1).jpg" class="d-block w-100 vh-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://hondaotokuongngan.com.vn/Uploads/images/banner/Cover(1).png" class="d-block w-100 vh-100" alt="...">
      </div>
    </div>
  </div>
  <div class="container-fluid p-3" id="main-content">
    <div class="row">
      <div class="col-md-2 col-lg-3">
        <h5>Bộ lọc sản phẩm</h5>
        <form method="GET" action="#main-content" id="filter-form">
          <div class="filter">
            <div class="mb-3">
              <label class="form-label">Tên sản phẩm</label>
              <input name="keyword" type="text" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Nhập tên sản phẩm" aria-describedby="button-addon2" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
            </div>
            <div class="mb-3">
              <label for="gia" class="form-label">Sắp xếp giá</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sort" id="default" value='' <?= (!isset($_GET['sort']) || $_GET['sort'] == '') ? 'checked' : '' ?>>
                <label class="form-check-label" for="default">
                  Mặc định
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sort" id="desc" value='DESC' <?= (isset($_GET['sort']) && $_GET['sort'] == 'DESC') ? 'checked' : '' ?>>
                <label class="form-check-label" for="desc">
                  Giảm dần
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sort" id="asc" value='ASC' <?= (isset($_GET['sort']) && $_GET['sort'] == 'ASC') ? 'checked' : '' ?>>
                <label class="form-check-label" for="asc">
                  Tăng dần
                </label>
              </div>
            </div>

            <div class="mb-3">
              <label for="status" class="form-label">Tình trạng</label>
              <select class="form-select" name="status" id="status">
                <option value="">Tất cả</option>
                <option value="1" <?= (isset($_GET['status']) && $_GET['status'] == 1) ? 'selected' : '' ?>>Mới</option>
                <option value="2" <?= (isset($_GET['status']) && $_GET['status'] == 2) ? 'selected' : '' ?>>Cũ</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="brand" class="form-label">Thương hiệu</label>
              <?php foreach ($brands as $brand): ?>
                <div class="form-check">
                  <input name="brand_id[]" class="form-check-input" type="checkbox" value="<?= $brand['id'] ?>" id="brand<?= $brand['id'] ?>"
                    <?= (isset($_GET['brand_id']) && in_array($brand['id'], $_GET['brand_id'])) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="brand<?= $brand['id'] ?>">
                    <?= $brand['name'] ?>
                  </label>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="mb-3">
              <label for="color" class="form-label">Màu sắc</label>
              <?php foreach ($colors as $color): ?>
                <div class="form-check">
                  <input name="color_id[]" class="form-check-input" type="checkbox" value="<?= $color['id'] ?>" id="color<?= $color['id'] ?>"
                    <?= (isset($_GET['color_id']) && in_array($color['id'], $_GET['color_id'])) ? 'checked' : '' ?>>
                  <label class="form-check-label" for="color<?= $color['id'] ?>">
                    <?= $color['name'] ?>
                  </label>
                </div>
              <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
          </div>
        </form>

      </div>

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
            <h4 class="text-center mt-3">Không có sản phẩm phù hợp</h4>
          <?php endif; ?>
        </div>
      </div>

    </div>
    <footer>

    </footer>
  </div>