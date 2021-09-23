<?php

function SGBDConnect() {
    try {
        $connexion = New PDO('mysql:host=localhost;dbname=leblog', 'root', '');
        $connexion->query('SET NAME UTF8');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'erreur :' . $e->getMessage() . '<br/>';
        exit();
    }
    return $connexion;
}

?>
<?php
function getlisteKeyWord() {
    $req = "select * From keyword";
    $resultat = SGBDConnect()->query($req);
    foreach  ($resultat as $row) {
        print $row['KeyWordId'] . "\t";
    }
    die;
    return $resultat;
}

//function AjouterArticle($ArticleID,$ContenuHtml,$DateCreation,$fk_Category,$ImageCouverture,$LeKeyword,$TitreArticle){
//  INSERT INTO article (ArticleID,ContenuHtml,DateCreation,fk_Category,ImageCouverture,LeKeyword,TitreArticle)
//VALUES ( ArticleID , ContenuHtml , DateCreation , fk_Category , ImageCouverture , LeKeyword , TitreArticle )
//}

?>