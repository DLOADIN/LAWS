<?php
require "connection.php";

$id = $_GET['id'];
$sql = mysqli_query($con,"DELETE FROM `file` WHERE id = $id");
?>