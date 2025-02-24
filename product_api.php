<?php

require_once "Product.php";

header('Content-Type: application/json');

$product = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($product->getAllProducts());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode($product->createProduct($data['name'], $data['type'], $data['price'] , $data['description']));
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode($product->updateProduct($data['id'], $data['name'], $data['type'], $data['description']));
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    echo json_encode($product->deleteProduct($data['id']));
}
?>
