<?php 
@session_start();

include("../../functions.php");
if(isset($_SESSION['ISADMINLOGIN']) && $_SESSION['ISADMINLOGIN']=="TRUE"){
if (isset($_POST['addProduct'])){
    include("../../connect.php");

       $productName = $_POST['productName'];
     $productDesc = $_POST['productDesc'];
     $price = $_POST['price'];
      $categoryId=$_POST['categoryId'];
     // $date = 
      
        if(isset($_POST['status'])) {    //check if the checkbox is checked
           $status=1;
        }else{
           $status=0;
        }


         date_default_timezone_set('Asia/Kathmandu');
     $addedDate = date('d-m-Y h:i:s'); 





    $productImage=$_FILES['productImage']['name']; 
            $temp = explode(".", $_FILES["productImage"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
             move_uploaded_file($_FILES["productImage"]["tmp_name"], "../../assets/images/" . $newfilename);

             $imageName=$newfilename;


     $sql = "INSERT INTO product_tbl (category_id,name,description,image_name,price,added_date,status) VALUES ($categoryId,'$productName','$productDesc','$imageName',$price,'$addedDate',$status)";
if(mysqli_query($dbConnect, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbConnect);
}

 
mysqli_close($dbConnect); 


} else if (isset($_POST['updateProduct'])){
    include("../../connect.php");

     $pId=$_POST['pId'];
     $productName = $_POST['productName'];
     $productDesc = $_POST['productDesc'];
     $price = $_POST['price'];
      $categoryId=$_POST['categoryId'];
      $imageName='';
     // $date = 
      

        if(isset($_POST['updateStatus'])){
            $status=1;
        }else{
            $status=0;
        }


        if (isset($_FILES['updateProductImage']) && !empty($_FILES['updateProductImage']['name'])) {

            $deviceImg=$_FILES['updateProductImage']['name']; 
            $temp = explode(".", $_FILES["updateProductImage"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
              move_uploaded_file($_FILES["updateProductImage"]["tmp_name"], "../../assets/images/" . $newfilename);
           

             $imageName=$newfilename;
    
        }


        


      //   date_default_timezone_set('Asia/Kathmandu');
     // $addedDate = date('d-m-Y h:i:s'); 


$sql ="";

   if($imageName!=''){
     $sql = "UPDATE product_tbl  SET `category_id`='$categoryId',`name`='$productName',`description`='$productDesc',`price`='$price',`status`='$status',`image_name`='$imageName' WHERE p_id='$pId'";
    }else{
        $sql = "UPDATE product_tbl  SET `category_id`='$categoryId',`name`='$productName',`description`='$productDesc',`price`='$price',`status`='$status' WHERE p_id='$pId'";

    }
   
if(mysqli_query($dbConnect, $sql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbConnect);
}

 
mysqli_close($dbConnect); 


}else if(isset($_POST['deleteProduct'])){
    include("../../connect.php");
                        
                        $pId=$_POST['delProductId'];
                        $sql = "UPDATE product_tbl  SET `status`='0' WHERE p_id='$pId'";

                       if(mysqli_query($dbConnect, $sql)){
                        echo "Records delete successfully.";
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbConnect);
                    }

 
mysqli_close($dbConnect); 
                } 

include("header.php");?>

<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>

 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                      
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Products
                            </div>


                            <div class="card-body">
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModel">Add Product</button>

                                <table id="datatablesSimple">

                                    <thead>
                                        <tr>
                                        	<th>SN</th>
                                            <th>Category Id</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image Name</th>
                                            <th>Price</th>
                                            <th>Added Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>

                                    	<?php
                                        $categoryList=array();


                                          $sql = "SELECT * FROM category_tbl order by id desc";
     
                                          $result = $dbConnect->query($sql);
                                                while($row = $result->fetch_assoc()) { 

                                                $categoryList[$row['id']]=$row["name"]; 


                                                }



                                        $i=1;

                                          $sql = "SELECT * FROM product_tbl order by p_id desc";
     
                                          $result = $dbConnect->query($sql);
           									 if ($result->num_rows > 0) {
            									while($row = $result->fetch_assoc()) {  

					                  ?>



                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <!--  -->
                                            <td><?php echo $row['category_id'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['description'];?></td>
                                            <td><img src="../../assets/images/<?php echo $row['image_name'];?>" width="100px" height="100px"></td>
                                            <td><?php echo $row['price'];?></td>
                                            <td><?php echo $row['added_date'];?></td>
                                            <td><?php echo ($row['status']==1)?"Shown":"Hidden";?></td>
                                            <td><button onclick="updateProduct(<?php echo $row['p_id']; ?>);" type="button" class="btn btn-primary">Edit</button>/
                                                <button onclick="deleteSelectedProduct('<?php echo $row['p_id'];?>','<?php echo $row['name'];?>')"  name="delbutton" type="button" class="btn btn-danger delbutton">Delete</button>

                                            </td>
                                        </tr>

                                    <?php } } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
             
            </div>



<!-- add product model start -->
<div class="modal fade" id="addProductModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-12 mx-auto">
                <form action="product.php" method="POST" enctype="multipart/form-data" >

                     <div class="form-group">
                          <label for="sel1">Select Category</label>
                          <select class="form-control" name="categoryId" id="sel1">
                            <?php

                                $sql = "SELECT * FROM category_tbl where status='1' order by id desc";
     
                                          $result = $dbConnect->query($sql);
                                
                                                while($row = $result->fetch_assoc()) { 
                                                   
                                                    
                                                    ?>
                                                    <option value='<?php echo $row["id"];?>'><?php echo $row['name'];?></option>

                                                <?php }?>
                            
                      
                          </select>
                      </div>
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" aria-describedby="productName" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Product Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="productDesc" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" aria-describedby="priceHelp" placeholder="Enter product price">
                    </div>

                    <div class="form-group">
                        <label for="price">Product Image</label>
                        <input type="file"  name="productImage"  id="addImg" required> 
                    </div>

                     <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                      <label class="form-check-label" for="exampleCheck1">Show Product</label>
                    </div>

                    <button type="button" class="btn btn-secondary" id="addCloseBtn" data-dismiss="modal">Close</button>
                    <button type="submit" name="addProduct" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
     
    </div>
  </div>
</div>


<!-- add product model end -->





<!-- edit product model start -->
<div class="modal fade" id="updateProductModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product Details</h5>
      
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-12 mx-auto">
                <form action="product.php" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="pId" id="pId">
                    <input type="hidden" name="currentCategoryId" name="currentCategoryId">

                     <div class="form-group">
                          <label for="sel1">Select Category</label>
                          <select class="form-control" name="categoryId" id="sel1">
                            <?php

                                $sql = "SELECT * FROM category_tbl where status='1' order by id desc";
     
                                          $result = $dbConnect->query($sql);
                                
                                                while($row = $result->fetch_assoc()) { 
                                                   
                                                    
                                                    ?>
                                                    <option value='<?php echo $row["id"];?>'><?php echo $row['name'];?></option>

                                                <?php }?>
                            
                      
                          </select>
                      </div>
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="updateProductName" name="productName" aria-describedby="productName" placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Product Description</label>
                        <textarea class="form-control" id="updateProductDescription" name="productDesc" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="updateProductPrice" name="price" aria-describedby="priceHelp" placeholder="Enter product price">
                    </div>

                    <div class="form-check mb-3">
                      <input type="checkbox" class="form-check-input" name="updateStatus" id="updateStatus">
                      <label class="form-check-label" for="exampleCheck1">Show Product</label>
                    </div>

                     <div class="form-group">
                        <label for="price">Product Image</label>
                        <div id="productImageUpdate"></div>
                       Update Image <input type="file"  name="updateProductImage"  id="addImg"> 
                    </div>

                 
                    <button type="button" class="btn btn-secondary" id="updateProductClose" dadata-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateProduct" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
     
    </div>
  </div>
</div>


<!-- edit product model end -->




<! -- delete product -->
 <div class="modal fade" id="delete_confirmation_modal" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title">Do you really want to delete <span id="delete-product-name"></span>?</h4>
            </div>
            <form role="form" method="post" action="#" id="delete_data">
                <input type="hidden" id="delete_product_id" name="delProductId">
                <div class="modal-footer">
                    <button type="submit" name="deleteProduct" class="btn btn-danger">Yes</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>

    </div>
</div>

<! -- delete product -->   


<script type="text/javascript">

//for closing model on close button click
$('#updateProductClose').click(function() {
    $('#updateProductModel').modal('hide');
});


$('#addCloseBtn').click(function() {
    $('#addProductModel').modal('hide');
});


function deleteSelectedProduct(productId,productName){
   $("#delete_product_id").val(productId);
   $("#delete-product-name").empty();
   $("#delete-product-name").append(productName);
   $('#delete_confirmation_modal').modal('show');
    
   }



    function updateProduct(pId){  
          $.ajax({    //create an ajax request to add product to cart
        type: "POST",
       // url: "add_to_cart.php",             
        url: "product_details.php",             
        dataType: "json",   //expect json to be returned 
         data : {productId :pId},            
        success: function(data){ 

            
            $("#currentCategoryId").val(data.categoryId);
            $("#updateProductName").val(data.name);
            $("#updateProductDescription").val(data.description);
            $("#updateProductPrice").val(data.price);
            $("#pId").val(data.id);
            $('#productImageUpdate').empty();
            $('#productImageUpdate').prepend('<img src="../../assets/images/'+data.imageName+'" width="130px" height="150px" />')


            

            if(data.status==1){
                 $('#updateStatus').attr('checked', true);

            }else{
                 $('.updateStatus').attr('checked', false); 
            }

            $('#updateProductModel').modal('show'); 
            
       

        
          

                       
        },
        error: function(response) {
         
        console.log('ERROR BLOCK');
        console.log(response);
    }


    });
    }
</script>

<?php include("footer.php");



}else{
    redirect("../admin-login.php?msg=invaliduser");
}
?>
