<?php
    session_start();

if (isset($_GET['id']))
{   
    try
    {
        $bdd = new PDO('mysql:host=localhost;port=3308;dbname=todo_list;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $reqD = $bdd->prepare('UPDATE todos SET titre =:titre , contenu =:contenu WHERE todo_id =:id');
    $reqD->execute(array(
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu'],
        'id' => $_GET['id']
    ));
        
    header('Location:../home');

}
else
{
    header('Location:../home');
}




?>