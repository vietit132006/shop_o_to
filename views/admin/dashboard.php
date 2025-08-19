<!-- Quản lý danh sách xe của showroom -->
<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('https://images.pexels.com/photos/2054144/pexels-photo-2054144.jpeg');
        /* link ảnh */
        background-size: cover;
        /* Ảnh phủ kín */
        background-repeat: no-repeat;
        /* Không lặp */

        /* Canh giữa */
    }
</style>
<div class='d-flex flex-column align-items-center '>
    <h4 class="text-center mb-3 mt-3 fs-2">Danh sách sản phẩm</h4>
    <table class="table table-dark table-hover table-bordered align-middle rounded-2 table-responsive overflow-hidden" style="max-width:1200px">

        <thead>
            <tr>
                <th scope="col" style="width: 80px;">#</th>
                <th scope="col" class="w-10 text-center" style="width: 100px;">Hình ảnh</th>
                <th scope="col" class="flex-grow-1">Sản phẩm</th>
                <th scope="col" class="w-10 text-center" style="width: 80px;">Cài đặt</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td class='text-center'><img class="rounded-2" src="https://www.lexus.com.vn/content/dam/lexus-v3-blueprint/models/sedan/es/es-300h/my22/navigation/lexus-es300h.jpg" alt="" width="125" height="40"></td>
                <td>
                    <div>
                        <h5>Xe LUS 20234</h5>
                        <span>Giá: 1.000.000 VNĐ</span>
                    </div>
                </td>
                <td class="w-10 text-center"><span><a href="?act=manage_products" type="button" class="btn btn-outline-info"><i class="fa-solid fa-gear"></i></a></span></td>
            </tr>
        </tbody>
    </table>
</div>