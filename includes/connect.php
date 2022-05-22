<?php
    $db = new mysqli('localhost', 'WebSite', 'E7p2LQKe6lE7p2LQKe6l', 'a10443_artistic_design');
    if(!$db) {
        echo '<p>Could not connect to the database. Error: $db->errno --> $db->connect_error</p>';
        die();
    } 