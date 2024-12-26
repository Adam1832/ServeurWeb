<?php
// Inclure le header
require_once __DIR__ . '/header.php';

session_start(); // Démarre la session pour accéder au panier

?>
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta name="" >
        <meta description="">
        <title>Produits</title>
        <link rel="stylesheet" href="/SiteServeurWeb/public/style.css">
        <meta charset="utf-8">
    </head>
    <body>

        <article id="ch1">
            <a href="detail.php" style="text-decoration:none">
                <h2>Nike React Vision</h2>
                <h3>Prix : 112€</h3>
                <button class="add-to-cart" data-product-id="1" data-product-name="Nike React Vision" data-product-price="112">
                    <img src="/SiteServeurWeb/public/images/cart-icon.png" alt="Ajouter au panier" style="width: 20px; height: 20px;">
                    Ajouter au panier
                </button>
                <img src="/SiteServeurWeb/public/images/chaussure1.jpg" alt="chaussure" >
            </a>
        </article>

        <article id="ch2">
            <a href="detail.php" style="text-decoration:none">
                <h2>Nike Running</h2>
                <h3>Prix : 139€</h3>
                <button class="add-to-cart" data-product-id="2" data-product-name="Nike Running" data-product-price="139">
                    <img src="/SiteServeurWeb/public/images/cart-icon.png" alt="Ajouter au panier" style="width: 20px; height: 20px;">
                    Ajouter au panier
                </button>
                <img src="/SiteServeurWeb/public/images/chaussure2.jpg" alt="chaussure" >
            </a>
        </article>

        <article id="ch3">
            <a href="detail.php" style="text-decoration:none">
                <h2>Nike Air Force One</h2>
                <h3>Prix : 95€</h3>
                <button class="add-to-cart" data-product-id="3" data-product-name="Nike Air Force One" data-product-price="95">
                    <img src="/SiteServeurWeb/public/images/cart-icon.png" alt="Ajouter au panier" style="width: 20px; height: 20px;">
                    Ajouter au panier
                </button>
                <img src="/SiteServeurWeb/public/images/chaussure3.jpg" alt="chaussure" >
            </a>
        </article>

        <article id="ch4">
            <a href="detail.php"  style="text-decoration:none">
                <h2>Adidas White&Black</h2>
                <h3>Prix : 74€</h3>
                <button class="add-to-cart" data-product-id="4" data-product-name="Adidas White&Black" data-product-price="74">
                    <img src="/SiteServeurWeb/public/images/cart-icon.png" alt="Ajouter au panier" style="width: 20px; height: 20px;">
                    Ajouter au panier
                </button>
                <img src="/SiteServeurWeb/public/images/chaussure4.jpg" alt="chaussure" >
            </a>
        </article>

        <article id="ch5">
            <a href="detail.php"  style="text-decoration:none">
                <h2>Asics Noir</h2>
                <h3>Prix :  99€</h3>
                <button class="add-to-cart" data-product-id="5" data-product-name="Asics Noir" data-product-price="99">
                    <img src="/SiteServeurWeb/public/images/cart-icon.png" alt="Ajouter au panier" style="width: 20px; height: 20px;">
                    Ajouter au panier
                </button>
                <img src="/SiteServeurWeb/public/images/chaussure5.jpg" alt="chaussure" >
            </a>
        </article>

        <article id="ch6">
            <a href="detail.php" style="text-decoration: none;">
                <h2>Nike Mercurial Superfly 9</h2>
                <h3>Prix : 159€</h3>
                <button class="add-to-cart" data-product-id="6" data-product-name="Nike Mercurial Superfly 9" data-product-price="159">
                    <img src="/SiteServeurWeb/public/images/cart-icon.png" alt="Ajouter au panier" style="width: 20px; height: 20px;">
                    Ajouter au panier
                </button>
                <img src="/SiteServeurWeb/public/images/chaussure6.jpg" alt="chaussure" >
            </a>
        </article>

        <script>
    // Ajouter un produit au panier
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Empêche la redirection du lien
            const productId = this.getAttribute('data-product-id');
            const productName = this.getAttribute('data-product-name');
            const productPrice = this.getAttribute('data-product-price');

            // Ajouter le produit au panier (session)
            fetch('/SiteServeurWeb/src/views/add_to_cart.php', {
                method: 'POST',
                body: JSON.stringify({
                    id: productId,
                    name: productName,
                    price: productPrice
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Afficher un message de confirmation
                window.location.href = '/SiteServeurWeb/src/views/panier.php'; // Rediriger vers la page panier
            })
            .catch(error => {
                console.error('Error:', error);
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
