<?php
     session_start();
    $todaydate=getdate(date("U"));
    $date = "$todaydate[weekday], $todaydate[month] $todaydate[mday], $todaydate[year]";


if (isset($_POST['titre'],$_POST['contenu']))
{   

    require_once('../models/TodoManager.php');
    $db = new PDO('mysql:host=localhost;port=3308;dbname=todo;charset=utf8','root', '');
    $todo = new TodoManager($db,$_SESSION['email'],$_POST['titre'],$_POST['contenu'],$date,'false');
    $todo->Ajouter();
    header('Location:../views/home');

}
else
{
    header('Location:../home');
}




?>