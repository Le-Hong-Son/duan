<?php
class OrderController {
    public function index(){
        $orders = (new Order)->all();
        return view("admin.orders.list",compact('orders'));  
    }

    public function showOrder(){
        $id = $_GET['id'];

        // Thay đổi trạng thái 
        $message = "";
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $status =  $_POST['status'];
            (new Order)->updateStatus($id, $status);
             $message = "Cập nhập trạng thái thành công";
        }
        $order = (new Order)->find($id);
        // dd($order);
        $order_details =(new Order )->listOrderDetail($id) ;
        $status = (new Order)->status_detail;

        return view("admin.orders.detail",compact('order','order_details','status','message'));
    }
    // Hiển thị danh sách hóa đơn của user theo id
    public function showOrderUser(){
        $user_id=$_SESSION['user']['id'];

        $orders = (new Order)->findOrderUser($user_id);

        $categories = (new Category)->all();
        
        $user = $_SESSION['user'];
        return view(
            'clients.users.list-order',
            compact('orders','categories','user'));
    }

    public function detailOrderUser(){
        $id = $_GET['id'];
        // Thay đổi trạng thái 
        $message = "";
            if($_SERVER['REQUEST_METHOD'] === "POST"){
            (new Order)->updateStatus($id, 4);
             $message = "Cập nhập trạng thái thành công";
        }
        
        $order = (new Order)->find($id);
        // dd($order);
        $order_details =(new Order )->listOrderDetail($id) ;
        $status = (new Order)->status_detail;

        return view("clients.users.detail-order",compact('order','order_details','status','message'));
    }
}

?>