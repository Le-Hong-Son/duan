<?php

/**
 * lớp Product dùng để thao tác dữ liệu của bảng products
 * 
 */
class Product extends BaseModel
{
    /**
     * hàm all để lấy ra tất cả sản phẩm
     */
    public function all()
    {
        $sql = "SELECT p.*, cate_name FROM products p JOIN categories c ON p.category_id=c.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // TÌm kiếm
    public function searchProductName($name){   
        $sql = "SELECT p.*, cate_name FROM products p JOIN categories c ON p.category_id=c.id 
        WHERE name LIKE '%$name%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    /**
     * Hàm lấy ra các sản phẩm là quần áo
     * được xác định bởi thuộc tính type=1
     */
    public function listProduct()
    {
        $sql = "SELECT p.*, cate_name FROM products p JOIN categories c ON p.category_id=c.id WHERE type=1 LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Hàm lấy ra các sản phẩm không phải là quần áo
     * được xác định bởi type=0
     */
    public function listProductOther()
    {
        $sql = "SELECT p.*, cate_name FROM products p JOIN categories c ON p.category_id=c.id WHERE type=0 LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Hàm lấy sản phẩm theo danh mục
     * @id: mã danh mục
     */
    public function listProductInCategory($id)
    {
        $sql = "SELECT p.*, cate_name FROM products p JOIN categories c ON p.category_id=c.id WHERE c.id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * function create: thêm dữ liệu sản phẩm
     * @data: mảng dữ liệu cần thêm
     */

    // 
    /** sản phẩm liên quan
     * @category_id: mã danh mục
     * $id: mã sản phẩm
     */
    public function listProductRelead($category_id,$id){
        $sql = "SELECT p.*, cate_name FROM products p JOIN categories c ON 
        p.category_id=c.id WHERE c.id=:category_id AND p.id <> :id ORDER BY id DESC LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id,'category_id' => $category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data)
    {
        // Kiểm tra xem 'content' có được cung cấp không, nếu không thì gán giá trị mặc định
        if (!isset($data['content'])) {
            $data['content'] = ''; // Hoặc bạn có thể sử dụng một giá trị mặc định khác
        }
    
        // Cập nhật câu lệnh SQL để thêm 'content'
        $sql = "INSERT INTO products(name, image, price, quantity, description, content, status, category_id) 
                VALUES(:name, :image, :price, :quantity, :description, :content, :status, :category_id)";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    
    /**
     * function update: cập nhật dữ liệu
     * @id: mã sản phẩm cần cập nhật
     * @data: mảng dữ liệu cần cập nhật
     */
    public function update($id, $data)
    {
        $sql = "UPDATE products SET name=:name, image=:image, price=:price, quantity=:quantity, description=:description, status=:status, category_id=:category_id WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        //Thêm id và mảngr data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    /**
     * function delete: xóa bản ghi
     * @id: mã sản phẩm cần xóa
     */
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    /**
     * function find: lấy ra 1 bản ghi theo id
     * @id: mã sản phẩm cần tìm
     */
    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
