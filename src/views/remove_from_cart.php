<?php
session_start(); // Démarre la session pour accéder au panier

// Récupérer l'ID du produit à supprimer
$data = json_decode(file_get_contents("php://input"), true);
$productId = $data['id'] ?? null;

if ($productId && isset($_SESSION['cart'])) {
    // Parcours du panier et suppression du produit
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['id'] == $productId) {
            unset($_SESSION['cart'][$key]); // Supprimer le produit du panier
            echo json_encode(['message' => 'Produit supprimé avec succès !']);
            exit;
        }
    }
    echo json_encode(['message' => 'Produit non trouvé dans le panier']);
} else {
    echo json_encode(['message' => 'Panier vide ou produit invalide']);
}
