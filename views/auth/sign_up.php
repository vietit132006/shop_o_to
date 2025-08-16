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
      }
      .register-box{
         max-width: 320px;

      }
      .button{
         margin-top: 8px;
         
      }
     
    </style>
</head>
<body>
   
<div class="register-box">
   <div class="p-3 mb-2 bg-info text-dark">
    <h2>Đăng ký</h2>
    <form>
        <div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
         <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Họ tên">
</div>
<div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Email/Username</label>
         <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
         <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>

<div class="input-group mb-3">
         <span class="input-group-text" id="basic-addon1">+84</span>
         <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="mb-3">
         <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
         <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Thành phố">
</div>
<div>
         <label for="inputPassword5" class="form-label">Password</label>
         <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Mật khẩu">
</div>
<div>
         <label for="inputPassword5" class="form-label">Confirm Password</label>
         <input type="password" id="inputPassword5" class="form-control" aria-describedby="Xác nhận mật khẩu" placeholder="Nhập lại xác nhận mật khẩu">
</div> 
         <label for="exampleFormControlInput1" class="form-label">Role</label>

<div>
         <select class="form-select" aria-label="Default select example">
         <option selected>-- Chọn role --</option>
         <option value="admin">Admin</option>
         <option value="client">Client</option>
</select>
</div>
<div class="button">
         <div class="d-grid gap-2">
         <button class="btn btn-primary" type="submit">Đăng ký</button>
         <a href="#">Đã có tài khoản? Đăng nhập</a>
</div>  
</div>
             
        
    </form>
</div>
</div>
</body>
</html>
