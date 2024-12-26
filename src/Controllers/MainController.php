<?php

class MainController
{
    // Page d'accueil
    public function home()
    {
        $this->render('home', ['router' => $GLOBALS['router']]);
    }
    public function productList()
    {
        dump("Page products list");
    }
    // Page "produits"
    public function produits()
    {
        $this->render('produits', ['router' => $GLOBALS['router']]);
        
    }
    public function connexion()
    {
        $this->render('connexion', ['router' => $GLOBALS['router']]);
    }
    // Page d'inscription
    public function inscription()
    {
        $this->render('inscription', ['router' => $GLOBALS['router']]);
    }

    public function panier()
    {
        $this->render('panier', ['router' => $GLOBALS['router']]);
    }  

    public function detail()
    {
        $this->render('detail', ['router' => $GLOBALS['router']]);
    }

    // Page 404
    public function notFound()
    {
        http_response_code(404);
        echo "404 - Page Not Found!";
    }

    // Méthode pour inclure une vue

    private function render($view, $data = [])
    {
        if (!preg_match('/^[a-zA-Z0-9_-]+$/', $view)) {
            throw new Exception('Invalid view name');
        }
    
        if (!is_array($data)) {
            $data = [];
        }
        extract($data);
    
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
    
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            $this->notFound();
        }
    }
}
