<?php
    include 'dbConnection.php';
    session_start();

    $conn = getDatabaseConnection("heroku_6d4074557cfdac8"); 
    
    if (!isset($_SESSION['adminName'])) {
        header("Location:login.php");
    }
    
    function getCagories() {
        global $conn;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record) {
            echo "<option value='" . $record["catId"] . "'>" . $record['catName'] . " </option>";
        }
    }
    
    if (isset($_GET['submitProduct'])) {
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];
        
        $sql = "INSERT INTO om_product (productName, productDescription, productImage, price, catId) 
                VALUES(:productName, :productDescription, :productImage, :productPrice, :catId)";
                
        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':productPrice'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
        echo "Product has been added";
        
    }
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                <h1> Add a product</h1>
            </div>
            <form>
                <strong>Product name</strong> <input type="text" name="productName" class="form-control"><br>
                <strong>Description</strong> <textarea name="description" class="form-control" cols = 50 rows = 4></textarea><br>
                <strong>Price</strong> <input type="text" class="form-control" name="price"><br>
                <strong>Category</strong> <select name="catId" class="form-control">
                    <option value="">Select One</option>
                    <?php getCagories() ?>
                    </select><br />
                <strong>Set Image Url</strong> <input type = "text" name = "productImage" class="form-control"><br>
                <input type="submit" name="submitProduct" class= 'btn btn-primary' value="Add Product">
                
            </form>        
       </div>
    </body>
</html>