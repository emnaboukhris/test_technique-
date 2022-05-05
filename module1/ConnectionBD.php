<?php
$conn = mysqli_connect('localhost','root','','multipleimage') ;
$result="";
if(!$conn){
    echo 'connection failed' ;
}

if (isset($_POST['submit'])) {
    $imageCount = count($_FILES['image']['name']) ;
    for($i=0 ; $i <$imageCount ; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageTempName = $_FILES['image']['tmp_name'][$i];
        $targetPath = "./uploads/" . $imageName;

        if (move_uploaded_file($imageTempName, $targetPath)) {

            $sql = "INSERT INTO images(image)VALUES('$imageName')";
            $result = mysqli_query($conn, $sql);

        }
    }

}




?>