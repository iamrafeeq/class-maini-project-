<?php
include('connection.php');
session_start();
// session_unset();



?>

<?php




if (isset($_POST['addtocart'])) {
    if (isset($_SESSION['cart'])) {

$count = count($_SESSION['cart']);

$_SESSION['cart'][$count] = array("prodtid" => $_POST['pid'], "proname" => $_POST['pname'], "proprice" => $_POST['price'], "proquantity"=> $_POST['qty'], "img" => $_POST['img']);
echo "<script>alert('product successfully add')
location.assign('index.php')</script>";


    } 
    else {

        
        $_SESSION['cart'][0] = array("prodtid" => $_POST['pid'], "proname" => $_POST['pname'], "proprice" => $_POST['price'], "proquantity"=> $_POST['qty'], "img" => $_POST['img']);

        echo "<script>alert('product successfully add')
        location.assign('index.php')</script>";
    }
}
?>



