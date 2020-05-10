<?php
    session_start();
    if (isset($_SESSION['email']))
    {
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

            <nav class="navbar bg-dark fixed-top">
                <p>TODO APP</p>
            </nav>

            <div class="main container-fluid">
                <div class="row">
                    <div class=" menu col-md-3">
                        <center>
                            <img src="./public/assets/profil.png" alt="" width="40%">
                            <p>Nom</p>
                        </center>
                        <hr/>
                        <div class="option">
                            <a href="./home">
                                <button type="submit" class="menuButton"> <i class="fa fam fa-list fa-lg" aria-hidden="true"></i>Todos </button>
                            </a><br>
                            <a href="compte">
                                <button type="submit" class="menuButton"><i class="fa fam fa-user fa-lg" aria-hidden="true"></i>Compte </button>
                            </a>
                            <form action="./views/logout.php" method="post"> 
                                <button type="submit" class="menuButton"><i class="fa fam fa-sign-out fa-lg" aria-hidden="true"></i>Se deconnecter </button>
                            </form>
                        </div>
                    </div>
                    <div class="todos col-md-9">
                        <p>COMPTE</p>
                        
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

    
