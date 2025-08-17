<form method="post" action="?act=login" class="w-100 h-100 needs-validation">
   <div class="d-flex justify-content-center align-items-center vh-100 vw-100" style="background-color: #1a1a1aff;">
      <div class="d-flex flex-column p-3 text-light shadow-lg bg-dark rounded gap-3 mx-auto w-25">
         <h2>Đăng nhập</h2>
         <div>
            <label for="exampleFormControlInput1" class="form-label">Email/Số điện thoại</label>
            <input name='username' type="text" class="form-control" id="exampleFormControlInput1" aria-describedby="inputGroupPrepend" placeholder="Email/Số điện thoại" required>
         </div>
         <div>
            <label for="inputPassword5" class="form-label">Password</label>
            <input name='password' type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Input password" required>
         </div>
         <div>
            <button class="btn btn-secondary w-100 mb-2" type="submit">Đăng nhập</button>
            <a class="btn btn-outline-secondary w-100" href="?act=sign_up">Đăng ký</a>
         </div>
         <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
               <?= htmlspecialchars($error) ?>
            </div>
         <?php endif; ?>
      </div>
   </div>
</form>