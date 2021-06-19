<?php

$db = mysqli_connect("localhost", "root", "", "cart");
if(isset($_POST['submit'])){
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql= "SELECT * FROM pinfo WHERE email='$email' AND password='$password'";
    $verify = mysqli_query($db, $sql);
    if(mysqli_num_rows($verify)== 1){
    $_SESSION['email'] = $email;
    /*use the location of homepage*/
        header("location: checkout.php");
    }
    else {
        echo "incorrect email/password combination";
    }
}
elseif(isset($_POST['submit2'])){
    session_start();

   $phn = $_POST['phn'];
   $password = $_POST['psw'];
   /*update database for forgot password */
   $sql = "UPDATE pinfo SET `password`='".$password."' WHERE phone = $phn";
   $result = mysqli_query($db, $sql);
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <!--CSS Starts Here for login-->
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Verdana, Geneva, sans-serif;
            background: #162447;
        }
        #container{
            opacity: 1;
        }
        .logInForm{
            width: 290px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background: #1a1a2e;
            text-align: center;
        }
        .logInForm input[type ="email"],.logInForm input[type ="password"]{
            border: 0;
            background: none;
            display: block;
            margin: 18px auto;
            text-align: center;
            border: 2px solid #f528eb;
            padding: 12px 10px;
            width: 190px;
            color: antiquewhite;
            border-radius: 20px;
            outline: none;
            transition: 0.25s;

        }
        .logInForm input[type ="email"]:focus,.logInForm input[type ="password"]:focus{
            width: 270px;
            border-color: #f6c90e;
        }
        .logInForm input[type ="submit"]{
            border: 0;
            background: none;
            display: block;
            margin: 18px auto;
            text-align: center;
            border: 2px solid #f528eb;
            padding: 12px 35px;
            width: 190px;
            color: antiquewhite;
            border-radius: 20px;
            outline: none;
            transition: 0.25s;
            cursor: pointer;
        }
        .logInForm input[type ="submit"]:hover{
            background: #9a0f98;
        }
        .logInForm h1{
            color: antiquewhite;
            margin-top: 7px;
            text-transform: uppercase;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        }
        hr{
            border: none;
            margin-top: -5px;
            height: 1px;
            background: linear-gradient(to left, #c327ab, #ea0599 )
            
        }
        .bottomLinks1{
            
            margin-left: -5px;
            float: left;
        }
        .bottomLinks2{
            text-decoration: none;
            color: aliceblue;
            margin-right: 10px;
            float: right;
        }
        .bottomLinks1 a{
            text-decoration: none;
            color: rgb(168, 207, 241);
        }
        .bottomLinks2 a{
            text-decoration: none;
            color: rgb(168, 207, 241);
        }
        .bottomLinks1 a:hover{
            text-decoration: underline #f528eb;
            color: rgb(125, 182, 231);
        }
        .bottomLinks2 a:hover{
            text-decoration: underline #f528eb;
            color: rgb(125, 182, 231);
        }


/* POP UP CSS forgot password */

.form-popup {

  display: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  border: 3px solid black;
  z-index: 9;
}


.fg-pwd{
    color :#FAEBD7;
    text-align: center;
}
.form-popup b{
    color : #FAEBD7;
    margin : 0px 6px;
}



.form-container {
  width: 400px;
  padding: 30px;
  background-color:#1a1a2e;
}


.form-container input[type="text"], .form-container input[type="password"] {

    border: 0;
    width: 240px;
    background: none;
    display: block;
    margin: 18px auto;
    text-align: center;
    border: 2px solid #f528eb;
    padding: 12px 10px;
    color: antiquewhite;
    border-radius: 20px;
    outline: none;
    transition: 0.25s;
    
}


.form-container input[type="text"]:focus, .form-container input[type="password"]:focus {
    width: 300px;
    border-color: #f6c90e;
}


.form-container .btn {
  background: none;
  color: #FAEBD7;
  padding: 12px 18px;
  border: 3px solid  #f528eb;
  border-radius: 10px;
  cursor: pointer;
  width: 33%;
  margin-bottom:10px;
  opacity: 0.8;
  margin-left: 10%;
}


.form-container .cancel {
    float: right;
  margin-right : 10%;
}



.form-container .btn:hover, .open-button:hover {
  opacity: 1;
  background: #9a0f98;
}
        
    </style>
</head>
<body>
    <div Id="container">
        <form class="logInForm" action="Login.php" method="post">
            <h1>Login</h1>
            <hr>
            <input type="email" name="email" placeholder="useremail" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" name="submit" value="Login">
            <div class="bottomLinks1">
                <a href="#" onClick="openForm()">Forgot password..?</a>
            </div>
            <div class="bottomLinks2">
                <!--Add SignUp Here-->
                <a href="project.php">Signup..?</a>
            </div>
            
    </form>
    </div>

    <!-- POP UP codes html -->




    <div class="form-popup" id="myForm">
  <form action="Login.php" class="form-container" method="post">
    <h2 class="fg-pwd">Forget Password</h2>
    <hr>
    <input type="text" placeholder="Enter Your Phone Number" name="phn" required>
    <input type="password" placeholder="Enter New Password" name="psw" required>

    <button type="submit" name="submit2" class="btn">Confirm</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Exit</button>
  </form>
</div>


<!--popup code Javascript -->


<script>
    
function openForm() {
  document.getElementById("myForm").style.display = "block";
  document.getElementById("container").style.opacity = 0.4;
  
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("container").style.opacity = 1;
}
</script>


</body>
</html>