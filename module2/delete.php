<?php
$conn="";
include_once 'jsonData.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = file_get_contents('results.json');
$json_arr = json_decode($data, true);

    unset($json_arr[$id]);

$json_arr = array_values($json_arr);
file_put_contents('results_new.json', json_encode($json_arr));

    header("location:tableau1.php");
