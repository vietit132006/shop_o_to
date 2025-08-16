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
        }

        .register-box {
            max-width: 900px;
            width: 100%;
            justify-content: center;

        }

        .button {
            margin-top: 8px;

        }
    </style>
</head>

<body>

    <div class="register-box">
        <div class="p-3 mb-2 bg-info text-dark">
            <h2 class="d-flex justify-content-center">Chỉnh sửa thông tin sản phẩm</h2>
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Sản phẩm">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Loại</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Loại">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Ảnh</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Thương hiệu</label>
                    <select name="brand" class="input-group mb-3 form-control " id="">
                        <option value="">Thương hiệu</option>
                        <option value="">Toyota</option>
                        <option value="">Vinfast</option>
                        <option value="">Lexus</option>
                        <option value="">Honda</option>
                        <option value="">Mercedes</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Màu xe</label>
                    <select name="brand" class="input-group mb-3 form-control " id="">
                        <option value="">Màu</option>
                        <option value="">Xanh</option>
                        <option value="">Đỏ</option>
                        <option value="">Tím</option>
                        <option value="">Vàng</option>
                        <option value="">Trắng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giá tiền</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="VNĐ">
                </div>
                <div class="mb-3">
                    <label for="inputPassword5" class="form-label">Số lượng</label>
                    <input type="number" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Số lượng">
                </div>

                <div class="d-flex flex-column mb-3">
                    <label for="Status">Tình trạng</label>
                    <select class="form-select" name="" id="">
                        <option value="">Còn hàng</option>
                        <option value="">Hết hàng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Miêu tả sản phẩm</label>
                    <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Miêu tả">
                </div>
                <div class="button mb-3">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Lưu sản phẩm</button>
                        <button class="btn btn-primary" type="submit">Xóa sản phẩm</button>

                    </div>
                </div>


            </form>
        </div>
    </div>

</body>

</html>