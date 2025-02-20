<?php 
include('aside.php');
include('connection.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
<h1 style="text-align: center;">Add PRODUCT</h1>

<form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="examplename" class="form-label">Product Name</label>
    <input type="text" name="prodtzname" class="form-control" id="exampleInputname" aria-describedby="emailname">
  </div>

  <div class="mb-3">
    <label for="exampletextInput" class="form-label">Price</label>
    <input type="number" name="prodtpricez" class="form-control" id="exampleInputtext" aria-describedby="Helpid">
  </div>

   
  <div class="mb-3">
    <label for="exampletextInput" class="form-label">Quantity</label>
    <input type="number" name="Quantitz" class="form-control" id="exampleInputtext" aria-describedby="Helpid">
  </div>


  
  
 <div class="mb-3">
  <select name="drop" id=" " >
    <option>choose any category</option>
    <?php
$q=mysqli_query($codes, " SELECT * FROM `formcat` ");
while($col=mysqli_fetch_array($q)){

    ?>
<option value="<?php echo $col[0] ?>"><?php echo $col[1] ?></option>

  <?php
     }
    ?>
  </select>
 </div>

  
  <div class="mb-3">
    <label for="" class="form-label"> Image</label>
    <input type="file" name="image" class="form-control" id="">
  </div>

 
  <input type="submit" name="addprodt" value="Add" class="btn btn-info">
  
</form>

                  
   </div>
  



<?php
if(isset($_POST['addprodt'])){
  $pronames=$_POST['prodtzname'];
  $propricez=$_POST['prodtpricez'];
  $proQuantityz=$_POST['Quantitz'];
  $drops=$_POST['drop'];

  $proimg=$_FILES['image']['name'];
  $proTemimg=$_FILES['image']['tmp_name'];

  $destination='img/'.$proimg;
  $extension=pathinfo($proimg,PATHINFO_EXTENSION);
  if($extension=='jpeg'|| $extension=='png' ||$extension=='jpg' || $extension=='webp'){
    if(move_uploaded_file($proTemimg,$destination)){
      $q=mysqli_query($codes,"INSERT INTO `prodtform`( `proname`, `proprice`, `proquantity`,`userid`, `img`) VALUES ('$pronames',' $propricez','$proQuantityz','$drops','$proimg')");
        echo "<script>alert('product added successfully')</script>";
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

