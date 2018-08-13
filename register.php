<?php
$username = $_POST['username'];
$password = $_POST['password'];
$Authentication = $_POST['Authentication'];
try {
    $conn = new PDO("mysql:host=localhost;dbname=demo","root","root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($username == null && $password == null) {
        echo "<h1>type username and password</h1>";
    } else {
    $search = "SELECT * FROM user WHERE username='$username'";
    if ($conn->query($search)->fetch() == false) {
    $inserTable = "INSERT INTO user (username,password,Authentication) VALUES ('$username','$password','$Authentication')";
    $conn->exec($inserTable);
    echo "<h1>insert success</h1>";
    } else {
        echo "<h1>user exist</h1>";
    }
}
}
catch (exception $e) {
    echo $e->getMessage();
}

