<?php
class Cart extends BaseModel {
    // Lấy toàn bộ giỏ hàng của một người dùng
    public function all($userId) {
        $sql = "SELECT c.*, p.name AS product_name, p.price AS product_price, p.image AS product_image 
                FROM cart c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm vào giỏ hàng
    public function create($data) {
        $sql = "INSERT INTO cart (user_id, product_id, quantity) 
                VALUES (:user_id, :product_id, :quantity)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update($cartId, $quantity) {
        $sql = "UPDATE cart SET quantity = :quantity WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['quantity' => $quantity, 'id' => $cartId]);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function delete($cartId) {
        $sql = "DELETE FROM cart WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $cartId]);
    }
}
?>
