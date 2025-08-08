
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CAR RENTAL</title>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <link  rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>

    <style>
        

    .content .form .eye {
        position: center; /* Set position absolute for the eye icon */
        top: 50%; /* Position the eye icon vertically centered */
        right: 5px; /* Adjust this value to control the distance from the right side */
        transform: translateY(-50%); /* Center the eye icon vertically */
        cursor: pointer; /* Add cursor pointer to indicate it's clickable */
    }
       .content .form .eye {
        font-size: 18px; /* Adjust the font size to change the size of the icon */
        padding: 5px; /* Adjust padding to control the space around the icon */
    }
    </style>
</head>
<body>



<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }



                



            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }







?>
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CARZ</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="aboutus.html">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    
                    <li><a href="contactus.html">CONTACT</a></li>
                  <li> <button class="adminbtn"><a href="adminlogin.php">ADMIN LOGIN</a></button></li>
                </ul>
            </div>
            
          
        </div>
        <div class="content">
            
            <h1>Rent Your <br><span>Dream Car</span></h1>
            
            <button class="cn"><a href="register.php">JOIN US</a></button>
           
            <div class="form">
                <h2>Login Here</h2>
                <form method="POST"> 
                <input type="email" name="email" placeholder="Enter Email Here">
                <input type="password" id="psw" name="pass" placeholder="Enter Password Here">
                <span id="password-eye" class="eye" onclick="togglePasswordVisibility()" style="size:2px" >👁️</span>
                <input class="btnn" type="submit" value="Login" name="login"></input>
                </form>
                <p class="link">Don't have an account?<br>
                <a href="register.php">Sign up</a> here</a></p>
                <!-- <p class="liw">or<br>Log in with</p>
                <div class="icon">
                    &emsp;&emsp;&emsp;&ensp;<a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon> </a>&nbsp;&nbsp;
                    <a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon> </a>&ensp;
                    <a href="https://myaccount.google.com/"><ion-icon name="logo-google"></ion-icon> </a>&ensp;
                    
                </div> -->
            </div>
        </div>
    </div>
    <script>
         function togglePasswordVisibility() {
  const passwordInput = document.getElementById('psw');
  const passwordEye = document.getElementById('password-eye');
  const type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.type = type;
  passwordEye.innerHTML = type === 'psw' ? '👁️' : '👁️';
}
    </script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
