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
}
