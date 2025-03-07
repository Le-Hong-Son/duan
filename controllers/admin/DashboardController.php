<?php
    class DashboardController {
        public function __construct(){
            $user = $_SESSION['user']??[];
            if(!$user || $user['role'] != 'admin'){
                return header('location: '.ROOT_URL);
            }
        }
    public function index(){
        return view('admin.dashboard');
    }
    public function logout() {
        // Bắt đầu session
        session_start();

        // Hủy session
        session_unset(); // Xóa tất cả các biến trong session
        session_destroy(); // Hủy toàn bộ session

        // Xóa cookie nếu có sử dụng để lưu đăng nhập
        if (isset($_COOKIE['admin_token'])) {
            setcookie('admin_token', '', time() - 3600, '/'); // Xóa cookie
        }
        // Chuyển hướng về trang đăng nhập
        header("Location: /duan1/");
        exit();
    }
    }

?>