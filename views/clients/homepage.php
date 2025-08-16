<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="views/clients/homepage.css">
  <title>Balatto - Vehicle</title>
  <style>
    .honda {
      display: flex;
      gap: 20px;
      margin-top: 30px;
      justify-content: center;
    }
  </style>
</head>

<body>
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
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://hondaotokuongngan.com.vn/Uploads/images/banner/Cover%20web%20city(1).png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://hondaotokuongngan.com.vn/Uploads/images/banner/Cover%20web(1).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://hondaotokuongngan.com.vn/Uploads/images/banner/Cover(1).png" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
  <!-- class='d-flex flex-row column-gap-3 p-3' -->
  <div class="contents1">
    <div class="loc_SP">
      <form class='d-flex flex-column'>
        <h4>Bộ lọc sản phẩm</h4>
        <label for="ten">Tên sản phẩm</label>
        <input type="text" placeholder="Nhập tên...">

        <label for="gia">Giá khoảng</label>
        <select name="gia" id="">
          <option value="">Giá</option>
          <option value="">Khoảng từ 300.000.000 đến 500.000.000</option>
          <option value="">Khoảng từ 500.000.000 đến 900.000.000</option>
          <option value="">Khoảng từ 900.000.000 đến 1.200.000.000</option>
        </select>

        <label for="brand" class="form-label">Thương hiệu</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="checkDefault">
          <label class="form-check-label" for="checkDefault">
            Toyota
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="checkChecked" checked>
          <label class="form-check-label" for="checkChecked">
            Vinfast
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="checkChecked" checked>
          <label class="form-check-label" for="checkChecked">
            Lexus
          </label>
        </div>
        <label for="color">Màu sắc</label>
        <select name="color" id="">
          <option value="">Màu sắc</option>
          <option value="">Đen</option>
          <option value="">Trắng</option>
          <option value="">Đỏ</option>
          <option value="">Xám</option>
          <option value="">Vàng</option>
          <option value="">Bạc</option>
          <option value="">Xanh</option>
        </select>
        <label for="Status">Tình trạng</label>
        <select name="" id="">
          <option value="">Mới</option>
          <option value="">Cũ</option>
        </select>
      </form>
    </div>

    <div>
      <h2>Sản phẩm</h2>
      <div class="d-flex flex-grow-1 flex-wrap gap-2 justify-content-center">
        <?php
        $arr = range(1, 100);
        ?>
        <?php foreach ($arr as $value): ?>
          <div class="card shadow-sm" style="width: 18rem;">
            <img src="https://hondaotokuongngan.com.vn/Uploads/images/san-pham/avatar(1).png" class="card-img-top" alt="...">
            <div class="card-body">
              <span class="badge rounded-pill text-bg-primary">Còn hàng</span>
              <span class="badge rounded-pill text-bg-danger">Mới</span>
              <h5 class="card-title">HONDA CIVIC TYPE R</h5>
              <p class="card-text">GIÁ: 2.399.000.000 VNĐ</p>
              <div class="d-flex gap-2">
                <a href="#" class="btn btn-primary flex-grow-1">Liên hệ ngay</a>
                <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-heart"></i></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
    <footer>

    </footer>

</body>

</html>