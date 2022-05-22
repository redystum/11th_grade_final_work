<link rel="stylesheet" href="./css/nav.css">


<?php require_once './includes/login.php'; ?>
<?php require_once './includes/connect.php'; ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand">
      <img src="./img/logo_progeto_final_logo.png" alt="" width="30" class="d-inline-block align-text-top">
      Artistic Design
    </span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./products.php?product=0">Products</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Learn
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="products.php?product=2">Office</a></li>
            <li><a class="dropdown-item" href="products.php?product=1">Adobe</a></li>
            <li><a class="dropdown-item" href="products.php?product=3">AutoDesk</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="Certification.php">Certification</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about_us.php">About&nbsp;us</a> <!-- Mission, Vision & Values -->
        </li>
      </ul>
      <span class="navbar-text">
        <?php
        require_once './nav_image.php'
        ?>
      </span>
    </div>
  </div>
</nav>