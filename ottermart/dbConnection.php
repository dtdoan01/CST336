<?php
    function getDatabaseConnection($dbname = 'heroku_6d4074557cfdac8') {
        $host = 'us-cdbr-iron-east-01.cleardb.net';
        $username = 'bbcedef505a7f1';
        $password = '0a7b1a80';
        
        //$host = 'localhost';
        //$username = 'root';
        //$password = '';

        $dbConn = new PDO ("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }
    
?>