<?php
     session_start();
     if (isset($_SESSION['email']))
     {
          header('Location:home');
     }
     elseif (isset($_POST['email'],$_POST['password'])) 
     {    
          require_once('../models/UserManager.php');
          $db = new PDO('mysql:host=localhost;port=3308;dbname=todo_list;charset=utf8','root', '');
          $user = new UserManager($db,'wantToConnect',$_POST['email'], $_POST['password']);
          $req= $user->Connexion($_POST['email'], $_POST['password']);
          if ($req == true)
          {
               $_SESSION['email'] = $_POST['email'];
               // Redirection du visiteur vers la page du minichat
               header('Location:../home');
          }
          else
          {
               header('Location:http://localhost/TODO_LIST/loginError');
          }

     }
     else
     {
         require_once('./views/auth/login.php');
     }





               
?>
    