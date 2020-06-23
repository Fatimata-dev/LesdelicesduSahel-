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

    
</head>
<body>
  

   <?php require_once 'process.php'; ?>
    <?php
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
           ?>
        </div>
      <?php endif ?>
      <h1>Ajouter un article</h1>
    <div class="container">
      <?php
        $connect = new mysqli('localhost','root','','lesdelicedusahel') or die(mysqli_error($connect));
        $result = $connect->query("SELECT * FROM articles") or die($connect->error);
       ?>
       <div class="row justify-content-center">
         <table class="table">
           <thead class="word-wrap: break-word;">
             <tr>
               <th>Article</th>
               <th>Categorie</th>
               <th colspan="2">ACTION</th>
             </tr>
           </thead>
          <?php while ($row = $result->fetch_assoc()): ?>
           <tr>
             <td><?php echo $row['titre']; ?> </td>
             <td><?php echo $row['categorie_id']; ?></td>
             <td>
               <a href="formulaire.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Modifier</a>
               <a href="formulaire.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>
             </td>
           </tr>
         <?php endwhile; ?>
         </table>
       </div>
         </div>
       

  
    <form class="container shadow rounded" action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $id; ?>">

  <div class="row">
  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1"></label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="titre" id="titre" placeholder="Le titre" value="<?php echo $titre; ?>">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-md-4">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" id="mytextarea" rows="3" placeholder="Contenu" ><?php echo $message; ?></textarea>
  </div>
  </div>
  <div class="form-group">
  <input type="file" name="file" id="" class="form-group" value="<?php echo $image_src; ?>">
  </div>
  <div class="input-group col-md-4 ">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Categories</label>
  </div>
  <select class="custom-select" name="categorie_id" id="categorie" value="">
    <option selected>Choisir</option>
    <option value="1">Plats</option>
    <option value="2">Desserts</option>
    <option value="3">Cocktail</option>
  </select>
</div>
<!--   <div class="form-group">
<input type="submit" class=" bouton " name="img_upload" value="Enregistrer"> 
</div> -->
<div class="form-group">
            <?php
              if($update == true):
             ?>
             <button type="submit" name="update" class="btn btn-primary mx-auto bouton  ">Modifier</button>
           <?php else: ?>
            <button type="submit" name="img_upload" class=" mx-auto bouton ">Ajouter</button>
          <?php endif; ?>
          </div>
   
    </form>
</body>
</html>