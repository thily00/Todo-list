<?php
    session_start();
    if (isset($_SESSION['email']))
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        
        $req = $bdd->prepare('SELECT * FROM todos WHERE todo_id = :id');
        $req->execute(array(
            'id' => $_GET['id']
        ));
        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="./public/styles/home.css">
            <title>TODO-APP</title>
        </head>
        <script src="https://use.fontawesome.com/2849c5eacd.js"></script>
        <body>

            <nav class="navbar fixed-top">
                <p>TODO APP</p>
            </nav>

            <div class="main container-fluid">
                <div class="row">
                    
                    <div class="todos col-md-12">
                    <?php while ($donnee = $req->fetch()) {?>
                        <form action="controllers/ControllerUpdateTodo.php?id=<?php echo htmlspecialchars($donnee['todo_id']) ?>" method="post">
                        <div class="form-group">
                            <label for="email">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" "aria-describedby="emailHelp" value="<?php echo htmlspecialchars($donnee['titre']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contenu</label>
                            <textarea class="form-control" name="contenu" id="exampleFormControlTextarea1" rows="3" required><?php echo htmlspecialchars($donnee['contenu']) ?></textarea>
                        </div>
                            
                        <button type="submit" class="btn btn-dark">Modifier</button>
                    </form>
                    <a href="home"><button type="" class="btn2">Retour</button></a>
                   <?php }?>
                    
                        
                    </div>
                </div>
            </div>

            

            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
        
        <?php
    }
    else
    {
        header('Location:./index.php');
    }
?>

    
