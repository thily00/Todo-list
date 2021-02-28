<?php
     session_start();
     if (isset($_SESSION['email']))
     {
          header('Location:../views/home');
     }
     elseif (isset($_POST['nom'],$_POST['email'],$_POST['password'],$_POST['password2'])) 
     {    
          if ($_POST['password'] == $_POST['password2']){
               // Hachage du mot de passe
               $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
               
               //on se connecte a la BD
               require_once('../models/UserManager.php');
               $db = new PDO('mysql:host=localhost;port=3308;dbname=todo;charset=utf8','root', '');
               $user = new UserManager($db,$_POST['nom'],$_POST['email'], $pass_hache);

               $req = $user->getDb()->prepare('SELECT * FROM users WHERE email = :email');
               $req->execute(array(
               'email' => $_POST['email']));
               $resultat = $req->fetch();

               if ($resultat>0){
                    header('Location:http://localhost/TODO_LIST/views/error/registerError');
               }else{
                    // Insertion
                    $user->Inscrire();
                    session_start();
                    $_SESSION['email'] = $_POST['email'];

                    // Redirection du visiteur vers la page du minichat
                    header('Location:../views/home');
               }

          }
          else
          {
               header('Location:http://localhost/TODO_LIST/views/error/registerError');
          }
     }else
     {    
          require_once('../views/auth/register.php');
     }
?>
    
