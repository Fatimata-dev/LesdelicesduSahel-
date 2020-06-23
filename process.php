<?php
session_start();
$connect = new mysqli('localhost','root','','lesdelicedusahel') or die(mysqli_error($connect));
$titre ='';
$categorie='';
$id=0;
$update = false;

  
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
      $categorie = secu($_POST['categorie_id']);
     
   
      $target_dir = "upload/";
      $target_file = $target_dir.basename($_FILES['file']['name']);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $extension_arr = array("jpg","jpeg","png","git");
      
      if (in_array($imageFileType,$extension_arr)) {
   
          $query = "INSERT INTO articles(image,titre,contenu,categorie_id) VALUES ('".$image."','".$titre."','".$message."','".$categorie."')";
          mysqli_query($connect,$query) or die(mysqli_error($connect));
          move_uploaded_file($_FILES['file']['tmp_name'] , 'upload/'.$image);
      }
   }
   


if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $connect->query("DELETE FROM articles WHERE id=$id") or die ($connect->error);
  $_SESSION['message'] = "Un article a été supprimer";
  $_SESSION['msg_type'] = "danger";
  header("location: formulaire.php");
}

if(isset($_GET['edit'])){
 $id = $_GET['edit'];
  $update = true;
  $result = $connect->query("SELECT * FROM articles WHERE id=$id") or die($connect->error);

     //$test = mysqli_num_rows($result);
   //if($test=='id'){
    $row = $result->fetch_array();
    $titre = $row['titre'];
    $message = $row['contenu'];
    $categorie = $row['categorie_id'];
    //header("location: formulaire.php");
  //}
}


if(isset($_POST['update'])){
  $id = $_POST['id'];
   //$image = $_FILES['file']['name'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];
    $categorie = $_POST['categorie_id'];
  $connect->query("UPDATE articles SET titre='$titre', contenu='$message' ,categorie_id=$categorie  WHERE id=$id") or die($connect->error);
  $_SESSION['message'] = "Un article a été modifier";
  $_SESSION['msg_type'] = "warning";
  header("location: formulaire.php?edit=".$_GET['edit']);
 }
 ?>
