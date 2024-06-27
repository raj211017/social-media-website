<?php
session_start();

$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="uploadimages/".$filename;
move_uploaded_file($tempname,$folder);


$contents=$_POST["content"];
$username=$_SESSION["id"];
$conn=new mysqli('localhost','root','','helloshipdata');
$stmt="SELECT * FROM userdetails where Username='$username'";
$query=mysqli_query($conn,$stmt);
$row = mysqli_fetch_assoc($query);
$name=$row['FirstName']." ".$row['LastName'];
$stmt2="insert into textpost
   (Username,Name,contents,images)
   values('$username','$name','$contents','$folder')";
   mysqli_query($conn,$stmt2);
        mysqli_close($conn);
header("location:home.php");
?>