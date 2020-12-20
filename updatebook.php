  
<?php
include_once("dbconnect.php");
$isbn = $_GET['isbn'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];

if (isset($_GET['operation'])) {
  try {
      $sqlupdate = "UPDATE book SET  title = '$title',author = '$author', price = '$price', publisher='$publisher', description = '$description' WHERE isbn = '$isbn' ";
      $conn->exec($sqlupdate);
      echo "<script> alert('Update Success')</script>";
      echo "<script> window.location.replace('mainpage.php?title = ".$title."&isbn=".$isbn."') </script>;";
    } 
    catch(PDOException $e) {
      echo "<script> alert('Update Error')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
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
<body>
    <form action="updatebook.php" method="get" align="center" onsubmit="return confirm('Are you sure want to update this?');">
          <div>
          <h1 align="center">Update Status Page</h1>
          <input type="hidden" name="isbn" id="isbn" value="<?php echo $isbn;?>" required><br>
          <input type="hidden" name="operation" id="operation" value="update" required><br>
            <label for="title"><b>Title:</b></label><br>
            <input type="text" name="title" id="title" value="<?php echo $title;?>" required>
            <br>
            <label for="author"><b>Author:</b></label><br>
            <input type="text" name="author" id="author" value="<?php echo $author;?>" required>
            <br>
            <label for="price"><b>Price(RM):</b></label><br>
            <input type="text" name="price" id="price" value="<?php echo $price;?>" required>
            <br>
            <label for="description"><b>Description:</b></label><br>
            <input type="text" name="description" id="description" value="<?php echo $description;?>" required>
            <br>
            <label for="publisher"><b>Publisher:</b></label><br>
            <input type="text" name="publisher"id="publisher"value="<?php echo $publisher;?>" required>
            <br>
            <input type="submit" value="Update">
      </div>
    </form>
      <p align="center"><a href="mainpage.php">Cancel</a></p>
</body>

</html>