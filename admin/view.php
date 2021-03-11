<?php
require 'database.php';

if(!empty($_GET['id']))
{
    $id=checkInput($_GET['id']);
}

$db= Database::connect();
$statement = $db->prepare("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.categories=categories.id WHERE items.id = ?");
$statement-> execute(array($id));
$item=$statement->fetch();
Database::disconnect();



function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
            
            <div class="col-sm-6">
            <h1><strong>Voir un Item </strong></h1>
            <br>
            <form>
                <div class="form-group">
                    <label>Nom:</label><?php
                    echo ' '.$item['name']; ?>
                  </div>
                <div class="form-group">
                    <label>Description:</label><?php
                    echo ' '.$item['description']; ?>
                  </div>
                <div class="form-group">
                    <label>Prix:</label><?php
                    echo ''.number_format((float)$item['price'],2,'.',''); ?>
                  </div>
                <div class="form-group">
                    <label>Catégorie:</label><?php
                    echo ' '.$item['category']; ?>
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
            
            
            <div class="col-sm-6">
                <div class="img-thumbnail">
            <img src= "<?php echo '../images/'. $item['image']; ?>" alt="...">
         <div class="price"><?php echo number_format((float)$item['price'],2,'.','').'€';?></div>
        <a href="*" class="btn btn-order" role="button"><span class=" fas fa-shopping-cart "></span>Commander</a>
                    
                </div>
            </div>
            
        
        </div>
        
 </div>

</body>

</html>



















             
         
            
         

