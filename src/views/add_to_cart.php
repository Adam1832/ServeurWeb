<?php
session_start(); 


$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['name'], $data['price'])) {

    $product = [
        'id' => $data['id'],
        'name' => $data['name'],
        'price' => $data['price']
    ];


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }


    $_SESSION['cart'][] = $product;

    echo json_encode(['message' => 'Produit ajouté au panier !']);
} else {
    echo json_encode(['message' => 'Erreur lors de l\'ajout du produit']);
}
?>
