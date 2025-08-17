<?php
class UserModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Login method
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

    // Logout method
    public function logout()
    {
        session_unset();
        session_destroy();
    }

    // Check if user is logged in
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
}
