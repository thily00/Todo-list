<?php
     session_start();
     if (isset($_SESSION['email']))
     {
        header('Location:home');
     }
     else
     {
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="../TODO_LIST/public/styles/loginRegister.css">
            <title>TODO-APP</title>
        </head>
        <body>

            <nav class="navbar justify-content-center ">
                <p>TODO APP</p>
            </nav>

            <div class=" container errorMsg">
                <center>
                    l'adresse email et le mot de passe ne correspondent pas
                </center>
            </div>

            <div class="form container">
                <center>
                    <form action="../TODO_LIST/controllers/ControllerLogin.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" "aria-describedby="emailHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                    
                        <button type="submit" class="btn btn-dark">Se connecter</button>
                    </form>
                    <a href="register">Cliquez-ici pour vous inscrire</a>
                </center>
            </div>
            

            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
     }
?>
