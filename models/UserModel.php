<?php
class UserModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Đăng nhập người dùng
    public function login($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :username OR phone = :username LIMIT 1");
        $stmt->execute([':username' => $username]);
        // Fetch user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && isset($user['password']) && $password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    // Đăng xuất
    public function logout()
    {
        session_unset();
        session_destroy();
    }

    // Đăng ký người dùng
    public function signUp($name, $email, $phone, $address, $password)
    {
        // Kiểm tra xem người dùng đã tồn tại chưa
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email OR phone = :phone LIMIT 1");
        $stmt->execute([':email' => $email, ':phone' => $phone]);
        if ($stmt->rowCount() > 0) {
            return false; // Người dùng đã tồn tại
        }

        // Nếu chưa tồn tại, tiến hành đăng ký
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, phone, address, password) VALUES (:name, :email, :phone, :address, :password)");
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':password' => $password
        ]);
    }
}
