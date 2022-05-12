<!doctype html>
<!-- PHP packages -->
<?php require_once './includes/connect.php'; ?>
<?php require_once './includes/login.php'; ?>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/styleCourse.css">

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php

        $result = $db->query("SELECT * FROM courses");
        if (!$result) {
          echo "Something went wrong loading the course";
        } else {
          if ($result->num_rows == 0) {
            echo "Nothing here";
          } else {
            while ($course = $result->fetch_object()) {
              echo "<h1>$course->courseName</h1>";
            }
          }
        }

        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <?php

        $result = $db->query("SELECT * FROM courses");
        if (!$result) {
          echo "Something went wrong loading the course";
        } else {
          if ($result->num_rows == 0) {
            echo "Nothing here";
          } else {
            $course = $result->fetch_object();
            echo "<h1>$course->courseName</h1>";
          }
        }

        ?>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>