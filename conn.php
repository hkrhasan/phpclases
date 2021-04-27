<?php
    try {
        $conn = new PDO('mysql:host=localhost;dbname=phpclass', "root", "");
    } catch (PDOException $e) {
        $conn = null;
    }
?>
