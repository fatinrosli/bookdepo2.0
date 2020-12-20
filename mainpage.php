<?php
include_once("dbconnect.php");

//delete operation
    if (isset($_GET['operation'])) {
      $title = $_GET['title'];
      try {
        $sql = "DELETE FROM book WHERE title = '$title'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {

        $sql = "SELECT * FROM book";
        $stmt = $conn->query($sql );
        echo "<p><h1 align='center'>Book Depository</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
          <th>Description</th>
          <th>Publisher</th>
          <th>ISBN</th>
          <th>Operation</th>
        </tr>";
        
        foreach($conn->query($sql) as $book) {
            echo "<tr>";

            echo "<td>".$book['title']."</td>";
            echo "<td>".$book['author']."</td>";
            echo "<td>".$book['price']."</td>";
            echo "<td>".$book['description']."</td>";
            echo "<td>".$book['publisher']."</td>";
            echo "<td>".$book['isbn']."</td>";
            echo "<td><a href='mainpage.php?title=".$book['title']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='updatebook.php?title=".$book['title']."&author=".$book['author']."&price=".$book['price']."
            &description=".$book['description']."&publisher=".$book['publisher']."&isbn=".$book['isbn']."'>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><a href='addbook.php?'>Insert new Book</a></p>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-1.0">
        <title>Main Page</title>
        <style type="text/css">
    body{
      background-color: rgb(199, 225, 235);
    }
     table,tr,th{
      background-color:white;
      border: 1px solid #666666;
      padding: 0px;
      margin: auto;
      width: auto;
      border-radius: 2px;
     }
    </style>
    </head>
    <body>
    </body>
</html>
