<!DOCTYPE html>
<?php require_once './includes/connect.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1 class="text-center">SQLi test page</h1>

<h4>options:</h4>

<p>
    id=1 : <a href="injection_test.php?id=1">id=1</a> illustrator row<br>
    id=2 : <a href="injection_test.php?id=2">id=2</a> photoshop row<br>
    id=3 : <a href="injection_test.php?id=3">id=3</a> premiere pro row <br>
    id=4 : <a href="injection_test.php?id=4">id=4</a> after effects row <br>
</p>

<h5>Loaded row:</h5>

<br>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM courses WHERE courseId = $id";

        echo '<pre> <b>SQL:</b> ' . $sql . '</pre>';

        $result = $db->query($sql);

        if ($result){
            echo 'Successfully loaded';

            if($result->num_rows == 0){
                echo '<br>No rows found';
            }
        } else {
            echo '<pre> <b>Result: (error)</b> ' . $db->error . '</pre>';
        }

        $row = $result->fetch_assoc();

        echo "<h4>Course: " . $row['courseName'] . "</h4>";

        echo '<pre> <b>Row id= 7:</b> ' . $row['sqli_test'] . '</pre>';


        echo '<b>Content:</b><br><br>';

        $sql = "SELECT * FROM courses WHERE courseId = $id";
        $result = $db->query($sql);

        while($content = $result->fetch_assoc()){
            while(list($key, $value) = each($content)){
                echo $key . ': ' . $value . '<br>';
            }
        }

    } else {
        echo 'no id';
    }

?>

</body>
</html>