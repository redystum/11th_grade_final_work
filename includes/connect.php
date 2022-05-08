<?php
    $db = new mysqli('localhost', 'root', '', 'artistic_design');
    if(!$db) {
        echo '<p>Could not connect to the database. Error: $db->errno --> $db->connect_error</p>';
        die();
    } 