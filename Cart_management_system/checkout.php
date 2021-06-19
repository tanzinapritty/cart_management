<!--MODIFIED BY DIBAKAR-->
<?php
include 'nav.php';
?>
<!--END OF MODIFICATION-->
<?php
/** cart list  */
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'cart');

/** reco */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Cart</title>
    <style>
        body {
            /*Modified By Dibakar*/
            color: #5e698d;
            background-color: rgba(0, 0, 0, 0.918);
	        line-height: 1.5em;
            margin: 0;
            /*End of modification */
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 1em;
        }
        .jumbotron {
            background-color: rgba(199, 222, 245, 0.575);
        }
        .btn-primary {
            background-color: rgb(61, 60, 60);
        }
        .btn-primary:hover {
            transform: scale(1.2);
        }
        .btn-primary:hover {
            background-color: #128818;
        }
        .btn-danger:hover {
            background-color: rgb(34, 101, 177);
        }
        .btn-danger:hover {
            transform: scale(1.2);
        }
        .btn-secondary {
            background-color: #ad1515;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #e64343;
            color: white;
            transform: scale(1.2);
        }
        img {
            padding: 15px;
        }
        img:hover {
            transform: scale(1.2);
        }
        .totprice {
            position: relative;
            right: -800px;
            top: -80px;
            margin-right: 800px;
            font-size: 1em;
        }
        .card {
            margin: 15px;
            padding: 10px;
            background-color: rgba(219, 221, 223, 0.63);
        }
        hr {
            background-color: black;
        }
        input[type=number] {
            width: 8%;
            padding: 5px;
            margin: 5px;
            box-sizing: border-box;
        }
        .word {
            background-color: rgba(2, 12, 20, 0.8);
            border-top: 1px solid #EB1D23;
            bottom: 0;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            left: 0;
            padding: 2px;
            position: fixed;
            right: 0;
            z-index: 10;
        }

        #button {
            display: inline-block;
            background-color: #002fff;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 50px;
            right: 30px;
            transition: background-color .3s,
                opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 1em;
            line-height: 50px;
            color: #fff;
        }

        #button:hover {
            cursor: pointer;
            background-color: #c7853b;
        }

        #button:active {
            background-color: #555;
        }

        #button.show {
            opacity: 1;
            visibility: visible;
        }

        footer {
            min-height: 150px;
            background-color: #234853;
        }

        .pic {
            width: 100px;
        }

        .prodect-price,
        .card-title {
            font-size: 1em;
        }

        .modal-body {
            font-size: 1.5em;
        }

        .material-icons {
            color: white;
        }

        ul {
            display: flex;
            list-style-type: none;
        }

        li {
            display: list-item;
            margin:8px;
        }
        .fa-twitter{
            color:white;
        }
        .custbut{
            background-color: #6daabd;
        }
        .custbut:hover{
            background-color: #ecba30;
        }
        .btn-info:hover{
            background-color: #b0ec94;
        }
        .btn-info:hover {
            transform: scale(1.2);
        }
        .btn-success:hover{
            transform: scale(1.2);
        }
        .custbut:hover{
            background-color:rgb(61, 60, 60);
            color:white;
            transform: scale(1.2);
            border: 2px solid red;
        }
    </style>
</head>

<body>
<!--Nirab -->
    <div class="container">
        <h2>Your Cart</h2>

        <div class="jumbotron" id="showCart">
        </div>

        <div id="totalPrice">
        </div>
    </div>


    <div class="container">
    <div>
            <form action="checkout.php" method="get">
                <button class="custbut" type="submit" name="allpro">All product</button>
            </form>

        </div>
      <!--id="txtHint added by Dibakar"-->  <div id="txtHint" class="card-deck" style="margin-bottom: 10px;">
            <div class="row">

                <?php
                $query = " SELECT id, `name`, `image`, `price`, `description` FROM `product` order by id ASC ";
                if(isset($_GET['submit'])){
                    $sea = $_GET['allpro'];
                    $query = " SELECT id, `name`, `image`, `price`, `description` FROM `product` order by id ASC ";
                    
                }
                /*MODIFIED BY DIBAKAR */
                elseif(isset($_POST['submitS']))
                {
                  $val = $_POST['searchS'];
                  $query = "Select * from product where name LIKE '".$val."%'";
                }
                
                elseif(isset($_POST['submitr'])){
                    $val1 = $_POST['rg']; 
                    $query = "SELECT * FROM product where price <= '$val1'";
                }
                
                /*END OF MODIFICATION */

                $queryfire = mysqli_query($con, $query);
                
                $num = mysqli_num_rows($queryfire);
                if ($num > 0) {
                    while ($product = mysqli_fetch_array($queryfire)) {
                ?>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-img-top">
                                    <div><img id="<?= $product['id'] ?>-image" src="<?= "./" . $product['image'] ?>" alt="" width="120"></div>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <div id="<?= $product['id'] ?>-name"><?= $product['name'] ?></div>
                                    </h5>

                                    <div class="prodect-price">
                                        Price:
                                        <span id="<?= $product['id'] ?>-price">
                                            <?= $product['price'] ?>
                                        </span>
                                        <input class="input" type="number" value="1" min="1" style="width:50px" name=""  id="<?= $product['id'] ?>-quantity">
                                    </div>
                                    
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary" onclick="clickme(<?= $product['id'] ?>)" id="<?=$product['id'] ?>">Add to cart</button>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#<?=$product['id']."55x" ?>">
                                        View
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="<?=$product['id']."55x" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $product['id'] ?>-ModalCenterTitle"><?= $product['name'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div><img id="<?= $product['id'] ?>-image" src="<?= "./" . $product['image'] ?>" alt="" width="120"></div>

                                    <div class="modal-body">Price:
                                        <?= $product['price'] ?>
                                    </div>
                                    <div class="modal-body">Description:
                                        <div><?= $product['description'] ?></div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <footer>
        <div class="foot">
            <p style="color:white;margin-left: 50px;">FOLLOW US</p>
            <ul>
                <li><a href="www.facebook.com"><span class="material-icons">facebook</span></a></li>
                <li><span><a href="www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></span></i></a></li>
                <p style="color:white;">Any queries:</p> 
                <li><input type="email" name="email" id="" placeholder="Email us"></li>
                
                <div class=""></div><li><button type="submit">Submit</button></li>
            </ul>

        </div>
    </footer>
    </div>
<!-- product end-->

<!--pritty -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        function clickme(id) {
            let name = document.getElementById(id + '-name');
            let price = document.getElementById(id + '-price');
            let img = document.getElementById(id + '-image');
            let quantity = document.getElementById(id + '-quantity');
            console.log(name.innerText);
            if(quantity.value<1){
                return ;
            }
            if (name == null && price == null) {
                return;
            }

            $.ajax({
                url: "./temp.php",
                type: "POST",
                data: {
                    additem: true,
                    id: id,
                    name: name.innerText,
                    price: price.innerText,
                    q: quantity.value,
                    img: img.src
                },
                cache: false,
                success: function(data) {
                    alert(name.innerText + " has been added")
                    loadAlldata(true);
                }
            });
        }
/*pritty */
        function updateQ(id) {
            let updateInput = document.getElementById(id + 'updateInput');
            if (updateInput.value < 1)
                return;

            $.ajax({
                url: "./temp.php",
                type: "POST",
                data: {
                    updateQuantity: true,
                    id: id,
                    quantity: updateInput.value,

                },
                cache: false,
                success: function(data) {
                    loadAlldata(true);
                }
            });
            alert("Item as been updated ");
        }

        function remove(id) {
            $.ajax({
                url: "./temp.php",
                type: "POST",
                data: {
                    removeItem: true,
                    id: id,


                },
                cache: false,
                success: function(data) {
                    loadAlldata(true);
                }
            });
            alert("Item as been removed ");
        }

        function loadAlldata(y = false) {

            let section = document.getElementById('showCart');
            let totalPriceEle = document.getElementById('totalPrice');
            let totalPrice = 0;
            if (y)
                section.innerHTML = ''
            let display = '';
            $.ajax({
                url: "./temp.php",
                type: "POST",
                data: {
                    showalldata: true
                },
                cache: false,
                success: function(data) {
                    let jdata = JSON.parse(data);
                    for (const d in jdata) {
                        totalPrice += (jdata[d].price * jdata[d].quantity);
                        section.innerHTML += `
                                    <div class="mycart">
                                        <span><img class="pic" src="${jdata[d].img}"/></span>
                                        <span style="color: rgba(17, 48, 78, 0.932);font-weight:bold;font-size: 1em;">${jdata[d].name}</span>
                                        <div><p>Price: ${jdata[d].price}</div>
                                        
                                        <input type="number" min=0 name="" value="${jdata[d].quantity}" id="${jdata[d].id+'updateInput'}">
                                        <button class="btn btn-success" onclick="updateQ(${jdata[d].id})" id="${jdata[d].id+'updateBTN'}">Update</button>
                                        <button class="btn btn-danger" onclick="remove(${jdata[d].id})" id="${jdata[d].id+'remove'}">Remove</button>
                                        <div><p style="font-size: 1em;color:#106079;">Sub-Price: ${jdata[d].price*jdata[d].quantity}</div>

                                    </div>
                                    <hr>
                            
                            `;
                    }

                    totalPriceEle.innerHTML = `<div class="totprice"><p style="font-weight:bold;">Total : ${totalPrice} Taka</p></div>`;
                }
            });

        }
        loadAlldata();
    </script>

    <a id="button"></a>
    <script>
        var btn = $('#button');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });
    </script>


    
<!--pritty end-->

    <marquee directon="left" class="word">
        <p style="font-size:15px;">** Our online service is open for you. We take personal messages from 9 a.m. to 10 p.m. GMT **</p>
    </marquee>
</body>

</html>