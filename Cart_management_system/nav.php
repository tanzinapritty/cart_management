
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  body{
    color: #5e698d;
  background-color: rgba(0, 0, 0, 0.918);
	line-height: 1.5em;
	margin: 0;
}
/*header part */
.BG{
  position: relative;
      animation-name: example2;
      animation-delay: 1s;
    animation-duration: 15s;
    animation-fill-mode: backwards;
	animation-iteration-count: infinite;
}
@keyframes example2 {
  0%   {background-color: black;}
  25%  {background-color: gray;}
  50%  {background-color: #2F4F4F;}
  100% {background-color: teal;}
}
    header{
      width: auto;
	    margin: auto;
	   overflow: hidden;
    }

  .wel{
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 0.9em;
  color:#E6E6FA;
  padding: 10px;
  position: relative;
  animation-name: example;
	animation-duration: 20s;  
	animation-delay: 2s;
	animation-fill-mode: backwards;
	animation-iteration-count: infinite;
  
  }
  @keyframes example {
    0%{left: 0px; top: 0px;}
   25%{left: 200px; top: 0px;}
   50%{left: 0px; top: 0px;}
   75%{left: -200px; top: 0px;}
  100% {left: 0px; top: 0px;}
  }
 /*Navigation*/    
  nav{
        width: 100%;
        height: 120px;
	    margin: auto;
      overflow: hidden;
      background-color:#02101a;
    }

/* FOR SELECT OPTIONS */
.dropbtn {
   
  background-color: black;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
 cursor: pointer;
}

.dropdown {
  position: relative;
  float: left;
  width: 200px;
  height: 200px;
 display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;

}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: green;
  /* Hover and Zoom */
  -ms-transform: scale(1.2); 
  -webkit-transform: scale(1.2); 
  transform: scale(1.2); 
}
.dropdown:hover .dropbtn option {
  background-color: gray;
}

optgroup{
  background-color: teal;
}
  /* FOR SEARCH BY NAME*/
.topnav input[type=text] {
  float: left: 500px;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}
.tapnav input[type=text]:focus {
  width: 100%;
}

.topnav .search-container {
  float: left: 500px;
}
.topnav .search-container button {
  float: left: 500px;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: red;
}

/*slider part*/

.slidecontainer {
  width: 100%;
  color: white;
  text-transform: uppercase;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1.5;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 5px;
  height: 25px;
  background: red;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slidecontainer:hover .go {
  background-color: green;
  /* Hover and Zoom */
  -ms-transform: scale(1.2); 
  -webkit-transform: scale(1.2); 
  transform: scale(1.2); 
}

.go{
  background-color: black;
  color: white;
  margin: 10px;
  font-size: 15px;
  border: none;
 cursor: pointer;
}

/*login button*/
.log:hover .ilog{
  background-color: green;
  /* Hover and Zoom */
  -ms-transform: scale(1.2); 
  -webkit-transform: scale(1.2); 
  transform: scale(1.2); 
}
.ilog {
  float: right;
  margin: 10px;
   background-color: black;
   color: white;
   padding: 16px;
   font-size: 16px;
   border: none;
  cursor: pointer;
 }

/* blocking*/
.block {
	float:left;
	width:auto;
	box-sizing:border-box;
	margin:15px;
}


</style>
</head>
<body>
<!--Header-->
<div class='BG'>
<header>
  <div class="wel">
  <h1>Cart Management System</h1>
  </div>
<header>
</div>

<nav>
<!--FOR SELECT OPTIONS-->
<div class="block">
<div  class="dropdown">
  <form>
     <select   class="dropbtn" onchange="showUser(this.value)">
        <div class="dropdown-content">
        <option value="">Select Categories:</option> 
        <optgroup label = "Computer Parts">
        <option value="0">CPU</option>
        <option value="2">Mother Boards</option>
        </optgroup>
        <optgroup Label= "Mobiles">
        <option value="1">Smart Phone</option>
        </optgroup>
        <optgroup Label="Laptops">
        <option value="3">ACER</option>
        </optgroup>        
        </div>
    </select>
  </form>
</div>
</div>

<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getproduct.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
<!--END OF SELECT OPTIONS-->

<!--SEARCH BY NAME-->
<div class="block">
<div class="topnav">
<div class="search-container">   
<form method = "post" action="checkout.php">
  <input type="text" name ="searchS"  placeholder="Search..">
  <button type="submit" name= "submitS"><i class="fa fa-search"></i></button>
</form>
</div>
</div>
</div>
<!--END OF SEARCH BY NAME-->

<!--RANGE-->
<div class="block">
<div class="slidecontainer">
<form action="checkout.php" method="post">
  <label>Search product by price range</label>
  <input type="range" name="rg" min="100" max="100000" value="1000" class="slider" id="myRange">
  <p>Value: <span id="demo"></span> <button type="submit" name= "submitr" class="go"> <i class="fa fa-search"></i>GO</button></p>
</form>
</div>
</div>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

<!--END OF RANGE-->

<!--LOGIN/SIGNUP-->

<div class="log">
<form action="Login.php">
    <button type= "submit" class="ilog" name ="log" value="login">Login / Signup</button>
</form>
</div>

<!--END of LOGIN/SIGNUP-->
<br>
</nav>    
</body>
</html>