<?php
@session_start();
include("../../functions.php");
if(isset($_SESSION['ISADMINLOGIN']) && $_SESSION['ISADMINLOGIN']=="TRUE"){

include("header.php");
?>

 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><h1>Admin Panel</li>
                        </ol>
                    </div>
                </main>
            </div>


<?php

include("footer.php");
}else{
	redirect("../admin-login.php?msg=invaliduser");
}
?>

