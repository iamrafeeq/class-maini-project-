<?php 
include('aside.php');
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($codes, "SELECT * FROM `prodtform` WHERE `prodtid` = $id");
    $product = mysqli_fetch_array($query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];

        if ($image) {
            $destination = 'img/' . $image;
            move_uploaded_file($imageTemp, $destination);
        } 
        else {
            $image = $product['img'];
        }

        // Update the product in the database
        $updateQuery = "UPDATE `prodtform` SET `proname` = '$name', `proprice` = '$price', `proquantity` = '$quantity', `img` = '$image' WHERE `prodtid` = $id";
        $result = mysqli_query($codes, $updateQuery);

        if ($result) {
            echo "<script>alert('Product updated successfully!') location.assign('viewprodt.php')</script>";
        } 
        else {
            echo "<script>alert('Error updating product');</script>";
        }
    }
}
?>


<!-- Begin Page Content -->
<div class="container">
    <h1>Update Product</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $product['proname']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="<?php echo $product['proprice']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" value="<?php echo $product['proquantity']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            <br>
            <img src="img/<?php echo $product['img']; ?>" alt="Product Image" height="100px">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

<!-- Footer -->
<?php 
include('asidefooter.php');
?>

<!-- Include necessary scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

</body>
</html>
