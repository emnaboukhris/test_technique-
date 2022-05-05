
<?php
$conn ='';

include_once 'ConnectionBD.php';
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<title>Module 1</title>
</head>

<body>
<header><nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav" >
            <li><a href="index.php">Module 1</a></li>
            <li><a href="../module2/tableau.html">Module 2</a></li>
        </ul>
        <p class="navbar-text">Voguel Consulting - Test technique</p>
    </nav></header>
<div class="title">MODULE 1</div>
<div class="container">
   <section class="column1"><div class="card">
           <form action="index.php" method="Post" enctype="multipart/form-data">
               <h2> Please Select Your Images </h2>
               <label class="btn" style="width: 100%">
                   Select Images
                   <input type="file" name="image[]" multiple style="display: none"/>
               </label>
               <input class="btn" type="submit" name="submit" value="Upload">
           </form>
       </div></section>
    <section class="column2">  <div class="bigImage"><?php
            $sql = "SELECT * FROM images Order By date desc   " ;
            $result = mysqli_query($conn,$sql) ;
            if(mysqli_num_rows($result)>0){
                while($fetch  = mysqli_fetch_assoc($result)){

                    ?>
                    <img src="uploads/<?php echo $fetch['image'] ; ?>" width=200 height=200">
                    <?php
                }}
            ?>
        </div>
    </section>

</div>
</body>
</html>