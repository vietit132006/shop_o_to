<?php

class AuthController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if (!empty($username) && !empty($password)) {
            $loginSuccess = $this->userModel->login($username, $password);
            if ($loginSuccess) {
                header("Location: ?act=/");
                exit;
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu.";
            }
        }
        $title = "Đăng nhập";
        $view = "auth/login";
        require_once PATH_VIEW_MAIN;
    }

    public function logout()
    {
        session_destroy();
        header("Location: ?act=/");
        exit;
    }

    public function signUp()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        if (!empty($name) && !empty($email) && !empty($phone) && !empty($address) && !empty($password) && $password === $confirmPassword) {
            $signUpSuccess = $this->userModel->signUp($name, $email, $phone, $address, $password);
            if ($signUpSuccess) {
                $this->userModel->login($email ?? $phone ?? '', $password);
                header("Location: ?act=/");
                exit;
            } else {
                $error = "Email hoặc số điện thoại đã được sử dụng.";
            }
        }

        $title = "Đăng ký";
        $view = "auth/sign_up";
        require_once PATH_VIEW_MAIN;
    }
}
