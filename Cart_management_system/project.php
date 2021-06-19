<style>
 body
 {  
    background-image:url('a.jpg');
	background-size:cover;
	font-family:Arial;
 }
 .main
 {
    max-width:350px;
	border-radius:20px;
	margin:auto;
    background-color:rgba(0,0,0,0.8);
	box-sizeing:border-box;
	padding:40px;
	color:#fff;
	margin-top:100px;
 }
.reg
{ 
  text-align:center;
  color:CCCC99;
}
input[type=text],input[type=password],input[type=datetime],input[type=number]
{
    width:100%;
	box-sizeing:border-box;
	padding:12px 5px;
	background:rgba(0,0,0,10);
	outline:none;
	border:none;
	border-bottom:1px dotted #fff;
	color:#fff;	
	border-radius:5px;
	margin:5px;
	font-weight:bold;
}
.gen
{
  color:999999;
  font-weight:bold
}
input[type=submit]
{
    width:100%;
	box-sizeing:border-box;
	padding:10px 0;
	margin-top:30px;
	outline:none;
	border:none;
	background:#60adde;
	opacity:0.7;
	border-radius:20px;
	font-size:20px;	
	color:#fff;	
}
input[type=submit]:hover
{ 
background:#003366;
opacity:0.7;
}
</style>

<script>
    function myfuc()
	{
	  var a = document.func.fname.value;
	  var b=document.func.lname.value;
	  var c=document.func.email.value;
	  var d=document.func.pass.value;
	  var e=document.func.cpass.value;
	  var f=document.func.phone.value;
	  var g=document.func.country.value;
	  var h=document.func.city.value;
	  var i=document.func.caddress.value;
	  var j=document.func.gender.value;
	  var l=document.func.dob.value;
	  var m=document.func.nid.value;
	  
	  if(a==""||b==""||c==""||d==""||e==""||f==""||g==""||h==""||i==""||j==""||l==""||m=="")
	  {	    
        alert("Please Insert all information"); 		
		return false;
	  }
	  else if(d!=e)
	  {
	    alert("Password incorrect");
	    return false;
	  }
	  else
	  {	          
	  return true;
	  }
     		 
	}
	
</script>

<?php

$host='localhost';
$dbname='root';
$dbpass='';
$db='signup';
$con=mysqli_connect($host,$dbname,$dbpass,$db);

if(isset($_POST['reg']))
{  
    session_start();
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = ($_POST['pass']);
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$curaddress = $_POST['caddress'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$nid = $_POST['nid'];
    $sql = "INSERT INTO users(Firstname,Lastname, Email, Password,Phone,Country,City,Current_Address,Gender,DateOfBirth,Nid ) VALUE('$fname','$lname', '$email','$pass','$phone','$country','$city','$curaddress','$gender','$dob','$nid' )";
    if(mysqli_query($con,$sql))
    {
	  echo "Welcome ";
	}
	else
	{
	  echo "Connection Error";
	}
    $_SESSION['fname'] = $fname;
	echo "".$_SESSION['fname'];
    
	$name="email";
	setcookie($name,$email,time()+259200);	
	if(!isset($_COOKIE[$name]))
	     { 
	       echo "Cookies name'".$name."'is not set";
	     }
    else
	{
		 
		 echo "Email:".$_COOKIE[$name];
	}
    
    session_destroy();
		
    	
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Project</title>
    </head>

    <body>
	   <div class="main">
	   <div class="reg"><h3>Sign up Here</h3></div>
	   
        <form name="func" action="" method="post" onsubmit="return myfuc()">	
		
                <input  type="text" name="fname" placeholder="Fast Name"><br>
				
                <input type="text" name="lname" placeholder="Last Name"><br> 
				
                <input type="text" name="email" placeholder="Email"><br>
				
                <input type="password" name="pass" placeholder="Password"><br>
				
                <input type="password" name="cpass" placeholder="Confirm Password"><br>
				
                <input type="text" name="phone" placeholder="Phone no with code"><br>
				
				<input type="text" name="country" placeholder="Country Name"><br>
				
				<input type="text" name="city" placeholder="City"><br>
				
                <input type="text" name="caddress" placeholder="Current Address"></input><br>
				
                 <input type="radio" name="gender" value="male">Male				 
				 				 
                 <input type="radio" name="gender" value="female">Female
				 
                 <input type="datetime" name="dob" placeholder="Date Of Birth"><br>
				 
                 <input type="number" name="nid" placeholder="Nid no"><br>
				 
              <input  type="submit" name="reg" value="Signup">                   
         </form>
		</div>
    </body>
</html>