<!DOCTYPE html>
<!--Page d'identification-->
<html lang="frs">
<head>
    <title>Projet LGS: identification</title>
    <meta charset="utf-8">
    <link  href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js">
    </script>
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
            <br/>
            <br/>
            <br/>
    		<div class="row" style="border-radius: 30px;background-color: lightgrey">

                <div clas="span12">
                    <div class="row">    
                        <br/>
                        <div class="span">
                        </div>
                        <div class="span3" style="border: 2px solid black;background-color: white">
                            <img
                                src="img/LogoDB.png"
                                alt="Logo du projet"
                                width=200px>

                        </div>
                        <div class="span6">
                            <br/>
                            <br/>
                            <br/>
                             <h1>Page d'identification</h1>
                             
                        </div>
                    </div>
                    <div class="row">
                        <div class="span">
                        </div>
                        <div class="span3">

                        </div>
                        <div class="span6">
                            <form method="post">
                            <div class="row">
                                <div class="form-horizontal" >
                                    <label class="form-label">Identifiant</label>
                                        <input type="text" name="id" placeholder="Identifiant" />
                                    
                                </div>
                                <div class="form-horizontal" >
                                    <label class="input-label">Mot de passe</label>                               
                                        <div class="inner-addon left-addon">
                                            <input type="password" placeholder="Mot de passe" id="mdp" name="mdp2" />
                                            <i class="icon-eye-open" id="img" onclick="foncton();"></i> 
                                        </div>
                                </div>
                                    
                                
                                    
                            </div>
                            <div class="row">

                                <input type="submit" value="Se connecter" />  
                            </div>                                    
                          


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
                            
                        </div>
                    </div>
                </div>
            </div>
    </div> 
  </body>
</html>
