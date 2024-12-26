
<?php
/**
 * Model Brand => lié à la table brand en bdd
 */

use App\Utils\Database;
use PDO; // on utilise la classe PDO dont le namespace a été défini
class Category extends CoreModel
{
    private $name;
    /**
     * Récupère toutes les marques (table brand) depuis la bdd
     * Retourne une liste d'objet (instances de la classe Brand => le model ou on est)
     */
    public function findAll()
    {
        $sql = "SELECT * FROM category";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);
        return $categories;
    }

    public function find($id)
    {
        // Ici on créer la requete SQL qui va récupérer le product en fonction de son id
        $sql = "SELECT * FROM category WHERE id = ".$id;
        // Ici $pdo est un objet de la classe Databse (Utils/Database.php)
        // $pdo va me permettre d'executer mes requetes sql
        $pdo = Database::getPDO();
        // ici j'execute ma requete sql ($sql) et je stock le resultat de cette requete dans $pdoStatement
        $pdoStatement = $pdo->query($sql);
        // Je veux récuperer UN objet Product, PDO le fait pour moi => fetchObject (fetch qu'une seule fois + converti en objet de la classe 'Product' donc le model Product)
        $category = $pdoStatement->fetchObject(Brand::class);
        return $category;
    }
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }
}
 
 