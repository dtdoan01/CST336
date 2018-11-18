<?php
    include 'dbConnection.php';
    session_start();

    $conn = getDatabaseConnection("heroku_6d4074557cfdac8"); 
    
    if (!isset($_SESSION['adminName'])) {
        header("Location:login.php");
    }
    
    
    if (isset ($_GET['productId'])) {
        $product = getProductInfo();
    }
    
    
    function getProductInfo() {
        global $conn;

        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
        
    }
    
    function getCagories($catId) {
        global $conn;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record) {
            echo "<option ";
            echo ($record["catId"] == $catId)? "selected" : "";
            echo " value='" . $record["catId"] . "'>" . $record['catName'] . " </option>";
        }
    }
    
    if (isset($_GET['updateProduct'])) {
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];
        
        $sql = "UPDATE om_product 
                SET productName = :productName, 
                    productDescription = :productDescription, 
                    productImage = :productImage, 
                    price = :productPrice, 
                    catId = :catId 
                WHERE ProductId = :productId";
                
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['description'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":productPrice"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];
        
        $statement = $conn->prepare($sql);
        $statement->execute($np);
        echo "Product has been updated";
    }
    
    if (isset ($_GET['productId'])) {
        $product = getProductInfo();
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
                <h1> Update a product</h1>
            </div>
            <form>
                <input type="hidden" name="productId" value = "<?= $product['productId'] ?>" />
                <strong>Product name</strong> <input type="text" name="productName" class="form-control" value = "<?= $product['productName'] ?>"><br>
                <strong>Description</strong> <textarea name="description" class="form-control" cols = 50 rows = 4><?= $product['productDescription'] ?></textarea><br>
                <strong>Price</strong> <input type="text" class="form-control" name="price" value = "<?= $product['price'] ?>"><br>
                <strong>Category</strong> <select name="catId" class="form-control">
                    <option value="">Select One</option>
                    <?php getCagories($product['catId']) ?>
                    </select><br />
                <strong>Set Image Url</strong> <input type = "text" name = "productImage" class="form-control" value = "<?= $product['productImage'] ?>"><br>
                <input type="submit" name="updateProduct" class= 'btn btn-primary' value="Update Product">
                
            </form>        
        </div>       
    </body>
</html>