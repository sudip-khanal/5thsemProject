<?php
  ini_set('display_errors', 1);
error_reporting(~0);
session_start();

if (!isset($_SESSION['cart'])){
$_SESSION['cart']=array(); 
}



 include("connect.php");
?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customStyle.css">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class = "p-3  bg-warning text-dark font-italic">
          <h2>Welcome to Online Cosmetic Products Shopping</h2>
          <span class=" bg-warning text-dark font-italic">Find Your Perfect Look at the Best Price!</span>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home<span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
              <a class="nav-link" href="#">About<span class="sr-only">(current)</span>
              </li>
              
             
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-warning my-2 mr-5 px-5 my-sm-0" type="submit">Search</button>

              <button class="btn btn-outline-warning my-2 mx-2 my-sm-0 " type="submit">
                <a class=" text-warning text-decoration-none" href="checkout.php">Checkout</a><span class="" id="totalCartItemCount">
                  <?php if(isset($_SESSION['totalCartItemCount'])){echo $_SESSION['totalCartItemCount'];} ?>
                </span></button>
                
              <?php if(isset($_SESSION['ISLOGIN'])) { ?>
                <button class="btn btn-outline-warning my-2 mx-2 my-sm-0 " id="logout" onclick="logoutUser()" type="submit">
                <a class=" text-warning text-decoration-none" href="logout.php">Logout</a>
              </button>

            <?php } else {?>
              <button class="btn btn-outline-warning my-2 mx-2 my-sm-0" id="login" type="submit"><a href="login.php">Login</a></button>
            <?php }?>
              <a href="register.php"><input type="button" value="Register" class="btn btn-outline-warning my-2 mx-2 my-sm-0"></a>
            </form>
          </div>
        </nav>
      </div>
      <div class="main-container">
       <?php  if(isset($_GET['msg'])&& $_GET['msg']=="userRegisterSuccess")
      {
      ?><p style="color:green;">Thank you ...You have successfully registered.</p>
       <?php } 
             if(isset($_GET['msg'])&& $_GET['msg']=="loginsuccess")
            {
            ?>
             <font color="#009900">Login Successful.</font>
       <?php } ?>

        <img src="assets/images/banner1.jpg" width="100%">
        <div class="products py-4">
          <div class="row">

<?php


 $sql = "SELECT * FROM product_tbl where status='1' order by p_id desc";
     
         $result = $dbConnect->query($sql);
           
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {  

                    


                  ?>
                 

            <div class="col-md-3">
              <div class="card">
                <img class="card-img-top" src="assets/images/<?php echo $row['image_name']; ?>" alt="Card image" style="width:100%;height: 200px;">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row['name'];  ?> </h4><h6><b>RS <?php echo $row['price'];  ?></b></h6>
                  <p class="card-text"><?php echo $row['description'];  ?></p>
                 <!--  <a href="#" class="btn btn-primary stretched-link">Add to cart</a> -->
                  

                <!--   <button onclick="clear2()">test</button> -->

                    <button class="btn btn-primary" onClick="saveProductToCart('<?php echo $row['p_id']; ?>','<?php echo $row['name']; ?>','<?php echo $row['description']; ?>','<?php echo $row['image_name']; ?>','<?php echo $row['price']; ?>','<?php echo $row['price']; ?>','<?php echo $row['p_id'];?>');">Add to cart</button>



                 
                </div>




              </div>

            </div>



                  <?php         
            }
         }

?>




        
<!-- 
            <div class="col-md-3">
              <div class="card">
                <img class="card-img-top" src="assets/images/laptop1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title">John Doe</h4>
                  <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                  <a href="#" class="btn btn-outline-warning stretched-link">Add to cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card">
                <img class="card-img-top" src="assets/images/laptop1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title">John Doe</h4>
                  <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                  <a href="#" class="btn btn-outline-warning stretched-link">Add to cart</a>
                </div>
              </div>
            </div>
 
            <div class="col-md-3">
              <div class="card">
                <img class="card-img-top" src="assets/images/laptop1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title">John Doe</h4>
                  <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                  <a href="#" class="btn btn-outline-warning ">Add to cart</a>
                </div>
              </div>
            </div>

-->

          </div>
        </div>
      </div>
     
      <div class="container">
		<h1>Contact Details</h1>
		<div class="row">
			<div class="col-sm-4">
				<h2>Location:</h2>
				<p>123 Main St, Samakhusi, KTM</p>
			</div>
			<div class="col-sm-4">
				<h2>Call Us:</h2>
				<p>+977 9803674803, 01-580022</p>
			</div>
			<div class="col-sm-4">
				<h2>Email Us:</h2>
				<p>Jiban2056@.com</p>
			</div>
		</div>
		<hr>
		<h2>Send Us a Message</h2>
		<form method="post" action="contact.php">
			<div class="form-group col-sm-4">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group col-sm-4">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group col-sm-4">
				<label for="subject">Subject:</label>
				<input type="text" class="form-control" id="subject" name="subject">
			</div>
			<div class="form-group col-sm-4">
				<label for="message">Message:</label>
				<textarea class="form-control" id="message" name="message" rows="5"></textarea>
			</div>
			<button type="submit" class="btn btn-warning">Submit</button>
		</form>
	</div>
  <footer class="footer">
		<div class="container">
			<h5>Popular Cosmetics Brands</h5>
			<div class="row">
				<div class="col-md-3">
					<img src="https://via.placeholder.com/120x60" alt="Brand 1" class="brand-logo">
					<div class="brand-name">L'Oreal</div>
				</div>
				<div class="col-md-3">
					<img src="https://via.placeholder.com/120x60" alt="Brand 2" class="brand-logo">
					<div class="brand-name">MAC</div>
				</div>
				<div class="col-md-3">
					<img src="https://via.placeholder.com/120x60" alt="Brand 3" class="brand-logo">
					<div class="brand-name">NARS</div>
				</div>
				<div class="col-md-3">
					<img src="https://via.placeholder.com/120x60" alt="Brand 4" class="brand-logo">
					<div class="brand-name">Revlon</div>
				</div>
			</div>
		</div>
	</footer>
    </div>
  </body>
</html>



<script src="assets/js/jquery-3.1.1.min.js">
</script>
<script src="assets/js/ajax.tether.min.js">
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript">


  function logoutUser(){
   
   

    if (confirm("Are you sure you want to logout?") == true) {

    $.ajax({   
        type: "POST",
       // url: "add_to_cart.php",             
        url: "logout.php",                      
        success: function(data){ 
          window.location.reload();
                       
        },
        error: function(response) {
   
    }


    });
  }

  }


//add product to cart

function saveProductToCart(id,name,description,location,price,inventoryId){

  var selProductQty=1;



    if (confirm("Are you sure you want to add "+name+" to cart") == true) {
          

   $.ajax({    //create an ajax request to add product to cart
        type: "POST",
       // url: "add_to_cart.php",             
        url: "add_to_cart.php",             
        dataType: "json",   //expect json to be returned 
         data : {productId :id,productName:name,productDescription:description,productPrice:price,productQty:selProductQty,imgLoc:location,selInventoryId:id},            
        success: function(data){ 
        if(data.status=="success"){
            $("#totalCartItemCount").empty();
           $("#totalCartItemCount").append(data.totalCartItemCount);
           console.log("count"+data.totalCartItemCount);
           $('#selProductQty').val("");
        }
                       
        },
        error: function(response) {
          $('#selProductQty').val("");
        console.log('ERROR BLOCK');
        console.log(response);
    }


    });

  } else {
    text = "No item added to cart";
  }



}


</script>
