<div>
  <nav class="navbar sticky-top bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>opkoouuuuu
        </ul>
      </div>
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
  <div class="container-fluid p-3">
    <div class="row">
      <div class="col-md-2 col-lg-3">
        <h5>Bộ lọc sản phẩm</h5>
        <form method="GET" action="" id="filter-form">
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
              <?php foreach ($products as $product): ?>
                <div class="col">
                  <div class="card h-100 shadow-sm" style="cursor:pointer;" onclick="window.location.href='?act=product-detail&id=<?= $product['id'] ?>'">
                    <img src="<?= $product['image'] ?>" class="card-img-top img-fluid" alt="<?= $product['name'] ?>" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                      <span class="badge rounded-pill text-bg-primary"><?= ($product['quantity'] > 0) ? "Còn hàng" : "Đã hết hàng"; ?></span>
                      <span class="badge rounded-pill text-bg-danger"><?= ($product['status'] == 1) ? "New" : "Old"; ?></span>
                      <h5 class="card-title mt-2"><?= $product['name'] ?></h5>
                      <p class="card-text text-danger fw-bold"><?= $product['price'] ?> VNĐ</p>
                      <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-primary btn-sm " onclick="event.stopPropagation();">Liên hệ ngay</a>
                        <a href="#" class=" btn-outline-danger btn-sm" onclick="event.stopPropagation();"><i class="fa-regular fa-heart"></i></a>
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