<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script language="javascript">
        function fonction1() {
            document.getElementById('etu1').className="btn";
            document.getElementById('etu1').style="border: 2px solid #d84d47;padding: 7px 14px;font-size: 16px;cursor: pointer;border-color: #d84d47;color: #d84d47;";
            document.getElementById('etu2').className="btn btn-success";
            document.getElementById('etu2').style="padding: 7px 14px;font-size: 16px;cursor: pointer;";
        }
        function fonction2() {
            document.getElementById('etu1').className="btn btn-danger";
            document.getElementById('etu1').style="padding: 7px 14px;font-size: 16px;cursor: pointer;";
            document.getElementById('etu2').className="btn";
            document.getElementById('etu2').style="border: 2px solid #5bb65b;padding: 7px 14px;font-size: 16px;cursor: pointer;border-color: #5bb65b;color: #5bb65b;";
        }
    </script>
</head>

<body>

    <?php
        $table=$_REQUEST['table'];
            echo '<div class="container">';
    
                echo '<div class="span10 offset1">';
                    echo '<div class="row">';
                        echo '<h1>Créer un '.rtrim($_GET['table'], 's').'</h1>';
                                        
                    echo '</div>';
            
                    echo '<form class="form-horizontal" action="AffRadioPost.php" method="post">';   
                     
                      echo '<div class="control-group">';
                        echo '<label class="control-label">Étudiant</label>';
                        echo '<div class="controls" style="margin-left: 220px">';
                       
                                echo '<a type="radio" class="btn btn-danger " style="padding: 7px 14px;font-size: 16px;cursor: pointer;" name="co" id="etu1" value="non"  onclick="fonction2();"/>Non</a>';

                                echo '<a type="radio" class="btn" style="border: 2px solid #5bb65b;padding: 7px 14px;font-size: 16px;cursor: pointer;border-color: #5bb65b;color: #5bb65b;" name="co" id="etu2" value="oui" onclick="fonction1();"/>Oui</a>';
                                
                                if (!empty($_POST['co'])){
                                 echo '<p/>'.$_POST['co'].'</p>'; 
                                }                                
                        echo '</div>';
                      echo '</div>';
                    echo '<button type="submit" class="btn btn-success">Créer</button>';

                    echo '</form>';
                echo '</div>';
            echo '</div> <!-- /container -->';      
    ?>

</body>     
</html>
