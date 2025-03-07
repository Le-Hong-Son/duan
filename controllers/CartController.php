<?php
class CartController {
    // Thêm vào giỏ hàng
    public function addToCart(){

        // Tạo 1 giỏ hàng
        $carts = $_SESSION['cart'] ?? [];

        // lấy sản phẩm theo id để add vào giỏ
        $id = $_GET['id'];
        $product = (new Product)->find($id);
        if(isset($carts[$id])){
            $carts[$id]['quantity'] += 1;
        }else{
            $carts[$id] = [
                'name' => $product['name'],
                'image' => $product['image'],
                'price' => $product['price'],
                'quantity' => 1,
            ];
        }
        // lưu vào giỏ hàng
        $_SESSION['cart'] = $carts;
        $_SESSION['totalQuantity'] = (new CartController)->totalSumQuantity();
        $url = $_SESSION['URI'];
        return header('Location: ' .$url);
    }
    // Tính tổng số lượng sản phẩm để hiển thị giỏ hàng
    public function totalSumQuantity(){
        $carts = $_SESSION['cart'] ?? [];
        $total =  0;
        foreach($carts as $cart){
            $total += $cart['quantity'];
        }
        return $total;
    }
    public function viewCart(){
        $carts = $_SESSION['cart'] ?? [];
        $sumPrice = (new CartController)->sumPrice();
        $categories = (new Category )->all();
        return view("clients.carts.cart", compact('carts','categories','sumPrice'));
    }
    public function sumPrice(){
        $carts = $_SESSION['cart'] ?? [];
        $total =  0;
        foreach($carts as $cart){
            $total += $cart['quantity'] * $cart['price'];
        }
        return $total;
    }
    // Xóa sản phẩm khỏi giỏ hàng
    public function delete() {

        //lấy id sản phẩm
        $id = $_GET['id'];
        //hủy biến session chứa sản phẩm 
        unset($_SESSION['cart'][$id]);
        //chuyển hướng về giỏ hàng
        $_SESSION['totalQuantity'] = (new CartController)->totalSumQuantity();
        return header("Location: ". ROOT_URL . "?ctl=view-cart");
    }
    //cập nhật giỏ hàng
    public function updateCart(){
        $quantities = $_POST['quantity'];
        // Cập nhật số lượng
        foreach($quantities as $id => $qty){
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
        return header("Location: ". ROOT_URL . "?ctl=view-cart");
    }
    // Hiển thị thông tin thanh toán
    public function viewCheckOut(){
        // Kiểm tra xem người dùng đã đăng nhập chưa, nếu chưa thì vào login
        if(!isset($_SESSION['user'])){
            return header('Location: '.ROOT_URL .'?ctl=login' );
        }
        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];
        $sumPrice = (new CartController)->sumPrice();
        return view("clients.carts.checkout",compact('user','carts','sumPrice'));
    }
    // thanh toán 
    public function checkOut(){
        // lấy thông tin người dùng
        
        $user = [
            'id'=>$_POST['id'],
            'fullname'=>$_POST['fullname'],
            'phone'=>$_POST['phone'],
            'address'=>$_POST['address'],
            'role' => $_SESSION['user']['role'],
            'active' => $_SESSION['user']['active'],
        ];
        $sumPrice = (new CartController)->sumPrice();
        $order = [
            'user_id' =>$_POST['id'],
            'status' => 1,
            'payment_method'=>$_POST['payment_method'],
            'total_price'  => $sumPrice,

        ];

        (new User)->update($user['id'],$user);
        $order_id= (new Order)->create($order);

        $carts = $_SESSION['cart'];
        foreach($carts as $id => $cart){
            $or_detail = [
                'order_id' => $order_id,
                'product_id'=> $id,
                'price'=> $cart['price'],
                'quantity'=> $cart['quantity'],
            ];
            (new Order)->createOrderDetail($or_detail);
        }
        $this->clearCart();// xóa thông tin giỏ hàng
        return header('Location: ' .ROOT_URL . '?ctl=success');
    }
    // Xóa giỏ hàng
    public function clearCart(){
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);
    }
    public function success(){
        return  view("clients.carts.success");
    }
}
?>