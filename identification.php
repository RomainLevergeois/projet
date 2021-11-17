<!DOCTYPE html>
<!--Page d'identification-->
<html lang="frs">
<head>
    <title>Projet LGS: identification</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="identification.css"/>
    <script language="javascript">
        function foncton() {
            if (document.getElementById('img').className=="fas fa-eye"){
                document.getElementById('mdp').type="text";
                document.getElementById('img').className="fas fa-eye-slash";
            }else{
                document.getElementById('mdp').type="password";
                document.getElementById('img').className="fas fa-eye";
            }
        }
    </script>
    <script src="https://kit.fontawesome.com/2e82b0a3e4.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="fullscreen-container parent">
        <video autoplay loop muted>
            <source src="test-perso/pexels-tima-miroshnichenko-6722193.mp4" type="video/mp4"/>
        </video>
        <div class="container child">
            <div class="img-presentation">
                <img src="img/LogoDB.png" alt="Logo du projet">
            </div>
            <div class="formulaire">                     
                <form method="post">
                    <div class="input-group">
                        <label>Identifiant</label>
                        <input type="text" name="id" required>
                    </div>
                   <div class="input-group">
                       <div class="alignement">
                            <label>Mot de passe</label>
                            <div class="font-icon">
                                <i class="fas fa-eye" id="img" onclick="foncton();" onmouseover="document.getElementById('img').innerHTML = 'Révéler le mot de passe'" onmouseout="document.getElementById('img').innerHTML = ''"></i>
                            </div>  
                        </div>
                        <input type="password" id="mdp" name="mdp2" required>
                    </div>
                    
                    <button type="submit" class="login-button">Se connecter</button>                                        
                </form>
            </div>
        </div>
    </div>
</body>
<?php
    include_once("myparam.inc.php");
    if (!empty($_POST)){
        if ($_POST["id"]==MYUSER && $_POST["mdp2"]==MYPASS){
            header('Location: index2.php');
            exit();
        }
        else{
            echo "<script>alert(\"L'identifiant et/ou le mot de passe est/sont erroné(s)\")</script>";
        }
    }
?>
</html>
