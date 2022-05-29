<div class="row" style="height: 100px;"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>
                <?php

                $p = $_GET['product'] ?? -1;

                $products = $db->query("SELECT * FROM products WHERE productId = '$p'");

                if (!$products) {
                    echo "Something went wrong loading the product";
                } else {
                    if ($products->num_rows == 0) {
                        echo "Nothing here";
                    } else {
                        $product = $products->fetch_object();
                        echo $product->productName;
                    }
                }
                ?>
            </h1>
        </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 60px;"></div>

    <div class="row">
        <div class="col-md-12">
            <p>
                <?php

                $p = $_GET['product'] ?? -1;

                $products = $db->query("SELECT * FROM products WHERE productId = '$p'");

                if (!$products) {
                    echo "Something went wrong loading the product";
                } else {
                    if ($products->num_rows == 0) {
                        echo "Nothing here";
                    } else {
                        $product = $products->fetch_object();
                        echo $product->productDescription;
                    }
                }

                ?>
            </p>
        </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 100px;"></div>

    <?php

    $products = $db->query("SELECT * FROM products WHERE productId = '$p'");
    $product = $products->fetch_object();

    $result = $db->query("SELECT * FROM courses WHERE courseCategory = '" . $product->productName . " '");
    if (!$result) {
        echo "Something went wrong loading the product";
    } else {
        if ($result->num_rows == 0) {
            echo "Nothing here";
        } else {
            $i = 0;
            echo "<div class='row'> <div class='col-md-12'> <h3>Courses within the " . $product->productName . " category:</h3> <p class='small'>Click on the course name for more details</p>";
            echo '<div class="row">';
            while ($course = $result->fetch_object()) {
                $atual_course = $course->courseName;
                $image = './img/Logos/' . str_replace(' ', '', $atual_course) . 'Logo.png';
                if ($i % 3 == 0 && $i != 0) {
                    echo '</div>';
                    echo '<div class="row">';
                }
                echo '
                    <div class="col-md-4">
                    <a href="./course.php?course=' . $course->courseId . '">
                        <div class="courecard">
                            <img src="' . $image . '" class="img-fluid coursesLogo" alt="">
                            <h3>' . $atual_course . '</h3>
                        </div>
                    </a>
                    </div>
                ';
                $i++;
            }
            echo '</div>';
        }
    }




    ?>

<!-- footer -->
<?php require_once './footer.php'; ?>


</div>