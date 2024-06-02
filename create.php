<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="Web.css">
  <title>Document</title>
</head>
<body>
<?php

include("functions.php");

if(isset($_POST['title']) && $_POST['description']) {
  include("db.php");
  $title = $_POST['title'];
  $description = $_POST['description'];
  $sql = "INSERT INTO mytable(title, description) VALUES ('$title', '$description')";
  $result = $conn->query($sql);
  
}
// PHP goes here!

?>

    <!-- Header section  -->
<?php include("header.php") ?>

    <!-- Main section  -->
    <div class="container">
      <div class="row">
        <?php 
          if(isset($result)){
            if ($result) {
              echo "New record created successfully";
              header("Location: index.php");
            } else {
              echo "Error: ". $sql. "<br>". $conn->error;
            }
          }
        ?>
        <div class="col-md-12">
        <form action="create.php" method="post">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" class="form-control" rows=5 id="description" name="description"> </textarea>
          </div>
         
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
      </div>
    </div>

    <!-- Footer section  -->
<?php include("footer.php") ?>
</body>
</html>
