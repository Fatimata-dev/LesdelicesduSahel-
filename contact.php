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
<?php include("inc/header.php") ?>;
 <main>  
  <h1>Me contacter</h1>
<div class="container shadow">
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

<?php include("inc/footer.php") ?>;

</body>
</html>
