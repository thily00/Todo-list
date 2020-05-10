<?php
    session_start();

if (isset($_GET['id']))
{   
    try
    {
        $bdd = new PDO('mysql:host=localhost/port=3308;dbname=todo_list;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $reqD = $bdd->exec('DELETE FROM todos WHERE todo_id ='.$_GET['id'].'');
        
    header('Location:../home');

}
else
{
    header('Location:../home');
}




?>