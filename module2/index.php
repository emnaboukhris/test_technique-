<?php
$url = "https://jsonplaceholder.typicode.com/todos" ;
$data = file_get_contents($url);
file_put_contents('results_new.json', json_encode($data));

$array=json_decode($data,true) ;
if($array)
{
    header("location:tableau1.php");
    echo 'success';
}

else {
    echo "failed" ;
}
