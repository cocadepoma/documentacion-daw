<?php

function connectDB($url = 'localhost', $dbname = 'ferreteria', $charset = 'utf8', $usr = 'root', $pwd = '')
{
    $conn = 0;
    try {
        $conn = new PDO("mysql:host=$url; dbname=$dbname; charset=$charset", "$usr", "$pwd");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set character set utf8");
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
    return $conn;
}
function disconectDB($conn)
{
    $conn = null;
}
