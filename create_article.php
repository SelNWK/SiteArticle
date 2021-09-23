
<?php
session_start();

include_once 'utils/DBClass.php';
include_once 'entities/Article.php';

$connection = (new DBClass())->getConnection();
$articleInstance = new Article($connection);
$KeywordArticleInstance = new KeyWordArticle($connection);

$success= $articleInstance->insert($_POST['TitreArticle'], $_POST['ContenuHtml'], $_POST['Auteur'], new \DateTime(), $_POST['ImageCouverture'], $_POST['Category']);

$success= $KeywordArticle->insert($_POST['KeyWord']);

if ($success) {
    $_SESSION['message'] = 'Article ajouté dans la base.';
    $_SESSION['status'] = 'success';
}
else {
    $_SESSION['message'] = 'Erreur lors de l\'ajout de l\'article dans la base';
    $_SESSION['status'] = 'error';
}

header('Location: index.php');

?>
