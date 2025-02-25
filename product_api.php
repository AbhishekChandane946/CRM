<?php

require_once "Product.php";

header('Content-Type: application/json');

$product = new Product();


// ✅ Fetch a single product by ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $productId = intval($_GET['id']); // Ensure it's a valid number
    echo json_encode($product->getProductById($productId));
    exit;
}

// Get all products
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($product->getAllProducts());
    exit;
}

// Create a new product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['name'], $data['type'], $data['price'], $data['description'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    echo json_encode($product->createProduct($data['name'], $data['type'], $data['price'], $data['description']));
    exit;
}

    // ✅ Update an existing product
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['id'], $data['name'], $data['type'], $data['price'], $data['description'])) {
            echo json_encode(["status" => "error", "message" => "Missing required fields"]);
            exit;
        }

        echo json_encode($product->updateProduct($data['id'], $data['name'], $data['type'], $data['price'], $data['description']));
        exit;
    }

// Delete a product
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['id'])) {
        echo json_encode(["status" => "error", "message" => "Missing product ID"]);
        exit;
    }

    echo json_encode($product->deleteProduct($data['id']));
    exit;
}

// Handle unsupported request methods
echo json_encode(["status" => "error", "message" => "Invalid request method"]);
exit;

?>
