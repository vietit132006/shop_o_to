<!-- Chỉnh sửa thông 1 sản phẩm -->
<!-- name, image, brand_id, category_id, color, price, quantity, status, description -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-image: url('https://c.wallhere.com/photos/5d/af/1680x1050_px_car_Mercedes_AMG_Mercedes_AMG_GT_Mercedes_Benz-538476.jpg!d');
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .register-box {
            max-width: 900px;
            width: 100%;
            justify-content: center;

        }

        .button {
            margin-top: 8px;

        }

        .form-label {
            background: transparent !important;
            color: #fff !important;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>

    <div class="register-box ">
        <div class="p-3 mb-2 bg-info text-bg-dark  bg-black bg-success p-2 bg-opacity-10 rounded-2">
            <h2 class="d-flex justify-content-center "><?= $isCreate ? 'Tạo sản phẩm' : 'Cập nhật sản phẩm' ?></h2>
            <form action="<?= $isCreate ? 'act=create-product' : '?act=save-product' ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($product['id'] ?? '') ?>">
                <div class="mb-3 ">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input name="name" class="form-control" id="name" placeholder="Sản phẩm" value="<?= htmlspecialchars($product['name'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Tình trạng</label>
                    <select class="form-select" name="status" id="status" required>
                        <option value="1" <?= (isset($product['status']) && $product['status'] == 1) ? 'selected' : '' ?>>Mới</option>
                        <option value="2" <?= (isset($product['status']) && $product['status'] == 2) ? 'selected' : '' ?>>Cũ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Ảnh</label>
                    <input type="file" class="form-control" id="file" name="image" required>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Thương hiệu</label>
                    <select name="brand_id" class="input-group mb-3 form-control" id="brand" required>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?= $brand['id'] ?>" <?= (isset($product['brand_id']) && $product['brand_id'] == $brand['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($brand['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Màu xe</label>
                    <select name="color_id" class="input-group mb-3 form-control" id="color" required>
                        <?php foreach ($colors as $color): ?>
                            <option value="<?= $color['id'] ?>" <?= (isset($product['color_id']) && $product['color_id'] == $color['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($color['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Giá tiền</label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="VNĐ" value="<?= htmlspecialchars($product['price'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input name="quantity" type="number" id="quantity" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Số lượng" required value="<?= htmlspecialchars($product['quantity'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Miêu tả sản phẩm</label>
                    <input type="text" id="description" name="description" class="form-control" placeholder="Miêu tả" required value="<?= htmlspecialchars($product['description'] ?? '') ?>">
                </div>
                <div class="button mb-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"><?= $isCreate ? 'Tạo sản phẩm' : 'Lưu sản phẩm' ?></button>
                        <?php if (!$isCreate): ?>
                            <a class="btn btn-primary" href="?act=delete-product&id=<?= $product['id'] ?>">Xóa sản phẩm</a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>