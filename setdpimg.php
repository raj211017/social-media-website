<?php
session_start();

$filename=$_FILES["dpimg"]["name"];
$tempname=$_FILES["dpimg"]["tmp_name"];
$folder="dpimages/".$filename;
move_uploaded_file($tempname,$folder);

$username=$_SESSION["id"];
$conn=new mysqli('localhost','root','','helloshipdata');
$stmt="SELECT * FROM userdetails where Username='$username'";
$query=mysqli_query($conn,$stmt);
$row = mysqli_fetch_assoc($query);
$name=$row['FirstName']." ".$row['LastName'];
$stmt2="insert into dpprofiles
   (Username,Name,pic)
   values('$username','$name','$folder')";
   mysqli_query($conn,$stmt2);
        mysqli_close($conn);
header("location:home.php");
?>