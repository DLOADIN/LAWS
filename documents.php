<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `admin` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:loginadmin.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="./CSS/tables.css">
  <link rel="shortcut icon" href="./images/Capture.JPG" type="image/x-icon" class="link">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <title>DOCUMENTS</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  
  <div class="sidebar">
    <ul class="menu">
      <div class="logout">
      <li>
        <a href="admindashboard.php">
          <i class="fa-solid fa-house-chimney"></i>
          <span>DASHBOARD</span>
        </a>
      </li>
      <li>
        <a href="case-details.php">
          <i class="fa-solid fa-suitcase"></i>
          <span>CASE DETAILS</span>
        </a>
      </li>
      <li>
        <a href="attorneys.php">
          <i class="fa-solid fa-people-group"></i>
          <span>ATTORNEYS</span>
        </a>
      </li>
      
      
      <li>
        <a href="documents.php">
          <i class="fa-solid fa-folder-open"></i>
          <span>DOCUMENTS</span>
        </a>
      </li>
      <li>
      <a href="./site/website.php">
          <i class="fa-solid fa-globe"></i>
          <span>HOME SITE</span>
        </a>
      </li>
      <li>
        <a href="adminprofile.php">
          <i class="fa-solid fa-gear"></i>
          <span>ADMIN SETTINGS</span>
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

    <div class="main-content" id="main-content">
      <div class="header-wrapper">
        <div class="div">
          <img src="./images/Capture.JPG" alt="" class="image">
        </div>
        <div class="header-title">
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
          <p>Manager</p></div>  
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
          </button>
        </div>       
         </div>
         <div class="folders">
            <div class="tablestotable">
            <h2>Attorney Details</h2>
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `files` ");
        $row=mysqli_fetch_array($sql);
        $number=0;
        ?>
      <table>
        <tr>
          <th>#</th>
          <th>FILENAME</th>
          <th>FILETYPE</th>
          <th>FILESIZE</th>
          <th>DATE OF UPLOAD</th>
        </tr>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['filename']?></td>
          <td><?php echo $row['filesize']?></td>
          <td><?php echo $row['filetype']?></td>
          <td><?php echo $row['upload_date']?></td>
        </tr>
      </table>
    </div>
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
  i{
  color: #fff;
  }
  .tablestotable{
    margin-left:40vh;
  }
  table{
    width: 200%;
    border:1px solid #ddd;
    border-collapse:collapse;
    box-shadow: 8px 8px 8px grey;
    border-radius:15px;
  }
  th,td{
    border-bottom:1px solid #ddd;
    padding:15px;
    text-align:center;
  }
  th{
    background:#784F33;
    color:#fff;
    font-size:20px;
  }
  tr{
    border-radius:15px;
  }
  tr:hover{
    box-shadow: 8px 8px 8px grey;
    background: #ddd;
  }
  .table-containment h1{
    text-align:center;
  }
  .tablestotable{
    margin-top:80px
  }
  </style>
</style>
<script src="./extension_remover.js"></script>
</html>
<?php
// if(isset($_POST['submit'])){
  
//   $file = rand(1000,100000) . "_" . $_FILES['u_filename']['name'];
//   $file_loc = $_FILES['u_filename']['tmp_name'];
//   $file_size = $_FILES['u_filename']['size'];
//   $file_type = $_FILES['u_filename']['type'];
//   $folder = "upload/";
//   $new_size = $file_size / 1024;
//   $new_file_name = strtolower($file);
//   $final_file = str_replace(' ', '-', $new_file_name);

//   if(move_uploaded_file($file_loc, $folder.$final_file)){
//     $sql = "INSERT INTO file (u_filename, type, u_size) VALUES ('$final_file', '$file_type', '$new_size')";
    
//     if(mysqli_query($con, $sql)){
//       echo "<script>alert('FILE UPLOADED SUCCESSFULLY')</script>";
//     } else {
//       echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
//     }
//   } else {
//       echo "<script>alert('FAILED TO UPLOAD')</script>";
//   }
// }

?>
