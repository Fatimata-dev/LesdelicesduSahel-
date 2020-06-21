<!DOCTYPE html>
<html lang="en">
<title>Plat principaux</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Dr+Sugiyama&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c53d86a718.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
 <?php include('inc/header.php'); ?>   
<div class="container">
<?php
include("config.php");

$id= 'id';
if ($connect) {
    $query = "SELECT * FROM formulaire WHERE id=$id";
    $result =mysqli_query($connect,$query);
    //$row = mysqli_fetch_array($result);
    while ($row = mysqli_fetch_assoc($result)){
    $image = $row['image'];
    $image_src = "upload/".$image;
    $titre = $row['titre'];
    $message = $row['contenu'];
    $categorie = $row['categorie'];
    

   
}



    
} 

?>
 <?php 
 //if($_GET['']) :

?>
 <input type="hidden" name="id" value="<?php echo $id; ?>">
<h1 class="card-title"><?php echo $titre ?></h1>
<div class="row">
<div class=" col-md-4 card mb-3">
  <img src="<?php echo $image_src ?>"class="card-img-top img" alt="...">
  
</div>
 <div class="col-md-8">
      <p  class="card-text"><?php echo $message ?></p>
      <p class="card-text"><small class="text-muted"></small></p>
</div>
</div>
</div>

<!--  <div class="card">
    <img class="card-img-top" src="<?php echo $image_src ?>" alt="Card image cap"> 
    <div class="card-body">
      <h5 class="card-title"><?php echo $titre ?></h5>
      <p class="card-text"><?php echo $message ?>.</p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div> -->
 <!-- 
</div> -->
 <?php include('inc/footer.php'); ?> 
  </body>
</html>