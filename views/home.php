<?php
    session_start();
    if (isset($_SESSION['email']))
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3308;dbname=todo_list;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $reqU = $bdd->prepare('SELECT * FROM users WHERE email = :email');
        $reqU->execute(array(
            'email' => $_SESSION['email']));

        $req = $bdd->prepare('SELECT * FROM todos WHERE user_email = :email');
        $req->execute(array(
            'email' => $_SESSION['email']));

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
                    <div class=" menu col-xl-3">
                        <center>
                            <img src="./public/assets/profil.png" alt="" width="80%">
                            <?php while ($donneeU = $reqU->fetch()) {?> <p><?php echo htmlspecialchars($donneeU['nom'])?></p> <?php }?>
                        
                        <hr/>
                        <div class="option">
                           <!-- <a href="home">
                                <button type="submit" class="menuButton"> <i class="fa fam fa-list fa-lg" aria-hidden="true"></i>Todos </button>
                            </a><br>
                            <a href="compte">
                                <button type="submit" class="menuButton"><i class="fa fam fa-user fa-lg" aria-hidden="true"></i>Compte </button>
                            </a> -->
                            <form action="views/logout.php" method="post"> 
                                <button type="submit" class="menuButton"><i class="fa fam fa-sign-out fa-lg" aria-hidden="true"></i>Se deconnecter </button>
                            </form>

                        </div>
                        </center>
                    </div>
                    <div class="todos col-md-9">
                        <div class="container">
                            <div class="row">
                            <?php
                        while ($donnee = $req->fetch()) {?>
                            <div class="card md-4" style="width: 18rem;margin-left:10px;margin-bottom:10px">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($donnee['titre']) ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($donnee['dateC']) ?></h6>
                                    <p class="card-text"><?php echo htmlspecialchars($donnee['contenu']) ?></p>
                                    
                                    <div class="icon">
                                        <form action="editTodo?id=<?php echo htmlspecialchars($donnee['todo_id']) ?>" method="post"> 
                                            <button type="submit" class="menuButton2"><i class="fa faE fa-pencil-square-o facE" aria-hidden="true"></i> </button>
                                        </form>
                                        <form action="controllers/ControllerDeleteTodo.php?id=<?php echo htmlspecialchars($donnee['todo_id']) ?>" method="post"> 
                                            <button type="submit" class="menuButton2"><i class="fa faD fa-trash-o" id="facD" aria-hidden="true"></i> </button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                       <?php }?>
                            </div>
                        </div> 
                        <i id="button" class="fa fap fa-plus-circle fa-4x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="popupAdd" id="popupAdd">
                <p class="closeform" id="closeform">X</p>
                    <form action="controllers/ControllerAddTodo.php" method="post">
                        <div class="form-group">
                            <label for="email">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" "aria-describedby="emailHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contenu</label>
                            <textarea class="form-control" name="contenu" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                            
                        <button type="submit" class="btn ">Ajouter</button>
                    </form>
            </div>

            <script src="./public/scripts/main.js"></script>
           
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

    
