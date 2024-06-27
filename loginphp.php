<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head><title></title>
</head>
<body>

<?php

if(isset($_POST['login']))
{
$user=$_POST['username'];
$password=$_POST["password"];
$conn=new mysqli('localhost','root','','helloshipdata');
$stmt='select *from userdetails';
$fquerry=mysqli_query($conn,$stmt);
$num= mysqli_num_rows($fquerry);

    while($rows=mysqli_fetch_assoc($fquerry))
    {
        if($user==$rows['Username']&&$password==$rows['Password'])
      {
        ?> 
         <script>
        window.alert("✅Logined successful 🎉");
        </script>
        <?php
        $_SESSION["id"]=$user;
        header ("location:home.php");
      } 

    }
    
    ?>
    <script>
        window.alert(" ❌Logined failed try again‼️ ");
        location.replace("http://localhost/webphp/helloship/loginpage.html")
        </script>
        <?php
        
    
}




else
if(isset($_POST['signup']))//if create account clicked.
{
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $phone=$_POST['number'];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $conn=new mysqli('localhost','root','','helloshipdata');
    
    $stmt="insert into userdetails
        (FirstName,LastName,Phone,Email,Username,Password)
         values('$fname','$lname','$phone','$email','$username','$password')";
        mysqli_query($conn,$stmt);
        mysqli_close($conn);
        ?>
        <script>
            
            window.alert("You have successfully registered \n click OK to redirect loginpage");
            location.replace("http://localhost/webphp/helloship/loginpage.html")
            </script>
            <?php
}
?>

 
</body>
</html>