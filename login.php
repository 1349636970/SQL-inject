<?php
$username = $_POST['username'];
$password = $_POST['password'];
try {
    $conn = new PDO("mysql:host=localhost;dbname=demo","root","root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($username == null && $password == null) {
        echo "type username and password";
    } elseif ($password == null) {
        echo "type password";
    } 
    else {
    $search = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    if ($conn->query($search)->fetch() == false) {
        echo "<h1>username or password wrong</h1>";
    }else {
        $Authentication = $conn->query($search)->fetch();
        $Authentication = $Authentication["Authentication"];
        echo "<h1>login success</h1>"."<br>"."username:".$username."<br>"."Authentication:".$Authentication;
}
    }
}
catch(exception $e) {
    $e->getMessage();
}