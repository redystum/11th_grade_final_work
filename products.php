<!doctype html>

<!-- PHP packages -->
<?php require_once './includes/connect.php'; ?>
<?php require_once './includes/login.php'; ?>
<html lang="en">

<head>
    <title>
        <?php
        $p = $_GET['product'] ?? -1;

        if ($p == 0) {
            echo "Products | Artistic Design";
        } else {

            $result = $db->query("SELECT * FROM products WHERE productId = '$p'");

            if ($result->num_rows == 0) {
                echo "Product not found";
            } else {
                echo $result->fetch_assoc()['productName'] . " | Artistic Design";
            }
        }
        ?>
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/products.css">

</head>

<body>

<?php require_once './navbar.php'; ?>

  <?php
  $p = $_GET['product'] ?? -1;

  if ($p == 0){
    require_once './products_layout_all.php';
  } else{

  $result = $db->query("SELECT * FROM products WHERE productId = '$p'");

  if ($result) {
    if ($result->num_rows == 0) {
      require_once './404.php';
    } else {
      require_once './products_layout.php';
    }
  } else {
    require_once './404.php';
  }
}

  ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>