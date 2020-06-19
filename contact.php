<!DOCTYPE html>
<html>
<head>
  <title>Contact</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Dr+Sugiyama&display=swap" rel="stylesheet">
  <link rel="icon" type="image" href="assets/img/africa.png">
    <script src="https://kit.fontawesome.com/c53d86a718.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-light ">
      <a class="navbar-brand" href="index.php">
        <div class="logoNav">
          <img src="assets/img/logo.PNG" class="logo">
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link text-white" href="index.php">Accueil</a>
        <a class="nav-item nav-link text-white" href="plat.php">Plats</a>
        <a class="nav-item nav-link text-white" href="dessert.php">Desserts</a>
        <a class="nav-item nav-link text-white" href="cocktail.php">Cocktails</a>
        <a class="nav-item nav-link text-white" href="contact.php">Contact</a>
        </div>
    </div>
    </nav>
 </header>
 <main>  
  <h1>Me contacter</h1>
<div class="container">
  <form class="col-md-6 centre" action="" method="post">
  <div class="form-group">
    <label for="nom">Nom </label>
    <input type="text" class="form-control" id="nom" placeholder="Ex: John" name="nom" required="">
  </div>
  <div class="form-group ">
    <label for="email col-md-6" >Email </label>
    <input type="email" class="form-control" id="email" placeholder="Ex:john@doe.fr" name="email" required="">
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" id="message" rows="3" name="message" required=""></textarea>
  </div>
  <div class="btn-centre">
  <button type="submit" class=" mx-auto  bouton" >Envoyer</button>
    
  </div>
  <?php
if($_POST != null){
$connect = mysqli_connect("localhost","root",'','contact-form-blog');
if ($connect) {
 $query = "INSERT INTO user (nom,email,message) VALUES (?,?,?)";
 $result = mysqli_prepare($connect,$query);
  $ok = mysqli_stmt_bind_param($result,"sss",$nom,$email,$message);
 $nom = htmlspecialchars($_POST['nom']);
 $email = htmlspecialchars($_POST['email']);
 $message = htmlspecialchars($_POST['message']);
 $ok = mysqli_stmt_execute($result);
 if ($ok == FALSE) {
   echo "query not executed";
 }else{
  echo "Votre message a été envoyé";
 }

}else{
  printf("Error %s.",mysqli_connect_error());
}
}

?>
</form>
<div class="py-5">
  
</div>
</main>

 <footer class="page-footer font-small blue py-4">
  <div class=" text-center">
    <a href="#" target="_blank"><i  class="fab fa-facebook"></i></a>
    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>

  </div>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-2 text-white">© 2020 Copyright:
    <a> Tout droit réservés </a>
  <a href="contact.php">LesdelicesduSahel.fr</a>

  </div>
  <div class="text-center">
  <a href="assets/img/mentionLegales.pdf" target="_blank" class="text-white">Mentions Légales</a>
  </div>
  <div class="text-center">
  <a href="contact.php" class="text-white">Contact</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<!-- <script src="delices.js"></script> -->

</body>
</html>
