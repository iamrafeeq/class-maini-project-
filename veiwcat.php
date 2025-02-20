<?php 
include('aside.php');
include('connection.php')

?>

                <!-- Begin Page Content -->
 <div class="container">
 <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">img</th>
    </tr>
  </thead>

  <tbody>
    <?php
    $q=mysqli_query($codes," SELECT * FROM `formcat` ");
    while($col=mysqli_fetch_array($q)){
        ?>
    <tr>
      <td scope="row"> <?php echo $col[0] ?> </td>
      <td > <?php echo $col[1] ?> </td>
      <td> <?php echo $col[2] ?></td>
      <td> <img src="img/<?php echo $col[3] ?>" alt="" height="100px"></td>
      <th scope="row"><a href="?id=<?php echo $col['0']?>" class="btn btn-danger">delete</a>
      <!-- add here for update -->
      <a href="updateproduct.php?id=<?php echo $col['0']; ?>" class="btn btn-info">Update</a>

    </tr>
    <tr>
 <?php } ?> 
</tbody>
</table>
         
<!-- code for delete data  -->
<?php 
if(isset($_GET['id'])){
    $del=$_GET['id'];
    $q=mysqli_query($codes,"DELETE FROM `formcat` WHERE userid=$del");
    if($q){
        echo "<script>alert('record deleted')
        location.assign('veiwcat.php')</script>";
    }
}
?>
<!-- end  -->












                </div>
                <!-- /.container-fluid -->

        

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