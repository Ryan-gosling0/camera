<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_POST['action'] ?? '';

if ($action === 'add') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Check if item already exists
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $id) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => 1
        ];
    }
    
    echo json_encode(['status' => 'success', 'count' => count($_SESSION['cart'])]);
}

if ($action === 'remove') {
    $id = $_POST['id'];
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function($item) use ($id) {
        return $item['id'] !== $id;
    });
    // Reindex array
    $_SESSION['cart'] = array_values($_SESSION['cart']); 
    
    echo json_encode(['status' => 'success', 'count' => count($_SESSION['cart'])]);
}

if ($action === 'count') {
    echo json_encode(['count' => count($_SESSION['cart'])]);
}
?>
