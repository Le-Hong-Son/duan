<?php


class CommentController {
    public function index(){
        $products = (new Comment)->listProductHasComments();
        return view('admin.comments.product-comment', compact('products'));
    }

    // Hiển thị comment theo sản phẩm
    public function list(){
        // Lấy id sản phẩm 
        if (!isset($_GET['id'])) {
            die('ID sản phẩm không được cung cấp!');
        }
        $id = $_GET['id'];

        // Lấy danh sách bình luận theo sản phẩm
        $comments = (new Comment)->listCommentInProduct($id);

        // Lưu URI hiện tại vào session
        $_SESSION['uri_comment'] = $_SERVER['REQUEST_URI']; 

        // Trả về view danh sách bình luận
        return view('admin.comments.list', compact('comments'));
    }

    // Hiện, ẩn bình luận 
    public function updateActive(){
        if (!isset($_GET['id']) || !isset($_GET['value'])) {
            die('Dữ liệu không hợp lệ!');
        }

        $id = $_GET['id'];
        $value = $_GET['value'] ? 0 : 1;
        (new Comment)->updateActive($id, $value);

        // Chuyển hướng về URI đã lưu trong session
        return header("Location: " . ($_SESSION['uri_comment'] ?? '/'));
    }
}
?>
