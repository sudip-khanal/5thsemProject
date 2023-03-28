<?php 
@session_start();
include("../../functions.php");
if(isset($_SESSION['ISADMINLOGIN']) && $_SESSION['ISADMINLOGIN']=="TRUE"){
include("header.php");?>
 <div id="layoutSidenav_content">
                <main class ="my-2 mr-5 px-5  my-sm-5">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#studentaddmodal">
                         Add Catagory
             </button>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Category Details</li>
                        </ol>
                      
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Categroies
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        	<th>SN</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category Added Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>

                                    	<?php
                                        $i=1;

                                          $sql = "SELECT * FROM category_tbl where status='1' order by id desc";
     
                                          $result = $dbConnect->query($sql);
           									 if ($result->num_rows > 0) {
            									while($row = $result->fetch_assoc()) {  

					                  ?>



                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['description'];?></td>
                                            <td><?php echo $row['category_date'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                        </tr>

                                    <?php } } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
             
            </div>


<?php include("footer.php");


 
 
 include("connect.php");
 
 if(isset($_POST['insert_cata'])){

     $catagory_title = $_POST['catagory_title'];
     $Catagory_Disc = $_POST['Catagory_Disc'];
     $category_date = $_POST['category_date'];
     $status=1;

        $sql = "SELECT * FROM `category_tbl` where name = '$catagory_title' ";
        $result = mysqli_query($dbConnect,$sql);
        $num = mysqli_num_rows($result);
        if($num > 0){
            echo "<script>window.alert('Catagory Already Inserted.')</script>";

        }else{
			  
		
         $query = "INSERT INTO `category_tbl` (name,description,category_date,status) values('$catagory_title','$Catagory_Disc','$category_date','$status') ";
         $res = mysqli_query($dbConnect, $query );
         if ($res){
            echo "<script>window.alert('Catagory Inserted Succesfully.')</script>";
         }
        }
}
mysqli_close($dbConnect);


}else{
    redirect("../admin-login.php?msg=invaliduser");
}
?>






</div>
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Catagory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="catagory.php" class="add-post-form row" method="post">
                <div class="col-md-9">
                    <div class="modal-body">
                        <label for="">Catagory Title</label><br>
                        <input type="text" class="form-control product_title" name="catagory_title"
                            placeholder="Enter Catagory Title" autocomplete="off" required>
                    </div>
                    <div class="col-md-9">
                    <div class="modal-body">
                        <label for="">Catagory Disc</label><br>
                        <input type="text" class="form-control product_title" name="Catagory_Disc"
                            placeholder="Enter Catagory Description" autocomplete="off" required>
                    </div>

                    <div class="col-md-9">
                    <div class="modal-body">
                        <label for="">Catagory Date</label><br>
                        <input type="text" class="form-control product_title" name="category_date"
                            placeholder="Enter Catagory Date" autocomplete="off" required>
                    </div>
                 
                 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="addCloseBtn"
                            data-dismiss="modal">Close</button>
                        <button type="submit" name="insert_cata" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>



        </div>
    </div>
</div>


<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Catagory </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="catagory.php" method="POST">

                <div class="modal-body">

                    <input type="hidden" name="delete_id" id="delete_id">

                    <h4> Do you want to Delete The Catagory?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                    <button type="submit" name="deletedata" class="btn btn-primary deletebtn"> Yes !! Delete it.
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {

    $('.viewbtn').on('click', function() {
        $('#viewmodal').modal('show');
        $.ajax({ //create an ajax request to display.php
            type: "GET",
            url: "catagory.php",
            dataType: "html", //expect html to be returned                
            success: function(response) {
                $("#responsecontainer").html(response);
                //alert(response);
            }
        });
    });

});
</script>
<script>
$(document).ready(function() {

    $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);

    });
});
</script>