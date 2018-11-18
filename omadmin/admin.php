<?php

    include 'dbConnection.php';

    session_start();

    $conn = getDatabaseConnection("heroku_6d4074557cfdac8"); 
    
    if (!isset($_SESSION['adminName'])) {
        header("Location:login.php");
    }
    
    function displayAllProducts() {
        global $conn;
        
        $sql = "SELECT * FROM om_product ORDER BY productId";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!--style>
            @import url("css/style.css");
        </style-->
        
        
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete it?");
            }
        </script>

        

    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
        
                <h1> Admin Main Page </h1>
                
                <h3> Welcome Admin Admin! </h3>
                
                <br />
                <form action="addProduct.php">
                    <input id="beginning" class='btn btn-primary' type="submit" name="addproduct" value="Add Product"/>
                </form>
                
                 <form action="logout.php">
                    <input type="submit" class='btn btn-secondary' id='beginning' value="Logout"/>
                </form>
                
                <br /><br />
            </div>    
            <div class='text-left'>
                <strong> Products: </strong> <br />
                <?php 
                    $records = displayAllProducts();
                    echo "<table class='table table-hover'>";
                    echo "<thead>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Description</th>
                                <th scope='col'>Price</th>
                                <th scope='col'>Update</th>
                                <th scope='col'>Remove</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";
                    foreach($records as $record) {
                        echo "<tr>";
                        echo "<td>" . $record['productId'] . "</td>";
                        echo "<td>" . $record['productName'] . "</td>";
                        echo "<td>" . $record['productDescription'] . "</td>";
                        echo "<td>$" . $record['price'] . "</td>";
                        echo "<td><a class='btn btn-primary' href='updateProduct.php?productId=" . $record['productId'] . "'>Update</a></td>";
                        
                        echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                        echo "<input type='hidden' name='productId' value=" . $record['productId'] . " />";
                        echo "<td><input type='submit' class='btn btn-danger' value='Remove'></td>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                ?>
            </div>
        </div>
    </body>
</html>