<?php
    class AuthController {
        // dang ki 
        public function register(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $data = $_POST;
                // mã hóa mật khẩu
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                
                // đưa vào data
                $data['password'] = $password;
                // insert vào database
                (new User)->create($data);
                // Thông báo
                $_SESSION['message'] = 'Đăng kí thành công';
                header("location: " . ROOT_URL . "?ctl=login");
                die;

            }
            return view('clients.users.register');
        }
        // dang nhap

        public function login(){
            // Kiểm tra người dùng đã đăng nhập hay chưa
            if(isset($_SESSION['user'])){
                header("location: " . ROOT_URL);
                die;
            }
            
            $error = null;
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = (new User)->findUserOfEmail($email);
                //kiểm tra mật khẩu
                if($user){
                    if(password_verify($password, $user['password'])){
                        //dang nhap thanh cong
                        $_SESSION['user'] = $user;
                        //nếu role = admin , vào admin ngược lại vào  trang chủ
                        if($user['role'] == 'admin'){
                            header("Location: " . ADMIN_URL);
                            die;
                        }
                        header("Location: " . ROOT_URL);
                        die;
                        
                    } else {
                        $error = "Email hoặc mật khẩu không chính xác";
                    }
                } else {
                    $error = "Email hoặc mật khẩu không chính xác";
                }
            }
            $message = session_flash('message');
            return view('clients.users.login', compact('message','error'));
        }
        // dang xuat
        public function logout(){
            unset($_SESSION['user']);
            header("location: " . ROOT_URL . '?ctl=login');
            die;
        }

        public function index(){
            $users = (new User)->all();
            return view('admin.users.list',compact('users'));
        }
        public function updateActive (){
            $data = $_POST;
            $data['active'] =$data['active'] ? 0 : 1;
            (new User)->updateActive($data['id'],$data['active']);
            return header('location: ' . ADMIN_URL . '?ctl=listuser');
        }

    }

?>