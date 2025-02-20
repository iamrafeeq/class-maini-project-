<?php 
include('aside.php');
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = mysqli_query($codes, "SELECT * FROM `formcat` WHERE `userid` = $id");
    $product = mysqli_fetch_array($query);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];


        if ($image) {
            $destination = 'img/' . $image;
            move_uploaded_file($imageTemp, $destination);
        }
         else {
        
            $image = $product['image'];
        }

        $updateQuery = "UPDATE `formcat` SET `name` = '$name', `description` = '$description', `image` = '$image' WHERE `userid` = $id";
        $result = mysqli_query($codes, $updateQuery);

        if ($result) {
            echo "<script>alert('Product updated successfully!') location.assign('viewcat.php')</script>";
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
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $product['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" required><?php echo $product['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            <img src="img/<?php echo $product['image']; ?>" alt="Product Image" height="100px">
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
