<?php
require 'database.php';

$nameError = $descriptionError = $priceError = $categoryError= $imageError = $name = $description = $image= $category = $price= "";

if(!empty($_POST))
{
    $name=checkInput($_POST['name']);
    $description=checkInput($_POST['description']);
    $price=checkInput($_POST['price']);
    $category=checkInput($_POST['category']);
    $image=checkInput($_FILES['image']['name']);
    $imagePath='../images/'. basename($image);
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
    $isSuccess= true;
    
    $isUploadSuccess= false;
    
    if(empty($name))
    {
        $nameError='Ce champs ne peut pas être vide';
        $isSuccess=false;
    }
     if(empty($description))
    {
        $descriptionError='Ce champs ne peut pas être vide';
        $isSuccess=false;
    }
     if(empty($price))
    {
        $priceError='Ce champs ne peut pas être vide';
        $isSuccess=false;
    }
     if(empty($category))
    {
        $categoryError='Ce champs ne peut pas être vide';
        $isSuccess=false;
    }
     if(empty($image))
    {
        $imageError='Ce champs ne peut pas être vide';
        $isSuccess=false;
    }
    else{
        $isUploadSuccess = true;
        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension !="jpeg" && $imageExtension !="gif" )
        {
            $imageError="Les fichiers autorisés sont: .jpeg, .jpg, .png, .git";
            $isUploadSucess=false;
        }
        if(file_exists($imagePath))
        {
            $imageError="Le fichier existe deja";
            $isUploadSucess=false;
        }
        if($_FILES["image"]["size"] >500000)
        {
            $imageErros="Le fichier ne doit pas dépasser les 500KB";
            $isUplaodSucess=false;
        }
        if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"],$imagePath))
            {
                $imageError="Il y a une erreur lors du téléchargement";
                 $isUploadSuccess=false;
            }
                 
        }
        
    }
    
    if($isSuccess && $isUploadSuccess)
    {
        $db= Database::connect();
        $statement=$db->prepare("INSERT INTO items (name,description,price,categories,image) values(?,?,?,?,?)");
        $statement->execute(array($name,$description,$price,$category,$image));
        Database::disconnect();
        header("location: index.php");
        
    }
    
      
    
}

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
        <form class="form" role="form" action="insert.php" method="post"  enctype="multipart/form-data">
            <h1>Ajouter un Item </h1>
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
                  
                 $db= DATABASE::connect();
                  foreach($db->query('SELECT * FROM categories') AS $row)
                  {
                      echo '<option value="'. $row['id'].'" >'. $row['name'] .'</option>';
                  }
                  
                  DATABASE::disconnect();
                  ?>
                     
              </select>
                <span class="help-inline"><?php echo $categoryError; ?></span>
              </div>
            <div class="form-group">
                <label for="image">Ajouter une image:</label>
                <input type="file" id="image" name="image">
                <span class="help-inline"><?php echo $imageError; ?></span>
              </div>
            <br>
            <div class="form-actions">
                <button type=submit class="btn btn-success"><span class="fas fa-help"></span>Ajouter</button>            
            </div>
        
            <div class="form-actions">
            <a class="btn btn-primary" href="index.php"><span class="fas fa-arrow-left"></span>Retour</a> 
            </div>
            
            </form>
        </div>


        
        
        
 </div>

</body>

</html>



















             
         
            
         

