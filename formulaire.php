<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src='https://cdn.tiny.cloud/1/9g49wvqkyj04sf4wc4xrr1ci76a7p83ojhmq885v5vb9la6a/tinymce/5/tinymce.min.js' referrerpolicy="origin">

  </script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
   <?php
   include("config.php");
   function secu($donnees){
       $donnees = trim($donnees);
       $donnees = stripslashes($donnees);
       $donnees = htmlspecialchars($donnees);
       return($donnees);
   }
   if (isset($_POST['img_upload'])) {
      $image = $_FILES['file']['name'];
      $titre = secu($_POST['titre']);
      $message = secu($_POST['message']);
      $categorie = secu($_POST['categorie']);
      //$id= ($_POST['id']);
   
      $target_dir = "upload/";
      $target_file = $target_dir.basename($_FILES['file']['name']);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $extension_arr = array("jpg","jpeg","png","git");
      
      if (in_array($imageFileType,$extension_arr)) {
   
          $query = "INSERT INTO formulaire(image,titre,contenu,categorie) VALUES ('".$image."','".$titre."','".$message."','".$categorie."')";
          mysqli_query($connect,$query) or die(mysqli_error($connect));
          move_uploaded_file($_FILES['file']['tmp_name'] , 'upload/'.$image);
      }
   }
   
   
   
   
   
   
   ?>
    
</head>
<body>
    <h1>Ajouter un article</h1>
   

    <form class="container shadow rounded" action="formulaire.php" method="post" enctype="multipart/form-data">
  
  <div class="row">
  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"></label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="titre" id="titre" placeholder="Le titre">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-md-4">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" id="mytextarea" rows="3" placeholder="Contenu"></textarea>
  </div>
  </div>
  <div class="form-group">
  <input type="file" name="file" id="" class="form-group">
  </div>
  <div class="input-group col-md-4 ">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Categories</label>
  </div>
  <select class="custom-select" name="categorie" id="categorie">
    <option selected>Choisir</option>
    <option value="plat">Plats</option>
    <option value="desserts">Desserts</option>
    <option value="cocktail">Cocktail</option>
  </select>
</div>
  <div class="form-group">
<input type="submit" class=" bouton " name="img_upload" value="Enregistrer"> 
</div>
   
    </form>
</body>
</html>