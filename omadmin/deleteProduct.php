<?php
    include 'dbConnection.php';
    session_start();

    $conn = getDatabaseConnection("heroku_6d4074557cfdac8"); 
    
    if (!isset($_SESSION['adminName'])) {
        header("Location:login.php");
    }
    
    $sql = "DELETE FROM om_product WHERE productId = " . $_GET['productId'];
    $statement = $conn->prepare($sql);
    $statement->execute();
    
    header("Location: admin.php");

?>    
