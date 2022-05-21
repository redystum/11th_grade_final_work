<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Our Products</h1>
        </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 100px;"></div>

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Courses</h2>
        </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 60px;"></div>


    <?php

    $total = $db->query("SELECT * FROM products WHERE productType = 'Course'");

    while ($atualCourse = $total->fetch_object()) {
        echo '
        <!-- carrousel -->
        <div class="row">
        <div class="col-md-6">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/'. $atualCourse->productName . '_course_1.png" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                    <img src="./img/'. $atualCourse->productName . '_course_2.png" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                    <img src="./img/'. $atualCourse->productName . '_course_3.png" class="d-block w-100" alt="">

                    </div>
                </div>
            </div>
        </div>';

        echo '
        <!-- infos -->

        <div class="col-md-6">
        <h3>' . $atualCourse->productName . '</h3>
        <br>
        <h5>Courses within the ' . $atualCourse->productName . ' category:</h5>
        <p class="small">Click on the course name for more details</p><ul>';

        $result = $db->query("SELECT * FROM courses WHERE courseCategory = '" . $atualCourse->productName . " '");
        if (!$result) {
            echo "Something went wrong loading the product";
        } else {
            if ($result->num_rows == 0) {
                echo "Nothing here";
            } else {
                while ($course = $result->fetch_object()) {
                    echo "<li><a href='./course.php?course=" . $course->courseId . "'>$course->courseName</a></li>";
                }
            }
        }

        echo '</ul><br>';

        $result = $db->query("SELECT * FROM products WHERE productName = '" . $atualCourse->productName . " '");
        if (!$result) {
            echo "Something went wrong loading the product";
        } else {
            if ($result->num_rows == 0) {
                echo "Nothing here";
            } else {
                echo '<p>' . $result->fetch_object()->productDescriptionMini . '</p>';
                echo '<br> <a href="./products.php?product=' . $atualCourse->productId . '" class="seemorebtn">See more</a>'; 
            }
        }
        echo '
                </div>
            </div>

        <!-- adjust line -->
        <div class="row" style="height: 100px;"></div>';
    }


    ?>

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Computers</h2>
        </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 60px;"></div>

    <?php

    $total = $db->query("SELECT * FROM products WHERE productType = 'Computer'");

    while ($atualPC = $total->fetch_object()) {
        echo '
        <!-- carrousel -->
        <div class="row">
        <div class="col-md-6">
        <img src="./img/' . $atualPC->productName . '.jpg" class="img-fluid">
        </div>';

        echo '
        <!-- infos -->

        <div class="col-md-6">
        <h3>' . $atualPC->productName . '</h3>
        <br>
        <h5>What ' . $atualPC->productName . ' are used for:</h5>';

        echo '<br>';

        echo $atualPC->productDescriptionMini;

        echo '<br><br><br> <a href="./products.php?product=' . $atualPC->productId . '" class="seemorebtn">See more</a>';

        echo '
                </div>
            </div>

        <!-- adjust line -->
        <div class="row" style="height: 100px;"></div>';
    }


    ?>


    <?php require_once "./footer.php"; ?>
</div>