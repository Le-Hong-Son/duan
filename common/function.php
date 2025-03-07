<?php

/**
 * Hàm view để render view từ đường dẫn được chỉ định
 * $path_view: đường dẫn tới file view trong thư mục views
 * $data: là dữ liệu được gửi từ controller vào view
 */
function view($path_view, $data = [])
{
    extract($data);

    $path_view = str_replace(".", "/", $path_view);

    include_once ROOT_DIR . "views/$path_view.php";

}

//Hàm dd dùng để debug
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
// hàm session_flash sẽ hủy session ngay lập tức
function session_flash($key){
    $message = $_SESSION[$key] ?? '';
    unset($_SESSION[$key]);
    return $message;
}
// chuyển dổi trạng thái đơn hàng
function getOrderStatus($status){
    $status_detail = [
        1 => 'Chờ xử lý',
        2 => 'Đang xử lý',
        3 => 'Hoàn thành',
        4 => 'Đã hủy'
    ];
    return $status_detail[$status];
}
