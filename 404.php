<?php
  if($_SESSION['theme'] == 'dark'){
    echo '<link rel="stylesheet" href="./css/404Dark.css">';
  } else {
    echo '<link rel="stylesheet" href="./css/404.css">';
  }
  http_response_code(404);
?>


<div style="height: 100px;"></div>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <h1>404</h1>
        <h2>Page not found</h2>
        <p>The page you are looking for does not exist.</p>
        <button onclick="history.back()" class="backbtn">Go Back</button>
        <br><br>
        <a href="index.php"><button class="backbtn">Go to the main page</button></a>
        </div>
    </div>
</div>