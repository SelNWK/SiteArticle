<?php

class Article {

    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function selectAll() {
        $query =    'SELECT a.ArticleID, c.CategoryID as category_id, a.TitreArticle, a.ContenuHtml, c.CategoryName as category_name, k.KeyWordName as keyword_name, a.Auteur, a.ImageCouverture, a.DateCreation '.
                    'FROM article a '.
                    'LEFT JOIN category c ON a.fk_CategoryId = c.CategoryID '.
                    'LEFT JOIN keywordarticle ak ON ak.fk_ArticleID = a.ArticleID '.
                    'LEFT JOIN keyword k ON ak.fk_KeyWordArticleId = k.KeyWordId '.
                    'ORDER BY a.DateCreation DESC'; 


        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $title, string $content, string $author, \DateTime $createdAt, string $imageUrl, int $categoryId){
    $query = "INSERT INTO `article` (`ArticleID`, `TitreArticle`, `ContenuHtml`, `Auteur`, `DateCreation`, `ImageCouverture`, `fk_CategoryId`) ".
    "VALUES ( NULL , '$title', '$content', '$author', '".$createdAt->format('y-m-d')."', '$imageUrl', '$categoryId')";
    echo $query;
    $stmt = $this->connection->prepare($query);
    return $stmt->execute();
    }

    public function insertKW(string $KeyWordId){
        $query = "INSERT INTO `keywordarticle` (`fk_ArticleID`, `fk_KeyWordId`) ".
        "VALUES ( NULL ,'$KeyWordId')";
        echo $query;
        $stmt = $this->connection->prepare($query);
        return $stmt->execute();
        }
    
    public function CountKw() {
        $query =    'SELECT count(KeyWordId) '.
                    'FROM keyword '.
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $NbKw;
    }
    

}
?>