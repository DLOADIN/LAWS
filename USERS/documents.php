<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `admin` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginuser.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/newfriend.css">
  <link rel="stylesheet" href="../CSS/tables.css">
  <link rel="shortcut icon" href="../images/Capture.JPG" type="image/x-icon" class="link">
  <script src="../JS/jsfile.js"></script>
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <title>DOCUMENTS</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="../extension_remover.js"></script>
</head>
<body>
 <style>
    #main-contents{height: 250vh}i{
  color: #fff;}</style>
  <div class="sidebar">
    <ul class="menu">
      <div class="logout">
      <li>
        <a href="userdashboard.php">
          <i class="fa-solid fa-house-chimney"></i>
          <span>DASHBOARD</span>
        </a>
      </li>
      <li>
        <a href="add-case.php">
          <i class="fa-solid fa-plus"></i>
          <span>ADD CASE</span>
        </a>
      </li>
      <li>
        <a href="case-details.php">
          <i class="fa-solid fa-suitcase"></i>
          <span>CASE DETAILS</span>
        </a>
      </li>
      <li>
        <a href="documents.php">
          <i class="fa-solid fa-folder-open"></i>
          <span>DOCUMENTS</span>
        </a>
      </li>
      <li>
      <a href="../site/website.php">
          <i class="fa-solid fa-globe"></i>
          <span>HOME SITE</span>
        </a>
      </li>
      <li>
        <a href="userprofile.php">
          <i class="fa-solid fa-gear"></i>
          <span>USER SETTINGS</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          <span>LOGOUT</span>
        </a>
      </li>
    </div>
  </ul>
</div>

    <div class="main-content" id="main-contents">
      <div class="header-wrapper">
        <div class="div">
          <img src="../images/Capture.JPG" alt="" class="image">
        </div>
        <div class="header-title">
          <h1>DASHBOARD</h1>
        </div>
        <div class="user-info">
          <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `admin`");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h3 class="my-account-header">
          <?php echo $attorney?>
            </h3>
          <p>Attorney</p></div>  
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
        </div>       
         </div>
         <div class="folders">
            <div class="file-1">
              <h2>Folder CreaTion</h2>
            </div>
            <div class="file-1">
              <form action="" class="form-form" method="post" enctype="multipart/form-data">
              <input type="file" name="file" id="file">
              <button type="submit" name="submit" class="btn-3">+Upload Files</button>
              </form>
            </div>
         </div>
        </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<style>
  .form-form{
    display:grid;
    margin-top:5vh;
  }
  
  
</style>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
      $target_dir = "upload/"; 
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
      $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Check if the file is allowed (you can modify this to allow specific file types)
      $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
      if (!in_array($file_type, $allowed_types)) {
          echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
      } else {
          if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
              // File upload success, now store information in the database
              $filename = $_FILES["file"]["name"];
              $filesize = $_FILES["file"]["size"];
              $filetype = $_FILES["file"]["type"]; 

              // Insert the file information into the database
              $sql = "INSERT INTO files (filename, filesize, filetype) VALUES ('$filename', $filesize, '$filetype')";

              if ($con->query($sql) === TRUE) {
                  echo "<script>alert('FILE UPLOADED SUCCESSFULLY')</script>";
              } else {
                  echo "Sorry, there was an error uploading your file and storing information in the database: " . $con->error;
              }

              
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
  } else {
      echo "No file was uploaded.";
  }
}
?>
