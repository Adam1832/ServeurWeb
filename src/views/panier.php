<?php

require_once __DIR__ . '/header.php';


session_start(); // Démarre la session pour accéder au panier
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <link rel="stylesheet" href="/SiteServeurWeb/public/style.css">
</head>
<body>

    <main>
        <section id="panier-container">
            <div class="panier-content">

                <?php
                // Vérification si le panier est vide
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    // Affichage des produits dans le panier
                    foreach ($_SESSION['cart'] as $product) {
                        echo '
                        <div class="product-item">
                            <img src="/SiteServeurWeb/public/images/' . $product['id'] . '.jpg" alt="' . $product['name'] . '" class="product-image">
                            <div class="product-details">
                                <h2>' . $product['name'] . '</h2>
                                <p>' . $product['price'] . '€</p>
                            </div>
                            <button class="remove-btn">Supprimer</button>
                        </div>';
                    }
                } else {
                    // Si le panier est vide
                    echo '<p class="empty-cart-message">Votre panier est vide. Ajoutez des produits pour commencer à acheter !</p>';
                }
                ?>

            <div class="panier-summary">
                <h3>Résumé du Panier</h3>
                <p><strong>Total : </strong> 
                <?php
                // Calculer le total
                $total = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $product) {
                        $total += $product['price'];
                    }
                    echo $total . '€';
                } else {
                    echo '0€';
                }
                ?>
                </p>
                <button class="checkout-btn">Procéder au paiement</button>
            </div>
        </section>
    </main>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <script>
        // Fonction pour supprimer un produit du panier
        document.querySelectorAll('.remove-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id'); // Récupérer l'ID du produit à supprimer

                // Envoyer la requête pour supprimer le produit via AJAX
                fetch('/SiteServeurWeb/src/views/remove_from_cart.php', {
                    method: 'POST',
                    body: JSON.stringify({ id: productId }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Afficher un message de confirmation
                    window.location.reload(); // Rafraîchir la page pour mettre à jour le panier
                })
                .catch(error => {
                    console.error('Erreur:', error);
                });
            });
        });
    </script>
</body>
</html>
<?php
// Inclure le footer
require_once __DIR__ . '/footer.php';
?>