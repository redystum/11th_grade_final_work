<div class="container-fluid">
    <div class="row text-center">
        <h1>Cart</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Course</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM users where userMail = '" . $_SESSION['email'] . "'";

                        $result = $db->query($sql);

                        if (!$result) {
                            echo 'error';
                            return;
                        }

                        if ($result->num_rows == 0) {
                            echo 'no rows found';
                            return;
                        }

                        $cart = $result->fetch_assoc()['userCart'];

                        $cart = json_decode($cart, true);

                        $len = count($cart['cart']);

                        $i = 0;
                        $pricetotal = 0;


                        if ($len == 0) {
                            echo '<tr>';
                            echo '<td scope="row"></td>';
                            echo '<td>There are no courses in the cart yet</td>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '</tr>';
                        } else {

                            while ($i <= $len - 1) {

                                $error = false;


                                if (array_key_exists($i,$cart['cart'])) {
                                    $c = explode("__", $cart['cart'][$i]);
                                } else {
                                    $error = true;
                                }

                                if (!$error) {

                                    $sql = "SELECT * FROM courses WHERE courseName = '" . $c[0] . "'";

                                    $result = $db->query($sql);

                                    if (!$result) {
                                        echo 'error';
                                        echo $db->error;
                                        return;
                                    }

                                    if ($result->num_rows == 0) {
                                        echo 'no rows found';
                                        return;
                                    }

                                    $row = $result->fetch_assoc();

                                    $image = './img/Logos/' . str_replace(' ', '', $row['courseName']) . 'Logo.png';

                                    if ($c[1] == 'basic') {
                                        $price = $row['coursePrice'];
                                    } else if ($c[1] == 'pro') {
                                        $price = $row['coursePrice'] + 50;
                                    } else if ($c[1] == 'extreme') {
                                        $price = $row['coursePrice'] + 90;
                                    }
                                    $price = $row['coursePrice'];

                                    echo '<tr>';
                                    echo '<td scope="row"><img src="' . $image . '" alt="course image" class="img-fluid" width="50px"></td>';
                                    echo '<td>' . $row['courseName'] . '</td>';
                                    echo '<td>' . ucfirst($c[1]) . '</td>';
                                    echo '<td>' . $price . '€</td>';
                                    echo '<td>
                                <div class="row">
                                <div class="col-md-6">
                                    <form action="./cart.php" method="post">
                                    <button class="cartbtn" name="cart" type="submit" value="' . $i . '__remove">Remove</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                <form action="./cart.php" method="post">
                                <button class="cartbtn" name="cart" type="submit" value="' . $i . '__pay">Buy</button>
                                </form>
                                </div>
                                </div>
                                </td>';

                                    $pricetotal += $price;
                                }
                                $i++;
                            }
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td scope="row"><img src="./img/logo_progeto_final_logo.png" alt="course image" class="img-fluid" width="50px"></td>';
                            echo '<td>Buy All</td>';
                            echo '<td></td>';
                            echo '<td>' . $pricetotal . '€</td>';
                            echo '<td>
                            <form action="./cart.php" method="post">
                            <button class="cartbtn" name="cart" type="submit" value="buyall">Buy All</button>
                            </form>
                            </td>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <h1>Already Purchased</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Course</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM users where userMail = '" . $_SESSION['email'] . "'";

                        $result = $db->query($sql);

                        if (!$result) {
                            echo 'error';
                            return;
                        }

                        if ($result->num_rows == 0) {
                            echo 'no rows found';
                            return;
                        }

                        $cart = $result->fetch_assoc()['userCart'];

                        $cart = json_decode($cart, true);

                        $len = count($cart['purchased']);

                        $i = 0;

                        if ($len == 0) {
                            echo '<tr>';
                            echo '<td scope="row"></td>';
                            echo '<td>No courses purchased yet</td>';
                            echo '<td></td>';
                            echo '<td></td>';
                            echo '</tr>';
                        }

                        while ($i <= $len - 1) {

                            $c = explode("__", $cart['purchased'][$i]);

                            $sql = "SELECT * FROM courses WHERE courseName = '" . $c[0] . "'";

                            $result = $db->query($sql);

                            if (!$result) {
                                echo 'error';
                                echo $db->error;
                                return;
                            }

                            if ($result->num_rows == 0) {
                                echo 'no rows found';
                                return;
                            }

                            $row = $result->fetch_assoc();

                            $image = './img/Logos/' . str_replace(' ', '', $row['courseName']) . 'Logo.png';

                            if ($row['courseCategory'] == 'Autodesk') {
                                $hrefcourse = 'https://www.youtube.com/c/Autodesk';
                            } else if ($row['courseCategory'] == 'Adobe') {
                                if ($row['courseName'] == 'Photoshop') {
                                    $hrefcourse = 'https://www.youtube.com/c/BennyProductions';
                                } else {
                                    $hrefcourse = 'https://www.youtube.com/c/AdobeCreativeCloud';
                                }
                            } else {
                                $hrefcourse = 'https://www.youtube.com/watch?v=2W0T2qGZ9Dc';
                            }

                            echo '<tr>';
                            echo '<td scope="row"><img src="' . $image . '" alt="course image" class="img-fluid" width="50px"></td>';
                            echo '<td>' . $row['courseName'] . '</td>';
                            echo '<td>' . ucfirst($c[1]) . '</td>';
                            echo '<td>
                                <a href="' . $hrefcourse . '"><button class="cartbtn">Go to the course</button></a>
                                </td>';

                            $i++;
                        }
                        echo '</tr>';

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>