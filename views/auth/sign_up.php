<style>
   body {
      margin: 0;
      padding: 0;
      background-image: url('https://giaxe60s.com/images/danhmuc/civiv-type-r.jpeg');
      /* link ảnh */
      background-size: cover;
      /* Ảnh phủ kín */
      background-repeat: no-repeat;
      /* Không lặp */
      background-position: center;
      /* Canh giữa */
   }
</style>
<form method="post" class="w-100 h-100 needs-validation">
   <div class="d-flex justify-content-center align-items-center vh-100 vw-100">
      <div class="d-flex flex-column p-3 text-light shadow-lg bg-dark bg-opacity-50 rounded gap-3 mx-auto w-25">


         <h2>Đăng ký</h2>
         <div>
            <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
            <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Họ tên">
         </div>
         <div>
            <label for="exampleFormControlInput1" class="form-label">Email/Username</label>
            <input name='email' type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
         </div>
         <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>

         <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">+84</span>
            <input name="phone" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
         </div>
         <div>
            <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
            <input type="name" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Thành phố">
         </div>
         <div>
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name='password' id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Mật khẩu">
         </div>
         <div>
            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
            <input type="password" name='confirm_password' id="inputPassword5" class="form-control" aria-describedby="Xác nhận mật khẩu" placeholder="Nhập lại xác nhận mật khẩu">
         </div>
         <div class="button">
            <div class="d-grid gap-2">
               <button class="btn btn-secondary" type="submit">Đăng ký</button>
               <a href="?act=login">Đã có tài khoản? Đăng nhập</a>
            </div>
         </div>
      </div>
   </div>

</form>