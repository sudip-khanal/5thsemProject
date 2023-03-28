<?php
 include("../../connect.php");
   $productId = $_POST['productId'];


 $data = array();

    $sql = "SELECT * FROM product_tbl where p_id=$productId";
     
                          $result = $dbConnect->query($sql);
            									while($row = $result->fetch_assoc()) { 
                                $data['id']=$row['p_id'];
                                $data['categoryId']=$row['category_id'];
                                $data['name']=$row['name'];
                                $data['description']=$row['description'];
                                $data['imageName']=$row['image_name'];
                                 $data['price']=$row['price'];
                                  $data['status']=$row['status'];
            										 // $data = array("id" => "$row['p_id']","categoryId" =>"$row['category_id']","name" =>"$row['name']","description" => "$row['description']","imageName" => "$row['image_name']","price" => "$row['price']","status" => "$row['status']");

            									}


            			

header("Content-Type: application/json");
echo json_encode($data);

?>