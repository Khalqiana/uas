<?php 
if(isset($_GET["no"])) { 
    $no = $_GET["no"];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "toko";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM data WHERE no=$no";
    $connection->query($sql);
    header("location: /toko_bunga/data.php");
    exit;
}

header("location: /toko_bunga/index.php");
exit;
?>
