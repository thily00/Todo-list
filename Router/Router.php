<?php

class Router
{
    public function Route()
    {   
    
        $url = '';
        try
        {
            if (isset($_GET['url']))
            {   
                $url = explode('/', $_GET['url']);
                //on cree le controlleur
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerDirectory = "controllers/".$controllerClass.".php";

                //on verifie si le fichier du controlleur existe
                if(file_exists($controllerDirectory)){
                    require_once($controllerDirectory);
                }else{
                    require_once('controllers/ControllerLogin.php');
                }
            }
            else
            {
                header('location:http://localhost/TODO_LIST/controllers/ControllerLogin.php');
            }
    
        }
        catch (\Exception $e)
        {
           header('../views/error/404.php');
        }

    }
}

?>
