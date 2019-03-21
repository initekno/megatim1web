<?php 
require 'config.php';
session_start();
if (empty($_SESSION['username'] and ($_SESSION['cabang']))) {

    header('location:auth.php');
} else { 
require 'template/header.php';
require 'template/sidebar.php';
require 'template/navbar.php';
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
		  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<p>anda login sebagai :<b><?php echo $_SESSION['username']; ?></b></p>
<p>status :<b><?php echo $_SESSION['cabang']; ?></b></p>
	</div>
            </div>
          </div>
       </div>
        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->
        <!-- /.container-fluid -->
<?php

}
require 'template/footer.php';
?> 