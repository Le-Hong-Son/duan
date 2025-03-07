<?php

class HomeController
{
    public function index()
    {
        //lấy các sản phẩm là quần áo
        $clothes = (new Product)->listProduct();
        //Lấy các sản phẩm không phải quần áo
        $products = (new Product)->listProductOther();

        //lấy danh mục
        $categories = (new Category)->all();

        // Lưu thông tin URI vào session
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        return view("clients.home", 
        compact('clothes', 'products', 'categories'));
    }
}
