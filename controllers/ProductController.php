<?php

class ProductController
{
    public function index()
    {
        //lấy id
        $id = $_GET['id'];
        //lấy sản phẩm theo danh mục id
        $products = (new Product)->listProductInCategory($id);

        //Lấy tên danh mục
        $title = $products[0]['cate_name'] ?? '';

        $categories = (new Category)->all();
        return view(
            'clients.category.category',
            compact('products', 'categories', 'title')
        );
    }   
    // Chi tiết sản phẩm
    public function show(){
        $id = $_GET['id']; //id san pham
        $product = (new Product)->find($id);

        //Thêm Comment
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $data = $_POST;
            //thêm product_id và User_id
            $data['product_id'] = $id;
            $data['user_id'] = $_SESSION['user']['id'];
            (new Comment)->create($data); 
        }
        $title = $product['name'];
        $categories = (new Category)->all();
        // Danh sách sản phẩm liên quan
        $productReleads = (new Product)->listProductRelead($product['category_id'],$id);
        // Lưu thông tin URI vào session
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        $_SESSION['totalQuantity'] = (new CartController) -> totalSumQuantity();
       
        //lấy danh sách comments 
        $comments =  (new Comment) -> listCommentInProductClient($id);
        return view(
            'clients.category.detail',
            compact('product', 'categories', 'title','productReleads','comments')
        );
    }
    // tìm kiếm
    
}
