<!DOCTYPE html>
<!--Page d'identification-->
<html lang="frs">
<head>
    <title>Projet LGS: identification</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="identification.css"/>
    <script language="javascript">
        function foncton() {
            if (document.getElementById('img').className=="icon-eye-open"){
                document.getElementById('mdp').type="text";
                document.getElementById('img').className="icon-eye-close";
            }else{
                document.getElementById('mdp').type="password";
                document.getElementById('img').className="icon-eye-open";
            }
        }
    </script>
</head>

<body>
    <div class="container">
    		<div class="row">
                <table border=0px>
                    <tr>
                        <td>
                            <img
                            src="img/LogoDB.png"
                            alt="Logo du projet"
                            width=200px>
                        </td>
                        <td>
    	           		    <h1>Page d'identification</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <form method="post">
                                <table border=1px cellpadding=5px rules=none>
                                    <tr>
                                        <td>
                                            <p>  Identifiant  
                                            </p>
                                        </td>
                                        <td>
                                            <input type="text" name="id" />
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>  Mot de passe  
                                            </p>
                                        </td>
                                        <td>
                                            <input type="password" placeholder="Mot de passe" id="mdp" name="mdp2" />
                                        </td>
                                        <td>
                                            <p><i class="icon-eye-open" id="img" onclick="foncton();"></i></p>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <center><input type="submit" value="Se connecter" /></center>                                         
                                        </td>
                                    </tr>
                                </table>

                                <?php
                                    include_once("myparam.inc.php");
                                    if (!empty($_POST)){
                                        if ($_POST["id"]==MYUSER && $_POST["mdp2"]==MYPASS){
                                            header('Location: index.php');
                                            exit();
                                        }
                                        else{
                                            echo "<script>alert(\"L'identifiant et/ou le mot de passe est/sont erroné(s)\")</script>";
                                        }
                                    }
                                ?>
                            </form>
                        </td>
                    </tr>
		        </table>
            </div>
    </div> 
  </body>
</html>
