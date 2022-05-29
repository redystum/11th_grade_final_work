<!doctype html>
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

    <?php
  if($_SESSION['theme'] == 'dark'){
    echo '<link rel="stylesheet" href="./css/aboutDark.css">';
  } else {
    echo '<link rel="stylesheet" href="./css/about.css">';
  }
?>

<link rel="shortcut icon" href="./img/Logos/FinalLogo.ico" type="image/x-icon">

</head>

<body>

    <?php require_once './navbar.php'; ?>

    <div style="height: 100px;"></div>

    <div class="container">
        <div class="row text-center">
            <h1>About Us</h1>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <img src="./img/Logos/FinalLogo_Letters.svg" alt="" class="img-fluid" width="300px">
            </div>
        </div>

        <div style="height: 60px;"></div>

        <div class="row">
            <h2>Who we are</h2>
        </div>
        <div class="row">
            <p>
                We are a qualified company that specializes in selling courses.
                Founded on 01/05/2022, we are already the largest and best qualified distributor of online courses, for our unique offers and high quality classes at a fair price.
                We were founded by, Francisco Neto and Rúben Alves, because it was seen a great lack of qualified courses in the Office, Adobe and Autodesk area.
            </p>
        </div>

        <div style="height: 100px;"></div>

        <div class="row">
            <h2>Mission Vision and Values</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4>Mission</h4>
                <p>
                    Become the best seller of Office, Adobe and Autodesk courses in the world, in order to change the whole future generation in terms of knowledge of these important programs.
                </p>
            </div>
            <div class="col-md-4">
                <h4>Vision</h4>
                <p>
                    Extend ourselves to a greater number of courses without ever losing quality, but always improving it.
                </p>
            </div>
            <div class="col-md-4">
                <h4>Values</h4>
                <p>
                    <b>Trust</b><br>
                    We believe in people, welcome each person's contribution, respect their identity, and promote development, cooperation, and communication.
                    <br>
                    <b>Integrity</b><br>
                    We are guided by principles of transparency, ethics and respect in our relationships among ourselves and with others.
                    <br>
                    <b>Entrepreneurship</b><br>
                    We are passionate about what we do, we like to get out of our comfort zone, we have the courage to make decisions and take risks responsibly.
                    <br>
                    <b>Innovation</b><br>
                    We promote the knowledge and creative potential of everyone to do the impossible.
                    <br>
                    <b>Sustainability</b><br>
                    Corporate, social and environmental sustainability is our business model.
                    <br>
                    <b>Excellence</b><br>
                    We operate focused on quality, efficiency, safety and rigor.
                </p>
            </div>
        </div>

        <div style="height: 100px;"></div>

        <div class="row">
            <h2>Our Team</h2>
            <h4>Teachers</h4>
        </div>

        <div class="row row-cols-2">

            <?php

            $result = $db->query("SELECT * FROM teachers");

            $i = 0;
            while ($row = $result->fetch_assoc()) {
                if ($i % 6 == 0 && $i != 0) {
                    echo '</div>';
                    echo '<div class="row row-cols-2">';
                }
                echo '<div class="col-md-2 text-center">';
                echo '<div class="teachercard">';
                echo '<img src="./img/teachers/' . $row['teacherImage'] . '" class="img-fluid"> <br>';
                echo '<h4>' . $row['teacherName'] . '</h4>';
                echo '<p>' . $row['teacherCourse'] . '</p>';
                echo '</div>';
                echo '</div>';
                $i++;
            }

            ?>

<div style="height: 100px;"></div>

        </div>

        <?php require_once './footer.php'; ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>