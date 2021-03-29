<!DOCTYPE html>
<html>
    <head>
        <title>BeautySHop</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    
    <body>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> BeautyShop <span class="glyphicon glyphicon-cutlery"></span></h1>
            <?php
				require 'admin/database.php';
			 
                echo '<nav>
                        <ul class="nav nav-pills">';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                    else
                        echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                }

                echo    '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.categories = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) 
                    {
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $item['image'] . '" alt="...">
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


    

<!--<!DOCTYPE html>
<body>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
            <?php
				require 'admin/database.php';
			 
                echo '<nav>
                        <ul class="nav nav-pills">';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                    else
                        echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                }

                echo    '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.categories = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) 
                    {
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $item['image'] . '" alt="...">
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




<html>

<head>
<title>Beauty Shop</title>
    <meta  charset="utf-8" lang="fr">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body>

<!-- CONTAINER DU SITE -->

<!--div class="container site"-->

<!-- PAGE TITLE -->

<!--h1 class="text-logo"><i class="fas fa-spa"></i> Beauty Shop <i class="fas fa-spa"></i> </h1>
    
    
    <!--?php
    require 'admin/database.php';
    echo '<nav>
        <ul class="nav nav-pills mb-3" id="pills-tab">';
        $db =Database::connect();
        $statement=$db->query("SELECT * FROM categories");
        $categories=$statement->fetchALl();
        foreach($categories as $category)
        {
            if($category['id']=='1')
            {
                echo '<li class="nav-item">
    <a class="nav-link active" id="pills-active" data-toggle="pill" href="#"' . $category['id'].' role="tab" aria-controls="pills-active" aria-selected="true">'.$category['name'].'</a></li>';
            }
            else
                echo '<li class="nav-item">
    <a class="nav-link" id="pills-tab" data-toggle="pill" href="#" ' . $category['id'].' role="tab" aria-controls="pills-maquillages" aria-selected="false">'.$category['name'].'</a></li>';    
        }
                echo '</ul></nav>';
    
                echo '<div class="tab-content" id="pills-tabContent">';
             
                  foreach ($categories as $category) 
                          {
                              if($category['id'] == '1')
                                  echo'<div class="tab-pane fade show active" id="' .$category['id'] .'">';
                            else
                              echo'<div class="tab-pane fade show " id="'.$category['id'].'">';

                              echo'<div class="row>';

                                $statement = $db->prepare('SELECT * FROM items WHERE items.categories = ?');
                                $statement->execute(array($category['id']));
                                while ($item = $statement->fetch())    
                                {
                                   echo '<div class="col-sm-6 col-md-4">
                                   <div class="img-thumbnail">
                                   <img src="images/'. $item['image'].'" alt="produit">
                                   <div class="price">'. number_format($item['price'],2,".","").'€</div>
                             <div class="caption">
                                 <h4>'.$item['name'].'</h4>
                                <p>'.$item['description'].' </p> 
                                <a href="*" class="btn btn-order btn-primary" role="button"><i class="fa fa-shopping-bag"></i>Commander</a>
                                    </div>
                                </div>
                              </div>';
                                }

                            echo '</div>';
                                 echo '</div>';
                     }

                Database::disconnect(); 

                ?>
                </div>


</body>

</html>-->


                           
                                   
             






















             
         
            
         

