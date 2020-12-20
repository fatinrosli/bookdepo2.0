<?php
include_once("dbconnect.php");
    //get data first
    $title = $_GET['title'];
    $author = $_GET['author'];
    $price = $_GET['price'];
    $description = $_GET['description'];
    $publisher = $_GET['publisher'];
    $isbn = $_GET['isbn'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
    $sql = "INSERT INTO book(title, author, price, description, publisher, isbn)
    VALUE ('$title', '$author', '$price', '$description','$publisher','$isbn')";
    // $conn->exec($sql);
    $stmt = $conn->prepare($sql );
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if($count > 0) {
        echo "<script> alert('Successful')</script>";
        echo "<script> window.location.replace('mainpage.php') </script>;";
    }else{
        echo "<script> alert('Failed')</script>";
        echo "<script> window.location.replace('index.html') </script>;";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    // echo "<script> alert('Failed')</script>";
}
  $conn = null;
?>