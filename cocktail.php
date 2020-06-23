<!DOCTYPE html>
<html>
<head>
  <title>Cocktail</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <link href="https://fonts.googleapis.com/css2?family=Dr+Sugiyama&display=swap" rel="stylesheet">
  <link rel="icon" type="image" href="assets/img/africa.png">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c53d86a718.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<div class="marge">
  
<body>
<?php include("inc/header.php"); ?>
  <h1> Nos Cocktails</h1>
 <div class="container">
<div class="row">
<?php

include("config.php");
//$id= 'id';
if ($connect) {
       $query = "SELECT titre,articles.id,contenu,image,categorie_id FROM articles inner join categories on articles.categorie_id=categories.id where articles.categorie_id=3";
    $result =mysqli_query($connect,$query);
  }
  
    //$row = mysqli_fetch_array($result);
    while ($row = mysqli_fetch_assoc($result)): 
      
   $image = $row['image'];
    $image_src = "upload/".$image;
    $titre = $row['titre'];
    $message = $row['contenu'];
    $categorie = $row['categorie_id'];
   // if($categorie == 'cocktail'):
      
      


?>
 
  
 <div class="col-sm-4" style="width: 18rem;">

<a href="article.php?id=<?php echo $row['id']; ?>" name="lire">
  <img src=" <?php echo  $image_src ?>" class="card-img-top img" alt="...">
</a>  
  <div class="card-body">
    <h5 class="card-title"><?php echo $titre ?></h5>
    <p class="card-text"><?php echo $message ?></p>

  </div>

  
  </div>

 <?php endwhile; ?>
</div>
</div> 
<?php include("inc/footer.php"); ?>



</body>
</div>
</html>