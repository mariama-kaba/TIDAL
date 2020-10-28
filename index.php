<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles.css" />
    <title>DIOP-KABA</title>
</head>

<body>
        
        <div class="container site">  <!--contenaire de toute la page web-->
           <h1 class="text-logo"><span class="glyphicon glyphicon-leaf"></span> DIKA SHOPS <span class="glyphicon glyphicon-leaf"></span></h1>
            
            
           <?php
               require 'admin/database.php'; //appel du fichier database pour la connection la bd
            
               echo '<nav>
                       <ul class="nav nav-pills">';

           
               $db = Database::connect();// On crée une variable db où on enregistre la connection
           
               $statement = $db->query('SELECT * FROM categories');
// On fait une requette vers la base de données pour recuperer la liste des categories
// Je stock le resultat dans une variable que j'ai appélé statement 

               $categories = $statement->fetchAll();
            //recupère les differents catégories sous forme de tableau
          
               foreach ($categories as $category)   
               {
                   
                   if($category['id'] == '1')
                       echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                   else
                       echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
               }

               echo ' <ul class= "nav navbar-nav pull-right">
                        <li> <a href="../login/logout.php"><span class="glyphicon glyphicon-off"></span></a></li>
                      </ul>
                    ';

                    if (isset($_SESSION['pseudo'])) {
                        echo ' <ul class= "nav navbar-nav pull-right">
                        <li> <a href="login/connexion.php"><span class="glyphicon glyphicon-user"></span></a>'.$_SESSION['pseudo'].'</li>
                      </ul>
                    ';
                    } 
                    else {
                        echo ' <ul class= "nav navbar-nav pull-right">
                        <li> <a href="login/connexion.php"><span class="glyphicon glyphicon-user"></span></a></li>
                      </ul>
                    ';
                    }

                   

                echo ' <ul class= "nav navbar-nav pull-right">
                <li> <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
              </ul>
            ';

               echo    '</ul>
                     </nav>';

               echo '<div class="tab-content">';//contenaire des images et description
            
            
               foreach ($categories as $category) 
               {
                   
                   if($category['id'] == '1')
                       echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                   else
                       echo '<div class="tab-pane" id="' . $category['id'] .'">';

                   
                   echo '<div class="row">';// affiche les uns après les autres les images
                   
                   
                   $statement = $db->prepare('SELECT * FROM products WHERE products.category = ?');
                   $statement->execute(array($category['id']));
                  
                   while ($item = $statement->fetch())//tantque le produit est recupéré sous forme de tableau 
                   {
                       echo '<div class="col-sm-6 col-md-4">
                               <div class="thumbnail"> 
                                   <img src="images/' . $item['image'] . '" alt="..." style="height: 400px">
                                   <div class="price">' . number_format($item['price'], 2, '.', ''). ' €</div>
                                   <div class="caption">
                                       <h4>' . $item['name'] . '</h4>
                                       <p>' . $item['description'] . '</p>
                                       <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                   </div>
                               </div>
                           </div>';
                   }
                  
                  echo    '</div>
                       </div>';
               }
               Database::disconnect();
               echo  '</div>';
           ?>
       </div>
       
       
   </body>
</html>