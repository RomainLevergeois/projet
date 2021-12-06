<?php
    include_once("myparam.inc.php");
    if (!empty($_POST)){
        if ($_POST["id"]==MYUSER && $_POST["mdp2"]==MYPASS){
            header('Location: index.php');
        } 
    }
?>
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

        function fonctionf() { 
            console.log(document.getElementById('img').className);
            if (document.getElementById('img').className=="icon-eye-open"){
                document.getElementById('mdp').type="text";
                document.getElementById('img').className="icon-eye-close";
            }else if (document.getElementById('img').className=="icon-eye-close"){
                document.getElementById('mdp').type="password";
                document.getElementById('img').className="icon-eye-open"
            }
        }

        function fonctiong() {
            document.getElementById('img').style="position: relative;left: 62.2%;top: 62.4%;border: 2px solid lightgrey;border-radius: 50%";
        }

    </script>
</head>

<body>
    <div class="container" style="width: 43%;">
            <br/>
            <br/>
            <br/>
    		<div class="row" style="border-radius: 30px;background-color: lightgrey;min-width: 43%">

                <div clas="span12">
                    <div class="row">    
                        <br/>
                        <div class="span">
                        </div>
                        <div class="span2" style="border: 2px solid black;background-color: white">
                            <img
                                src="img/LogoDB.png"
                                alt="Logo du projet"
                                width=100%>

                        </div>
                        <div class="span5">
                            <br/>
                             <h1>Page d'identification</h1>
                             
                        </div>
                    </div>
                    <div class="row">
                        <div class="span">
                        </div>
                        <div class="span2">

                        </div>
                        <div class="span5">
                            <form method="post">
                            <div class="row" style="margin-left: 30px">
                                <div class="form-horizontal" >
                                    <label class="form-label" style="display: block;width: 120px;float: left;">Identifiant</label>
                                        <input type="text" name="id" placeholder="Identifiant" />
                                        <br/>
                                    
                                </div>
                                <div class="form-horizontal" >
                                    <label class="form-label" id="yoo" style="display: block;width: 102px;float: left;">Mot de passe</label>  
                                            <i class="icon-eye-open" id="img" style="position: relative;left: 62.2%;bottom: 1px;" onclick="fonctionf();" onmouseover="document.getElementById('img').style='position: relative;left: 62.4%;bottom: 2px;border: 1px solid grey;border-radius: 50%;heigth: 30px';document.getElementById('yoo').style='display: block;width: 100px;float: left';" onmouseout="document.getElementById('img').style='position: relative;left: 62.2%;bottom: 1px;border: 0px solid lightgrey;border-radius: 50%';document.getElementById('yoo').style='display: block;width: 102px;float: left';"></i>
                                            <input type="password" placeholder="Mot de passe" id="mdp" name="mdp2"/> 
                                        

                                </div>
                                    
                            <?php
                                if (!empty($_POST) && ($_POST["id"]!=MYUSER || $_POST["mdp2"]!=MYPASS)) {
                                    echo "<script>alert(\"L'identifiant et/ou le mot de passe est/sont erroné(s)\")</script>";
                                }
                            ?>        
                                
                                    
                            </div>
                            <div class="row" align="center">
                                <br/>
                                <input type="submit" value="Se connecter" />  
                            </div>                                    
 
                           </form>
                            
                        </div>
                    </div>
                </div>
            </div>
    </div> 
  </body>
</html>
