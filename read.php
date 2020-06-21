/*
// if (isset($_GET['delete'])) {
//   $id = $_GET['delete'];
//   $connect->query("DELETE FROM data WHERE id=$id") or die ($connect->error);
//   $_SESSION['message'] = "User has been deleted";
//   $_SESSION['msg_type'] = "danger";
//   header("location: index.php");
// }
// if(isset($_GET['edit'])){
//   $id = $_GET['edit'];
//   $update = true;
//   $result = $connect->query("SELECT * FROM data WHERE id=$id") or die($connect->error);
//   //if(count($result) ==1){
//     $test = mysqli_num_rows($result);
//     if($test==1){
//     $row = $result->fetch_array();
//     $name = $row['name'];
//     $location = $row['location'];
//   }
// }

// if(isset($_POST['update'])){
//   $id = $_POST['id'];
//   $name = $_POST['nom'];
//   $location = $_POST['ville'];
//   $connect->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($connect->error);
//   $_SESSION['message'] = "User has been updated";
//   $_SESSION['msg_type'] = "warning";
//   header("location: index.php");
// }
 ?>
