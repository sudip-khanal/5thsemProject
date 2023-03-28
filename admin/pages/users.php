<?php 
@session_start();
include("../../functions.php");
if(isset($_SESSION['ISADMINLOGIN']) && $_SESSION['ISADMINLOGIN']=="TRUE"){
include("header.php");?>
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">User Details</li>
                        </ol>
                      
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Users
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        	<th>User</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone no.</th>
                                            <th>Address</th>
                                            <th>Registered Date</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>

                                    	<?php

                                          $sql = "SELECT * FROM user_tbl where status='1' order by u_id desc";
     
                                          $result = $dbConnect->query($sql);
           									 if ($result->num_rows > 0) {
            									while($row = $result->fetch_assoc()) {  

					                  ?>



                                        <tr>
                                            <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];  ?> </td>
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['mobile_no'];?></td>
                                            <td><?php echo $row['city']." ".$row["street"];?></td>
                                            <td><?php echo $row['register_date'];?></td>
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

}else{
    redirect("../admin-login.php?msg=invaliduser");
}
?>
