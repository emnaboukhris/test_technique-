<?php

static $test = false   ;

$conn = mysqli_connect('localhost','root','','multipleimage') ;
$result="";
if(!$conn) {
    echo 'connection failed';

}

    $url = 'results_new.json' ;
    $data = file_get_contents('results_new.json');

$arrays=json_decode($data) ;

    foreach($arrays as $row) {
        $sql = "INSERT INTO data(id,userId,title,completed) VALUES('".$row["id"]."','".$row["userId"]."','".$row["title"]."','".$row["completed"]."' )";
        $result = mysqli_query($conn, $sql);


}
