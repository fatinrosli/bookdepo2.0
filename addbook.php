<?php
include_once("dbconnect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $author = $_GET['author'];
    $price = $_GET['price'];
    $description = $_GET['description'];
    $publisher = $_GET['publisher'];
    $isbn = $_GET['isbn'];
  
    try {
        $sql = "INSERT INTO book(id,title, author, price, description, publisher, isbn)
        VALUE ('$id''$title', '$author', '$price', '$description','$publisher','$isbn')";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "<script> alert('Insert Success')</script>";
      echo "<script> window.location.replace('mainpage.php') </script>;";
  
    } catch(PDOException $e) {
      echo "<script> alert('Insert Error')</script>";
      //echo "<script> window.location.replace('register.html') </script>;";
    }
  }
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style type="text/css">
    body{
      background-color: rgb(199, 225, 235);
    }
        input[type=text],
        select {
            width: 30%;
            padding: 12px 20px;
            margin: auto auto;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea{
            width: 30%;
            height: 100px;
            padding: 12px 20px;
            margin: auto auto;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 30%;
            background-color: #4c8caf;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        div {
            width: 100%;
            border-radius: 3px;
            padding: 5px;
            margin:10px;
        }
    </style>
</head>
<body>
    <h2 align="center">Insert New Book</h2>

    <form action="addbook.php" method="get" align="center" onsubmit="return confirm('Are sure want insert new book?');">
            <div>
            <label for="title"><b>Title:</b></label><br>
            <input type="text" placeholder="Enter Title" name="title" id="title" value="" required>
            <br>
            <label for="author"><b>Author:</b></label><br>
            <input type="text" placeholder="Enter author" name="author" id="author" value="" required>
            <br>
            <label for="price"><b>Price(RM):</b></label><br>
            <input type="text" placeholder="Enter Price" name="price" id="price" value="" required>
            <br>
            <label for="description"><b>Description:</b></label><br>
            <input type="text" placeholder="Enter Description" name="description" id="description" value="" required>
            <br>
            <label for="publisher"><b>Publisher:</b></label><br>
            <input type="text" placeholder="Enter Publisher Name" name="publisher" id="publisher" value="" required>
            <br>
            <label for="isbn"><b>ISBN:</b></label><br>
            <input type="text" placeholder="Enter ISBN" name="isbn" id="isbn" value="" required><br>
            <br>
            <input type="submit" value="Submit">
      </div>
    </form>
    <p align="center"><a href="mainpage.php">Cancel</a></p>
</body>

</html>