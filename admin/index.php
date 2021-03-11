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
            <h1><strong>Listes des Produits</strong><a href="insert.php" class="btn btn-success btn-lg"><span class ="fas fa-plus"></span>Ajouter</a></h1>
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>  
                <th>Prix</th>
                <th>Categories</th>
                <th>Actions</th>
            </tr>   
         </thead>
        <tbody>
            
            <?php
            require 'database.php';
            $db=Database::connect();
            $statement=$db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.categories=categories.id ORDER BY items.id DESC');
            while($item=$statement->fetch())
            {
            
            echo'<tr>';
            echo'<td>'.$item['name'].'</td>';
echo'<td>'.$item['description'].'</td>';
echo'<td>'. number_format((float)$item['price'],2,'.','').'</td>';
echo'<td>'.$item['category'].'</td>';
echo'<td width=300>';
                    echo'<a class="btn btn-default" href="view.php?id='.$item['id'] .'"><span class="fas fa-eye"></span>Voir</a>';
                     echo ' '; 
                     echo'<a class="btn btn-primary" href="update.php?id='. $item['id'].'"><span class="fas fa-pencil-alt"></span>Modifier</a>';
                     echo'<a class="btn btn-danger" href="delete.php?id='. $item['id'].'"><span class="fas fa-trash"></span>Supprimer</a>';
                 echo'</td>';
            echo'</tr>';
            }
            Database::disconnect();
            ?>
    
             
        </tbody>
            
    </table>
             
 </div>
    
    
    </div>

</body>

</html>



















             
         
            
         

