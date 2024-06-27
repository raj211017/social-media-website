<!DOCTYPE html>
<html>
    <head>
        <title>connectme home</title>
        <link rel="stylesheet" href="homecss.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="postbutton.js"></script>
        <script src="loginpagejs.js"></script>
    </head>
    <body>
    <?php
                session_start();
                $id=$_SESSION["id"];
                $conn=new mysqli('localhost','root','','helloshipdata');
                $stmt="SELECT * FROM userdetails where Username='$id'";
                $query=mysqli_query($conn,$stmt);
                $row = mysqli_fetch_assoc($query);
                if($id==true)
                {}
                else{
                  header ("location:loginpage.html");
                }
                ?>  
        <div id="navbar">
          <div id="logo"><img src="images/minilogo1.png"></div>
            <div id="centercontent">
              <?php
            $sql2="SELECT * FROM dpprofiles Where username='$id' ORDER BY dpId DESC";
            $query2=mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($query2);
            ?>
             <div id="prfimg"><img src="<?php echo $row2['pic'];?>"></div> 
             <form>
              <input id="input1" type="text" placeholder="@search" name="search">
            </form>
           </div>
          <div id="notificatioicon">
            <button id="notify"><i class="fa fa-bell"></i></button>
          </div>
          <div id="prfsetting">
            <a href="logout.php"><input  id="logout" type="image" src="images/shutdown.png"></a><br>
            <span id="tooltiptext">Logout</span>
          </div>
        </div>
    
        <div id="maindiv">
            <div id="div2">
              
              <div id="profilephoto"><img src=" <?php echo $row2['pic'];?>"><hr></div>
              
              <div id="profiledata">
                <a style="font-weight: bold;font-size: 25px;">
                <?php echo $row['FirstName']." ".$row['LastName'];?>
              </a>
                <br>
                <?php
                
                echo "@".$id;
                ?><br>
                
                <hr>
              </div>
              
              <div id="buttons">
                <button onclick="document.getElementById('id01').style.display='block'"  id="crt">Edit Profile</button> 
              </div>
            </div>

           
            <div id="div3">

            <?php
            
            $sql="SELECT * FROM textpost ORDER BY PostId DESC";
            $query=mysqli_query($conn,$sql);
            $nrow=mysqli_num_rows($query);

    for($i=1;$i<=$nrow;$i++)
     {
    
        $row = mysqli_fetch_assoc($query);
         $uniqid =$row['PostId'];
         $dpno=$row['Username'];
         $sql3="SELECT * FROM dpprofiles where username='$dpno' ORDER BY dpId DESC";
         $query3=mysqli_query($conn,$sql3);
         $row3 = mysqli_fetch_assoc($query3);

      ?>
      
                
       
        <div id="post">
                <div id="profile">
                 <div id="prfsphoto"><img src="<?php echo $row3['pic'];?> ">
                </div>
                 
                 <div id="name">
                  <a><?php echo $row['Name'];?></a>
                  <br>
                  <?php echo $dpno;?>
                 </div>
                </div>
                
                <div id="uploadedpost">
                <?php echo $row['contents'];?>
                </div>
              
                <div id=uploadedimages>
                <img src="<?php echo $row['images'];?>">
                </div>
                <div id="buttom">
                <button onclick="Toggle1()" id="like" ><i class="fa fa-thumbs-up" ></i>Like</button>
                <button onclick="Toggle2()" id="dislike"><i class="fa fa-thumbs-down" ></i>dislike</button>  
                
                </div>
          </div>
          
      
      <?php
      }
  ?>
  
    </div>

            <div id="div4">
            <div id="form1">
            <form action="uploadcode.php" method="post" enctype="multipart/form-data">
            <input type="file"  name="uploadfile" required>
              <input type="text" id="content" placeholder=" Share something with us :" name="content" ><br>
              <a href="uploadcode.php"><button id="upload">Upload</button></a>
              </form>
            </div>
            
            <div id="chatbox"></div>
            <div id="messbox">
             <form>
              <input placeholder="type message"><button>send</button>
                 </form>
            </div>
           
        </div>

</div>


        <div id="id01" class="modal">
         <div id="formarea" class="animate">
          <div class="close">
            <span onclick="document.getElementById('id01').style.display='none'"  title="Close Modal">&times;</span>
          </div>
        <div id="form2">
            <div id="text1">Set profile</div><hr>
            <form action="setdpimg.php" method="post" enctype="multipart/form-data">
            <input type="file"  name="dpimg" required><br>
            New Name:<input type="text" ><br>
            New Email Id:<input type="email"><br>
            New Mobile no:<input type="number"><br><br>
            <a href="setdpimg.php"><button id="dpupload">Done</button></a>
        </form>
        </div>
            </div>
      </div>
       
    </body>
    
</html>