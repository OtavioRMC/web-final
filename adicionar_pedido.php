<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
require_once 'db.php';

class OrderController {
    public function addOrder($itemId, $itemName, $itemPrice, $quantity) {
        global $conn;

        $query = "INSERT INTO tb_pedidos (item_id, item_name, item_price, quantity) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isdi", $itemId, $itemName, $itemPrice, $quantity);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Pedido registrado com sucesso!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Erro ao registrar pedido."]);
        }

        $stmt->close();
    }

    public function listOrders() {
        global $conn;

        $query = "SELECT * FROM tb_pedidos ORDER BY created_at DESC";
        $result = $conn->query($query);

        if (!$result) {
            echo json_encode(["success" => false, "message" => "Erro ao buscar pedidos."]);
            return;
        }

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        // Verifica se há pedidos para evitar JSON vazio
        if (empty($orders)) {
            echo json_encode(["success" => true, "pedidos" => [], "message" => "Nenhum pedido encontrado."]);
        } else {
            echo json_encode(["success" => true, "pedidos" => $orders]);
        }
    }
}

$orderController = new OrderController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $itemId = $data['itemId'];
    $itemName = $data['itemName'];
    $itemPrice = $data['itemPrice'];
    $quantity = $data['quantity'];

    $orderController->addOrder($itemId, $itemName, $itemPrice, $quantity);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'list') {
    $orderController->listOrders();
}
