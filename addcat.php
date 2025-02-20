<?php 
include('aside.php');
include('connection.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
<h1 style="text-align: center;">Add Categories</h1>

<form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="examplename" class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputname" aria-describedby="emailname">
  </div>

  <div class="mb-3">
    <label for="exampletextInput" class="form-label">Description</label>
    <input type="text" name="des" class="form-control" id="exampleInputtext" aria-describedby="Helpid">
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Product Image</label>
    <input type="file" name="image" class="form-control" id="">
  </div>
 
  <input type="submit" name="addcat" value="Add" class="btn btn-info">
</form>

                  
                </div>
                <!-- /.container-fluid -->
<?php 
if(isset($_POST['addcat'])){
  $catname=$_POST['name'];
  $catdes=$_POST['des'];
  $catimg=$_FILES['image']['name'];
  $catTemimg=$_FILES['image']['tmp_name'];
  $destination='img/'.$catimg;
  $extension=pathinfo($catimg,PATHINFO_EXTENSION);
  if($extension=='jpeg'|| $extension=='png' ||$extension=='jpg'){
    if(move_uploaded_file($catTemimg,$destination)){
      $q=mysqli_query($codes,"INSERT INTO `formcat`( `name`, `description`, `image`) VALUES ('$catname','$catdes','$catimg')");
      echo "<script>alert('category added successfully')</script>";
    }
    else{
      echo "<script>alert('error')</script>";
    }
  }
  else{
    echo "<script>alert('does not matched')</script>";
  }
}

?>

















            <!-- Footer -->
            <?php 
            include ('asidefooter.php')
            ?>
            <!-- End of Footer -->



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>