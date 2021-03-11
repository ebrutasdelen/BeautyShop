<?php
require 'database.php';
?>


<!DOCTYPE html>

<html>

<head>
<title>Beauty Shop</title>
    <meta  charset="utf-8" lang="fr">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body>
<h1 class="text-logo"><i class="fas fa-spa"></i> Beauty Shop <i class="fas fa-spa"></i></h1>
    
    <div class="container admin">
        <div class="row">
            
        <h1><strong>Ajouter un Item </strong></h1>
        <br>
        <form class="form" role="form" action="insert.php" method="post"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control"id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                <span class="help-inline"><?php echo $nameError; ?></span>
            
              </div>
            <div class="form-group">
                <label for="name">Description:</label>
                <input type="text" class="form-control"id="description" name="description" placeholder="Déscription" value="<?php echo $description; ?>">
                <span class="help-inline"><?php echo $descriptionError; ?></span>
              </div>
            <div class="form-group">
                 <label for="price">Prix TTC:</label>
                <input type="number" step= "0.01" class="form-control"id="price" name="price" placeholder="price" value="<?php echo $price; ?>">
                <span class="help-inline"><?php echo $priceError; ?></span>
              </div>
            <div class="form-group">
                 <label for="name">Catégorie:</label>
              <select class="form-control" id="category" name="category">
                  <?php
                  
                 $db= DATABASE ::connect();
                  ?>
                  
                
              </select>
                <span class="help-inline"><?php echo $categoryError; ?></span>
              </div>
            <div class="form-group">
                <label>Image:</label><?php
                echo ' '.$item['image']; ?>
              </div> 
        </form>
            <div class="form-actions">
            <a class="btn btn-primary" href="index.php"><span class="fas fa-arrow-left"></span>Retour</a> 
            </div>
        </div>


        
        
        
 </div>

</body>

</html>



















             
         
            
         

