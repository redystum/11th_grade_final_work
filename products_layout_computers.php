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
        <div class="col-md-6">
            <?php

            $p = $_GET['product'] ?? -1;

            $products = $db->query("SELECT * FROM products WHERE productId = '$p'");

            if (!$products) {
                echo "Something went wrong loading the product";
            } else {
                if ($products->num_rows == 0) {
                    echo "Nothing here";
                } else {
                    $product = $products->fetch_assoc()['productName'];
                    echo '<img src="./img/' . $product . '.jpg"  class="img-fluid">';
                }
            }

            ?>
        </div>
        <div class="col-md-6">
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

                $products = $db->query("SELECT computers.computerName, computers.computerSpecs, computers.computerPrice FROM products INNER JOIN computers ON    computers.computerName = products.productName WHERE products.productId = '$p'");

                if (!$products) {
                    echo "Something went wrong loading the product";
                } else {
                    if ($products->num_rows == 0) {
                        echo "Nothing here";
                    } else {
                        $product = $products->fetch_object();
                        echo '<br><br><p>Base Price:</p>';
                        echo '<h3>'.$product->computerPrice.'€</h3>';
                        echo '<p>Please contact directly via phone or email if you want this product.</p>';
                    }
                }

                ?>
            </p>
        </div>
    </div>

    <!-- adjust line -->
    <div class="row" style="height: 100px;"></div>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <?php
    $p = $_GET['product'] ?? -1;

    $query = $db->query("SELECT computers.computerName, computers.computerSpecs FROM products INNER JOIN computers ON    computers.computerName = products.productName WHERE products.productId = '$p'");

    $computerSpecs = $query->fetch_object()->computerSpecs;

    $part =  json_decode($computerSpecs, true);

    echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Component Type</th>
                <th scope="col">Component</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row ">
                    <span class="material-symbols-outlined">
                        memory
                    </span>
                    Processor
                </th>
                <td>' . $part['cpu'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        mode_fan
                    </span>
                    Processor Cooling
                </th>
                <td>' . $part['cooler'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        developer_board
                    </span>
                    MotherBoard
                </th>
                <td>' . $part['motherboard'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        monitor
                    </span>
                    Graphics Card
                </th>
                <td>' . $part['gpu'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        storage
                    </span>
                    Ram
                </th>
                <td>' . $part['ram'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        save
                    </span>
                    Storage
                </th>
                <td>' . $part['ssd'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        electric_bolt
                    </span>
                    Font
                </th>
                <td>' . $part['psu'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        inventory_2
                    </span>
                    Case
                </th>
                <td>' . $part['case'] . '</td>
            </tr>
            <tr>
                <th scope="row">
                    <span class="material-symbols-outlined">
                        window
                    </span>
                    Operative System
                </th>
                <td>' . $part['os'] . '</td>
            </tr>
        </tbody>
    </table>';

    ?>

    <!-- adjust line -->
    <div class="row" style="height: 100px;"></div>

    <!-- footer -->
    <?php require_once './footer.php'; ?>


</div>